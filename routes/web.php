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

Route::get('/login', 'User@index');

Route::get('/spp/dashboard', 'SPPController@index');

Route::get('/psb/dashboard', 'PSBController@index');

Route::get('/admin/dashboard', 'AdminController@index');

Route::post('/loginPost', 'User@loginPost');

Route::get('/logout', 'User@logout');


// ---Route Siswa---

Route::get('/admin/datasiswa/formSiswa', 'SiswaController@formSiswa');

Route::post('/admin/datasiswa/tambahSiswa', 'SiswaController@tambahSiswa');

Route::get('/admin/datasiswa/kelolaSiswa', 'SiswaController@kelolaSiswa');

Route::get('/admin/datasiswa/{NIS}/hapusSiswa', 'SiswaController@hapusSiswa');

Route::get('/admin/datasiswa/{NIS}/updateSiswa', 'SiswaController@updateSiswa');

Route::post('/admin/datasiswa/ubahSiswa', 'SiswaController@ubahSiswa');

// ---Route Kelas---

Route::get('/admin/datasiswa/kelas', 'KelasController@index');

route::post('/admin/datasiswa/kelas/tambahKelas', 'KelasController@tambahKelas');

route::get('/admin/datasiswa/kelas/{NIS}/hapusKelas', 'KelasController@hapusKelas');

route::post('/admin/datasiswa/kelas/ubahKelas', 'KelasController@ubahKelas');


// ---Route Jenjang---

route::get('/admin/datasiswa/jenjang', 'JenjangController@index');

route::post('/admin/datasiswa/jenjang/tambahJenjang', 'JenjangController@tambahJenjang');

route::get('/admin/datasiswa/jenjang/{id_jenjang}/hapusJenjang', 'JenjangController@hapusJenjang');

route::post('/admin/datasiswa/jenjang/ubahJenjang', 'JenjangController@ubahJenjang');

//---Route Rincian PSB---

route::get('/admin/datapembayaran/psb/rincian', 'AdminPSBController@rincian');

route::post('/admin/datapembayaran/psb/rincian/tambahRincian', 'AdminPSBController@tambahRincian');

route::get('/admin/datapembayaran/psb/rincian/{id_rincian}/hapusRincian', 'AdminPSBController@hapusRincian');

route::post('/admin/datapembayaran/psb/rincian/ubahRincian', 'AdminPSBController@ubahRincian');

//---Route Bulan SPP

route::get('/admin/datapembayaran/spp/bulanSPP', 'AdminSPPController@bulanSPP');

route::post('/admin/datapembayaran/spp/bulanSPP/tambahBulan', 'AdminSPPController@tambahBulan');

route::get('/admin/datapembayaran/spp/bulanSPP/{id_bulan}/hapusBulan', 'AdminSPPController@hapusBulan');

route::post('/admin/datapembayaran/spp/bulanSPP/ubahBulan', 'AdminSPPController@ubahBulan');

//---Route Kelola Pembayaran

route::get('/admin/datapembayaran/spp', 'AdminSPPController@kelolaSPP');

route::get('/admin/datapembayaran/psb', 'AdminPSBController@kelolaPSB');

//---Route SPP
route::get('/spp/dashboard', 'SPPController@index');

route::get('/spp/pembayaranSPP', 'SPPController@pembayaran');

route::get('/spp/detail/spp/{NIS}', 'SPPController@detailPembayaran');




