<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Raw;

class AppController extends Controller
{

    public function __construct()
    {
        $this->url = getUrlApi();
    }


    public function index ()
    {
        return view('home.index');
    }

    public function myapp ()
    {
        return view('myapplication.index');
    }

    public function listapp (Request $request)
    {
        try {

            $limit = 6;
            $payloads = [
                'sortBy' => $request->sortBy, 
                'sortOrder' => $request->sortOrder,
                'limit' => $limit,
                'offset' => $request->offset,
                'groupId' =>$request->groupId,
            ];


            $data = getUrl($this->url .'/applications?'. http_build_query($payloads));
            if($data->pagination->total >= $limit) {
                if($data->pagination->total % $limit == 0 ){
                    $numberpages = $data->pagination->total / $limit;  
                }else{
                    $numberpages = (($data->pagination->total - ($data->pagination->total % $limit)) / $limit)+1; 
                }
            }else{
                $numberpages = 1;
            }

            return view('myapplication.listapp', compact('data','numberpages','limit'));

        } catch (\Exception $e) {
            dd($e);

            alert('Get App Filled','Failed to get app', 'error');
            return redirect()->back();
        }
    }

    public function createapp()
    {
        try {

            $data = getUrl($this->url.'/throttling-policies/application');
            return view('myapplication.create', compact('data'));

        } catch (\Exception $e) {
            dd($e);

            alert('Get App Filled','Failed to get app', 'error');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'appname'              => 'required',
            'shared'            => 'required',
            'description'       => 'max:512',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('warning', 'Field not complete!');
        }else{
            
            try {

                $payloads = [
                    'name' => $request->appname,
                    'throttlingPolicy' => $request->shared,
                    'description' => $request->description,
                    'tokenType' => 'JWT',
                    'groups' => [],
                    'attributes' => null,
                    'subscriptionScopes' => [],
                ];

                $response = Http::withOptions(['verify' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer '.$request->session()->get('token'),
                ])
                ->withBody(json_encode($payloads),'application/json')
                ->post($this->url. '/applications');

                $data =json_decode($response->getBody()->getContents());        
                return redirect(route('listapp'))->with('success', 'Successful Create Application!');

            } catch (\Exception $e) {
                dd($e);
            }
        }

    }


    public function updateapp(Request $request, $id)
    {

        $options = getUrl($this->url .'/throttling-policies/application');
        $data = getUrl($this->url .'/applications/'. $id);
        
        return view('myapplication.edit', compact('data','options'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [

            'appname'            => 'required',
            'shared'            => 'required',
            'description'       => 'max:512',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            try {
                $payloads = [
                    'name' => $request->appname,
                    'throttlingPolicy' => $request->shared,
                    'description' => $request->description,
                    'tokenType' => 'JWT',
                    'groups' => [],
                    'attributes' => null,
                    'subscriptionScopes' => [],
                ];
                
                $response = Http::withOptions(['verify' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer '.$request->session()->get('token'),
                ])
                ->withBody(json_encode($payloads),'application/json')
                ->put($this->url.'/applications/'. $id);
        
                $data =json_decode($response->getBody()->getContents());
                return redirect(route('listapp'))->with('success', 'Successful Update Application!');

            } catch (\Exception $e) {
                dd($e);
            }

        }
    }

    public function delete (Request $request, $id)
    {

        try {

            $response = Http::withOptions(['verify' => false])
            ->withHeaders([
                'Authorization' => 'Bearer '.$request->session()->get('token'),
            ])
            ->delete($this->url . '/applications/'. $id);
    
            $data =json_decode($response->getBody()->getContents());
    
            if($response->status() == 200)
            {
                return back()->with('success', 'Successful Delete Application!');
            } 
            
            return back()->with('error', 'Failed Delete Application');
        } catch (\Exception $e) {
            dd($e);
        }
    }



    public function managekeys(Request $request, $id)
    {
        $data = getUrl($this->url .'/applications/'. $id);
        $keymanager = getUrl($this->url .'/key-managers');

        return view('myapplication.managekeys.managekeys', compact('data','keymanager'));
    }

    public function generateappkey(Request $request)
    {   
        $grant = [];
        foreach($request->granttype as $key=>$item){
            if($item == 'on'){
                $grant[] = $key;
            }
        }
        $scope = [];
        foreach($request->scopetype as $key=>$item){
            if($item == 'on'){
                $scope[] = $key;
            }
        }

        try {
            $payloads = [
                'keyType' => $request->type,
                'keyManager' => 'Resident Key Manager',
                'grantTypesToBeSupported' => $grant,
                'callbackUrl' => 'http://sample.com/callback/url',
                'scopes' => $scope,
                'validityTime' => 3600,
                'additionalProperties' => null,
            ];
            
            $response = Http::withOptions(['verify' => false])
            ->withHeaders([
                'Authorization' => 'Bearer '.$request->session()->get('token'),
            ])
            ->withBody(json_encode($payloads),'application/json')
            ->post($this->url.'/applications/'. $request->id.'/generate-keys');
                
            $data = json_decode($response->getBody()->getContents());

            if ($response->status() == '409') {
                return back()->with('warning', 'Already Generated!');
            }
            return response()->json($data);
            
        } catch (\Exception $e) {
            dd($e);
        }

        return $request->all();
    }

    public function sandboxapi()
    {
        return view('myapplication.managekeys.sandbox.apikeys');
    }
    public function productionapi()
    {
        return view('myapplication.managekeys.production.apikeys');
    }


    public function subscription(Request $request, $id)
    {
        $data = getUrl($this->url .'/applications/'. $id);
        $subs = getUrl($this->url .'/subscriptions?applicationId='. $id);

        return view('myapplication.subscription.subscription', compact('data','subs'));
    }

    public function addsubs(Request $request, $id)
    {
        $data = getUrl($this->url .'/applications/'. $id);
        $addsubs = getUrl($this->url . '/apis');
        
        return view('myapplication.subscription.addsubs', compact('data','addsubs'));
    }

    public function deletesubs(Request $request, $id)
    {
        try {

            $response = Http::withOptions(['verify' => false])
            ->withHeaders([
                'Authorization' => 'Bearer '.$request->session()->get('token'),
            ])
            ->delete($this->url . '/subscriptions/'. $id);
    
            $data =json_decode($response->getBody()->getContents());
    
            if($response->status() == 200)
            {
                return back()->with('success', 'Successful Delete Subscription!');
            } 
            
            return back()->with('error', 'Failed Delete Subscription');
        } catch (\Exception $e) {
            dd($e);
        }
    }



}
