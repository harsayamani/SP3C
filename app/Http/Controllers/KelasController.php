<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Jenjang;
use Illuminate\Support\Facades\Session;
use App\LogSistem;

class KelasController extends Controller
{
    public function index(){
        $i=0;
        $data_kelas = Kelas::all();
        $data_jenjang = Jenjang::all();
        $log = LogSistem::orderBy('tgl', 'desc')->get();

        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            return view('/adm/kelolaKelas', compact('data_kelas', 'data_jenjang', 'i', 'log'));
        }
    }

    public function tambahKelas(Request $request){
    	$this->validate($request, [
    			'id_kelas=' => '|unique:kelas|digits:6|numeric|regex:/^([1-9][0-9]+)/',
    			'nama_kelas' => '|unique:kelas|max:10',
    		]);
    	$data = new Kelas();
        $data->id_kelas = $request->id_kelas;
        $data->nama_kelas = $request->nama_kelas;
        $data->id_jenjang = $request->id_jenjang;
        $data->save();
        return redirect('/admin/datasiswa/kelas')->with('alert success', 'Data berhasil ditambahkan');
    }

    public function hapusKelas($id_kelas){
        $kelas = Kelas::find($id_kelas);
        $kelas->delete($kelas);
        return redirect('/admin/datasiswa/kelas')->with('alert danger', 'Data berhasil dihapus');
    }

    public function ubahKelas(Request $request){
        $this->validate($request, [
                'id_kelas=' => '|digits:6|numeric|regex:/^([1-9][0-9]+)/',
                'nama_kelas' => '|max:10',
            ]);
        $kelas = Kelas::find($request->id_kelas);
        $kelas->update($request->all());
        return redirect('/admin/datasiswa/kelas')->with('alert warning', 'Data berhasil diubah');
    }
}
