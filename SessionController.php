<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function getSessionData(Request $request)
    {
        if($request->session()->has('name')){
            echo $request->session()->get('name');
        }else{
            echo 'session ga naidesu';
        };
        
    }
    public function storeSession(Request $request)
    {
        $request-> session()->put('name','John');
        echo 'session ga sakuseidesu';
    }
    public function deleteSession(Request $request)
    {
        $request-> session()->forget('name');
        echo 'session ga nasi';
    }
}
