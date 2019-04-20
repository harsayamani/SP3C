<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\BulanSPP;
use App\Jenjang;
use App\SPP;
use App\Kelas;

class AdminSPPController extends Controller
{
    public function bulanSPP(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
    	   $data_bulan_spp = BulanSPP::all();
    	   $data_jenjang = Jenjang::all();
           return view('/adm/kelolaBulanSPP', compact('data_bulan_spp', 'data_jenjang'));
        }
    }

    public function tambahBulan(Request $request){
        $this->validate($request, [
                'id_bulan=' => '|unique:bulan_spp|digits:6|numeric|regex:/^([1-9][0-9]+)/',
                'nama_bulan' => '|unique:bulan_spp',
                'jumlah_spp' => '|max:12|regex:/^([1-9][0-9]+)/'
            ]);
    	$data = new BulanSPP();
        $data->id_bulan = $request->id_bulan;
        $data->nama_bulan = $request->nama_bulan;
        $data->id_jenjang = $request->id_jenjang;
        $data->jumlah_spp = $request->jumlah_spp;
        $data->save();
        return redirect('/admin/datapembayaran/spp/bulanSPP')->with('alert success', 'Data berhasil ditambahkan');
    }

    public function hapusBulan($id_bulan){
        $bulan_spp = BulanSPP::find($id_bulan);
        $bulan_spp->delete($bulan_spp);
        return redirect('/admin/datapembayaran/spp/bulanSPP')->with('alert danger', 'Data berhasil dihapus');
    }

    public function ubahRincian(Request $request){
        $bulan_spp = BulanSPP::find($request->id_bulan);
        $bulan_spp->update($request->all());
        return redirect('/admin/datapembayaran/spp/bulanSPP')->with('alert warning', 'Data berhasil diubah');
    }

    public function kelolaSPP(){
    	$data_spp = SPP::all();
    	$data_bulan_spp = BulanSPP::all();
    	return view('adm/kelolaSPP', compact('data_spp', 'data_bulan_spp'));
    }
}
