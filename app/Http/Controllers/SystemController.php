<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SystemController extends Controller
{
  
    public function searchAddress($zipcode) {
        $client = new Client(); 
        
        $url = "https://viacep.com.br/ws/" . $zipcode . "/json/";

        $response = $client->request('GET', $url, [
          'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        
        return $responseBody;
    }

    public function terms(Request $request) {
         $request['data'] = date('d/m/y');
        return view('documents.terms.agree', compact('request'));
    }

}
