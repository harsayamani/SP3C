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
		return redirect('/spp/dashboard');
	}elseif (Session::get('loginPSB')) {
		return redirect('/psb/dashboard');
	}elseif (Session::get('loginAdmin')) {
		return redirect('/admin/dashboard');
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

// ---Route Kelas---

Route::get('/admin/datasiswa/kelas', 'KelasController@index');

route::post('/admin/datasiswa/kelas/tambahKelas', 'KelasController@tambahKelas');

route::get('/admin/datasiswa/kelas/{id_kelas}/hapusKelas', 'KelasController@hapusKelas');

route::post('/admin/datasiswa/kelas/ubahKelas', 'KelasController@ubahKelas');


// ---Route Jenjang---

route::get('/admin/datasiswa/jenjang', 'JenjangController@index');

route::post('/admin/datasiswa/jenjang/tambahJenjang', 'JenjangController@tambahJenjang');

route::get('/admin/datasiswa/jenjang/{id_jenjang}/hapusJenjang', 'JenjangController@hapusJenjang');

route::post('/admin/datasiswa/jenjang/ubahJenjang', 'JenjangController@ubahJenjang');
