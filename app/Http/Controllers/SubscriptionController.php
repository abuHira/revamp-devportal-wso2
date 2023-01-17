<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->url = getUrlApi();
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
        
        $apis = collect($addsubs->list)->where('lifeCycleStatus', 'PUBLISHED')->all(); // Get All API
        
        $allsubs = getUrl($this->url . '/subscriptions?applicationId='. $id); // All Subscribe

        $allsubfilters = collect($allsubs->list)->pluck('apiId')->all();
        
        // dd($apis,$allsubfilters);
        
        $notsubs = [];
        foreach ($apis as $key => $value) {
            if(!in_array($value->id, $allsubfilters)){
                $notsubs[] = $value;
            }
        }

        return view('myapplication.subscription.addsubs', compact('data','notsubs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'appid'              => 'required',
            'apiid'              => 'required',
            'status'             => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('warning', 'Oh No Cant Subscribe!');
        }else{
            
            try {

                $payloads = [
                    'applicationId' => $request->appid,
                    'apiId' => $request->apiid,
                    'throttlingPolicy' => $request->status,
                    'requestedThrottlingPolicy' => $request->status,
                ];

                $response = Http::withOptions(['verify' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer '.$request->session()->get('token'),
                ])
                ->withBody(json_encode($payloads),'application/json')
                ->post($this->url. '/subscriptions');

                $data =json_decode($response->getBody()->getContents());
                

                // return redirect()->back()->with('success', 'Successful Subscribe API!');
                return redirect()->route('subscription', $request->appid)->with('success', 'Successful Subscribe API!');
                
            } catch (\Exception $e) {
                dd($e);
            }
        }
    }

    public function editsubs ()
    {
        return view('myapplication.subscription.editsubs');
    }

    public function update ()
    {
        //
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
