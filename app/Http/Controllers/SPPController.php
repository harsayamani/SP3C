<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Siswa;
use App\SPP;


class SPPController extends Controller
{
    public function index(){

    	$siswa = Siswa::count();

    	if(!Session::get('loginSPP')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	 	    return view('/spp/dashboardSPP', compact('siswa'));
	    }
    }

    public function pembayaran(){
    	$siswa = Siswa::all();

    	if(!Session::get('loginSPP')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    	}else{
	 	    return view('/spp/kelolaPembayaranSPP', compact('siswa'));
    	}
    }

    public function detailPembayaran($NIS){
    	$siswa = Siswa::findOrFail($NIS);
    	$spp = SPP::findOrFail($NIS);

    	if (!Session::get('loginSPP')) {
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    	}else{
    		return view('/spp/detailPembayaran', compact('siswa', 'spp'));
    	}
    }
}
