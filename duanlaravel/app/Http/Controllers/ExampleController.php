<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function hello()
    {
        return view('hello');
    }
    public function hello1()
    {
        return view('hello1');
    }
    public function khainiemphp()
    {
        return  view('khainiemphp');
    }
    public function phienbanlaravel()
    {
        return view('phienbanlaravel');
    }
    public function datetime()
    {
        return view('datetime');
    }

}
