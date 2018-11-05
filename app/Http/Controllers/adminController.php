<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function __construct(){
        $this->middleware('checkadmin');
    }

    public function admindashboard(){
        return view('includes.adminhead');
    }
    public function forget(Request $request){
        $request->session()->forget('admin_email');
        return view('login');
    }




}
