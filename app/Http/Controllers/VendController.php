<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use App\Models\VendToken;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
class VendController extends Controller
{
   //Vend Authorization with the first request
   public function index(Request $request)
   {
       $request->session()->put('state', $state = Str::random(40));

       $query = http_build_query([
           'response_type' => 'code',
           'client_id' =>  config('vend.clientId'),
           'redirect_uri' =>  config('vend.redirectUri'),
           'state' => $state,

       ]);
       return redirect('https://secure.vendhq.com/connect?' . $query);
   }    
   //Sending second request to access token
   public function callback(Request $request)
   {
       
       $request->session()->put('domain_prefix', $domain_prefix = $request->domain_prefix);
       $state = $request->session()->pull('state');

       throw_unless(
           strlen($state) > 0 && $state === $request->state,
           InvalidArgumentException::class
       );

       $response = Http::asForm()->post('https://' . $domain_prefix . '.vendhq.com/api/1.0/token', [

               'grant_type' => 'authorization_code',
               'client_id' =>  config('vend.clientId'),
               'client_secret' => config('vend.clientSecret'),
               'redirect_uri' => config('vend.redirectUri'),
               'code' => $request->code,

           ]);
           
       $response = $response->json();
       VendToken::create([
        'access_token'=>$response['access_token'],
        'token_type'=>$response['token_type'],
        'expires'=>$response['expires'],
        'expires_in'=>$response['expires_in'],
        'refresh_token'=>$response['refresh_token'],
        'domain_prefix'=>$response['domain_prefix'],

       ]);
 return 'App Connected';
    
   }


}
