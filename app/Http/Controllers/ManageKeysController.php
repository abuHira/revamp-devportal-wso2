<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ManageKeysController extends Controller
{

    public function __construct()
    {
        $this->url = getUrlApi();
    }

    private function getUrlToken ()
    {
        $token = session('idtoken');
        $tokenParts = explode(".", $token);  
        $tokenHeader = base64_decode($tokenParts[0]);
        $tokenPayload = base64_decode($tokenParts[1]);
        $jwtHeader = json_decode($tokenHeader);
        $jwtPayload = json_decode($tokenPayload);

        $iss = $jwtPayload->iss;
        $url = explode('/',$iss);

        return $url[0].'//'.$url[2];
    }

    public function managekeys (Request $request, $id)
    {
        $app = getUrl($this->url .'/applications/'. $id);
        return view('myapplication.managekeys.managekeys', compact('app'));
    }

    public function productionoauth (Request $request, $id)
    {
        $url = $this->getUrlToken();
        $app = getUrl($this->url .'/applications/'. $id);
        $grant = getUrl($this->url .'/settings');
        $granttype = [
            "refresh_token" => 'Refresh Token',
            "urn:ietf:params:oauth:grant-type:saml2-bearer" => 'SAML2',
            "implicit" => 'implicit',
            "password" => 'Password',
            "client_credentials" => 'Client Credentials',
            "iwa:ntlm" => 'IWA-NTLM',
            "authorization_code" => 'Code',
            "urn:ietf:params:oauth:grant-type:token-exchange" => 'Token Exchange',
            "urn:ietf:params:oauth:grant-type:jwt-bearer" => 'JWT'
        ];

        return view('myapplication.managekeys.production.oauthkeys', compact('app','grant', 'granttype','url'));
    }

    public function productionapi (Request $request, $id)
    {
        $app = getUrl($this->url .'/applications/'. $id);
        return view('myapplication.managekeys.production.apikeys', compact('app'));
    }

    public function sandboxoauth (Request $request, $id)
    {
        $url = $this->getUrlToken();
        $app = getUrl($this->url .'/applications/'. $id);
        $grant = getUrl($this->url .'/settings');
        $granttype = [
            "refresh_token" => 'Refresh Token',
            "urn:ietf:params:oauth:grant-type:saml2-bearer" => 'SAML2',
            "implicit" => 'implicit',
            "password" => 'Password',
            "client_credentials" => 'Client Credentials',
            "iwa:ntlm" => 'IWA-NTLM',
            "authorization_code" => 'Code',
            "urn:ietf:params:oauth:grant-type:token-exchange" => 'Token Exchange',
            "urn:ietf:params:oauth:grant-type:jwt-bearer" => 'JWT'
        ];
        
        return view('myapplication.managekeys.sandbox.oauthkeys', compact('app','grant', 'granttype','url'));
    }

    public function sandboxapi (Request $request, $id)
    {
        $app = getUrl($this->url .'/applications/'. $id);
        return view('myapplication.managekeys.sandbox.apikeys', compact('app'));
    }

    public function oauthgenerate (Request $request)
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

    // public function apikeys(Request $request, $id)
    // {
    //     // $data = getUrl($this->url .'/applications/'. $id);
    //     // $keymanager = getUrl($this->url .'/key-managers');

    //     return view('myapplication.managekeys.api');
    // }    

}