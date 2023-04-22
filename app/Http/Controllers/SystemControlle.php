<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SystemController extends Controller
{
  
    public function terms(Request $request) {
         $request['data'] = date('d/m/y');
        return view('documents.terms.agree', compact('request'));
    }

}
