<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PSBController extends Controller
{
    public function index(){
    	if(!Session::get('loginPSB')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	 	    return view('/psb/dashboardPSB');
	    }
    }
}
