<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index():string
    {
        return "home from HomeController";
    }
    public function index_($name=null):string
    {
        return "home from HomeController" .$name ;
    }
}
