<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    function index(){
        //echo "Success";
        return view('login.index');
    }
}