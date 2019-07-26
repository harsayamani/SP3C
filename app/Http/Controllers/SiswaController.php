<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Siswa;
use App\Jenjang;
use Illuminate\Support\Facades\Session;
use App\LogSistem;
use App\Angkatan;

class SiswaController extends Controller
{
    public function formSiswa(){
        $data_kelas = Kelas::all();
        $log = LogSistem::orderBy('tgl', 'desc')->get();
        $angkatan = Angkatan::all();
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
           return view('adm/formSiswa', compact('data_kelas', 'log', 'angkatan')); 
        }
    }

    public function kelolaSiswa(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            $i=0;
            $data_siswa = Siswa::orderBy('id_kelas', 'asc')->get();
            $log = LogSistem::orderBy('tgl', 'desc')->get();
            return view('adm/kelolaSiswa', compact('data_siswa', 'i', 'log'));
        }
    }

    public function hapusSiswa($NIS){
        $siswa = Siswa::find($NIS);
        $siswa->delete($siswa);
        return redirect('/admin/datasiswa/kelolaSiswa')->with('alert danger', 'Data berhasil dihapus');
    }

    public function tambahSiswa(Request $request){
    	$this->validate($request, [
                'NIS=' => '|unique:siswa|digits:9|numeric|regex:/^([1-9][0-9]+)/',
                'nama_siswa' => '|unique:siswa|',
                'jenis_kelamin' => '|max:1|',
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
        $data_siswa = Siswa::find($NIS);
        $data_kelas = Kelas::all();
        $log = LogSistem::orderBy('tgl', 'desc')->get();
        $angkatan = Angkatan::all();

        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            return view('adm/updateSiswa', compact('data_siswa', 'data_kelas', 'log', 'angkatan'));
        }
    }

    public function ubahSiswa(Request $request){
        $this->validate($request, [
                'NIS=' => '|digits:9|numeric|regex:/^([1-9][0-9]+)/',
                'jenis_kelamin' => '|max:1|',
                'no_hp' => '|max:20',
                'no_hp_ortu' => '|max:20',
                'angkatan' =>'|digits:4|numeric|regex:/^([1-9][0-9]+)/',
            ]);

        $siswa = Siswa::find($request->NIS);
        $siswa->update($request->all());
        return redirect('/admin/datasiswa/kelolaSiswa')->with('alert warning', 'Data berhasil diubah');
    }

    public function getNis(Request $request){
        $id_kelas = $request->id;
        $id_jenjang = Kelas::where('id_kelas', $id_kelas)->value('id_jenjang');
        
        $NIS = Siswa::where('id_kelas', $id_kelas)->latest()->first()->NIS;

        if ($id_jenjang == 4324325) {
            if ($NIS->count()>0) {
                $NIS += 1;
            }else {
                $NIS = 000010001;
            }
        }elseif ($id_jenjang == 4537278) {
            if ($NIS->count()>0) {
                $NIS += 1;
            }else {
                $NIS = 000007001;
            }
        }elseif ($id_jenjang == 4627275) {
            if ($NIS->count()>0) {
                $NIS += 1;
            }else {
                $NIS = 000009001;
            }
        }else {
            $NIS = 000000000;
        }

        return response()->json([
                'NIS' => $NIS,
            ], 200);
    }
}
