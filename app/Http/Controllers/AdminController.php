<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Siswa;
use App\Kelas;
use App\Jenjang;
use App\PSB;
use App\SPP;
use App\LogSistem;

class AdminController extends Controller
{
    public function index(){
    	if(!Session::get('loginAdmin')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	    	$psb = PSB::count();
	    	$spp = SPP::count();
	    	$transaksi = $psb+$spp;
	    	$siswa = Siswa::count();
	    	$kelas = Kelas::count();
	    	$jenjang = Jenjang::count();
	    	$log = LogSistem::orderBy('tgl', 'desc')->get();
	 	    return view('/adm/dashboardAdm', compact('siswa', 'kelas', 'jenjang', 'transaksi', 'log'));
	    }
    }

    public function indexLog(){
    	if(!Session::get('loginAdmin')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	    	$log = LogSistem::orderBy('tgl', 'desc')->get();
	    	return view('/adm/logSistem', compact('log'));
	    }
    }

    public function indexBantuan(){
    	if(!Session::get('loginAdmin')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	    	$log = LogSistem::orderBy('tgl', 'desc')->get();
	    	return view('/adm/bantuanAdmin', compact('log'));
	    }
    }
}
