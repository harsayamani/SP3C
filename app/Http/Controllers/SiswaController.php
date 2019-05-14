<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Siswa;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function formSiswa(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
           $data_kelas = Kelas::all();
           return view('adm/formSiswa', ['data_kelas'=>$data_kelas]); 
        }
    }

    public function kelolaSiswa(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            $i=0;
            $data_siswa = Siswa::all();
            return view('adm/kelolaSiswa', ['data_siswa'=>$data_siswa, 'i'=>$i]);
        }
    }

    public function hapusSiswa($NIS){
        $siswa = Siswa::find($NIS);
        $siswa->delete($siswa);
        return redirect('/admin/datasiswa/kelolaSiswa')->with('alert danger', 'Data berhasil dihapus');
    }

    public function tambahSiswa(Request $request){
    	$this->validate($request, [
                'NIS=' => '|unique:siswa|digits:7|numeric|regex:/^([1-9][0-9]+)/',
                'nama_siswa' => '|unique:siswa|',
                'jenis_kelamin' => '|max:1|',
                'alamat' => '|unique:siswa|',
                'no_hp' => '|unique:siswa|max:20',
                'no_hp_ortu' => '|max:20',
                'angkatan' =>'|digits:4|numeric|regex:/^([1-9][0-9]+)/',
            ]);
    	$data = new Siswa();
        $data->NIS = $request->NIS;
        $data->nama_siswa = $request->nama_siswa;
        $data->id_kelas = $request->id_kelas;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->alamat = $request->alamat;
        $data->no_hp = $request->no_hp;
        $data->nama_ortu =$request->nama_ortu;
        $data->no_hp_ortu = $request->no_hp_ortu;
        $data->angkatan = $request->angkatan;
        $data->save();
        return redirect('/admin/datasiswa/kelolaSiswa')->with('alert success', 'Data berhasil ditambahkan');
    }

    public function updateSiswa($NIS){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            $data_siswa = Siswa::find($NIS);
            $data_kelas = Kelas::all();
            return view('adm/updateSiswa', ['data_siswa'=>$data_siswa, 'data_kelas'=>$data_kelas]);
        }
    }

    public function ubahSiswa(Request $request){
        $siswa = Siswa::find($request->NIS);
        $siswa->update($request->all());
        return redirect('/admin/datasiswa/kelolaSiswa')->with('alert warning', 'Data berhasil diubah');
    }
}
