<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'DashboardController@index');

Route::get('/detail_pembayaran', function(){
	return view('detail_pembayaran');
});

Route::get('/kontak', function(){
	return view('kontak');
});

Route::get('/tentang', function(){
	return view('tentang');
});

Route::get('/login', function(){
	if(Session::get('loginSPP')){
		return view('/spp/dashboardSPP');
	}elseif (Session::get('loginPSB')) {
		return view('/psb/dashboardPSB');
	}elseif (Session::get('loginAdmin')) {
		return view('/adm/dashboardAdm');
	}else{
		return view('login');
	}
});

Route::get('/spp/dashboard', function(){
	if(!Session::get('loginSPP')){
    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    }else{
 	    return view('/spp/dashboardSPP');
    }
})->name('spp');

Route::get('/psb/dashboard', function(){
	if(!Session::get('loginPSB')){
    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    }else{
 	    return view('/psb/dashboardPSB');
    }
})->name('psb');

Route::get('/admin/dashboard', function(){
	if(!Session::get('loginAdmin')){
    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    }else{
 	    return view('/adm/dashboardAdm');
    }
})->name('admin');

Route::post('/loginPost', 'User@loginPost');

Route::get('/logout', 'User@logout');

