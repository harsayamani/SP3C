<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\BulanSPP;
use App\Jenjang;
use App\SPP;
use App\Kelas;
use App\Siswa;
use App\LogSistem;

class AdminSPPController extends Controller
{
    public function bulanSPP(){
        $data_bulan_spp = BulanSPP::all();
        $log = LogSistem::orderBy('tgl', 'desc')->get();
        $i = 1;

        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
           return view('/adm/kelolaBulanSPP', compact('data_bulan_spp', 'log', 'i'));
        }
    }

    public function tambahBulan(Request $request){
        $this->validate($request, [
                'id_bulan=' => '|unique:bulan_spp|digits:6|numeric|regex:/^([1-9][0-9]+)/',
                'nama_bulan' => '|unique:bulan_spp',
                'spp_sma' => '|max:12|regex:/^([1-9][0-9]+)/',
                'spp_smp' => '|max:12|regex:/^([1-9][0-9]+)/',
                'spp_idady' => '|max:12|regex:/^([1-9][0-9]+)/'
            ]);
    	$data = new BulanSPP();
        $data->id_bulan = $request->id_bulan;
        $data->nama_bulan = $request->nama_bulan;
        $data->thn_ajaran = $request->thn_ajaran;
        $data->spp_smp = $request->spp_smp;
        $data->spp_sma = $request->spp_sma;
        $data->spp_idady = $request->spp_idady;
        $data->save();
        return redirect('/admin/datapembayaran/spp/bulanSPP')->with('alert success', 'Data berhasil ditambahkan');
    }

    public function hapusBulan($id_bulan){
        $bulan_spp = BulanSPP::find($id_bulan);
        $bulan_spp->delete($bulan_spp);
        return redirect('/admin/datapembayaran/spp/bulanSPP')->with('alert danger', 'Data berhasil dihapus');
    }

    public function ubahBulan(Request $request){
        $bulan_spp = BulanSPP::find($request->id_bulan);
        $bulan_spp->update($request->all());
        return redirect('/admin/datapembayaran/spp/bulanSPP')->with('alert warning', 'Data berhasil diubah');
    }

    public function kelolaSPP(){
    	$spp = SPP::orderBy('id_bulan', 'asc')->get();
    	$data_bulan_spp = BulanSPP::all();
        $log = LogSistem::orderBy('tgl', 'desc')->get();

        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else {
            return view('adm/kelolaSPP', compact('spp', 'data_bulan_spp', 'log'));
        }
    }

    public function filter(Request $request){
        $spp = SPP::where('id_bulan', $request->id_bulan)->get();
        $log = LogSistem::orderBy('tgl', 'desc')->get();
        $data_bulan_spp = BulanSPP::all();

        return view('adm/kelolaSPP', compact('data_bulan_spp', 'spp', 'log'));
    }

    public function resetData(){
        $spp = SPP::whereNotNull('id_spp')->delete();;
        return redirect('/admin/datapembayaran/spp')->with('alert danger', 'Semua data berhasil dihapus');
    }
}
