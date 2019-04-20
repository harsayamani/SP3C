<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Siswa;
use App\Kelas;
use App\Jenjang;

class AdminController extends Controller
{
    public function index(){
    	if(!Session::get('loginAdmin')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	    	$siswa = Siswa::count();
	    	$kelas = Kelas::count();
	    	$jenjang = Jenjang::count();
	 	    return view('/adm/dashboardAdm', compact('siswa', 'kelas', 'jenjang'));
	    }
    }
}
