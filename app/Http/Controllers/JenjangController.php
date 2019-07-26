<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenjang;
use App\Kelas;
use Illuminate\Support\Facades\Session;
use App\LogSistem;

class JenjangController extends Controller
{
    public function index(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            $data_jenjang = Jenjang::all();
            $i=0;
            $log = LogSistem::orderBy('tgl', 'desc')->get();
            return view('/adm/kelolaJenjang', compact('data_jenjang', 'i', 'log'));
        }
    }

    public function tambahJenjang(Request $request){
        $this->validate($request, [
                'id_jenjang=' => '|unique:jenjang|digits:6|numeric|regex:/^([1-9][0-9]+)/',
                'nama_jenjang' => '|unique:jenjang|max:6',
            ]);
    	$data = new Jenjang();
        $data->id_jenjang = $request->id_jenjang;
        $data->nama_jenjang = $request->nama_jenjang;
        $data->save();
        return redirect('/admin/datasiswa/jenjang')->with('alert success', 'Data berhasil ditambahkan');
    }

    public function hapusJenjang($id_jenjang){
        $jenjang = Jenjang::find($id_jenjang);
        $jenjang->delete($jenjang);
        return redirect('/admin/datasiswa/jenjang')->with('alert danger', 'Data berhasil dihapus');
    }

    public function ubahJenjang(Request $request){
        $this->validate($request, [
                'id_jenjang=' => '|digits:6|numeric|regex:/^([1-9][0-9]+)/',
                'nama_jenjang' => '|max:6',
            ]);

        $jenjang = Jenjang::find($request->id_jenjang);
        $jenjang->update($request->all());
        return redirect('/admin/datasiswa/jenjang')->with('alert warning', 'Data berhasil diubah');
    }
}
