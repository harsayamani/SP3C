<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenjang;


class JenjangController extends Controller
{
    public function index(){
        $data_jenjang = Jenjang::all();
        return view('/adm/kelolaJenjang', ['data_jenjang'=>$data_jenjang]);
    }

    public function tambahJenjang(Request $request){
    	$data = new Jenjang();
        $data->id_jenjang = $request->id_jenjang;
        $data->nama_jenjang = $request->nama_jenjang;
        $data->save();
        return redirect('/admin/datasiswa/jenjang')->with('alert', 'Data berhasil ditambahkan');
    }

    public function hapusJenjang($id_jenjang){
        $jenjang = Jenjang::find($id_jenjang);
        $jenjang->delete($jenjang);
        return redirect('/admin/datasiswa/jenjang')->with('alert alert-danger', 'Data berhasil dihapus');
    }

    public function ubahJenjang(Request $request){
        $jenjang = Jenjang::find($request->id_jenjang);
        $jenjang->update($request->all());
        return redirect('/admin/datasiswa/jenjang')->with('alert', 'Data berhasil diubah');

    }
}
