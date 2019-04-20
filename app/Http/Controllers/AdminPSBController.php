<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Rincian;
use App\Kelas;
use App\PSB;

class AdminPSBController extends Controller
{
    public function rincian(){
        if(!Session::get('loginAdmin')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            $data_rincian = Rincian::all();
            return view('/adm/kelolaRincian', ['data_rincian'=>$data_rincian]);
        }
    }

    public function tambahRincian(Request $request){
        $this->validate($request, [
                'id_rincian=' => '|unique:rincian_psb|digits:6|numeric|regex:/^([1-9][0-9]+)/',
                'detail_rincian' => '|unique:rincian_psb',
                'biaya' => '|max:12|regex:/^([1-9][0-9]+)/'
            ]);
    	$data = new Rincian();
        $data->id_rincian = $request->id_rincian;
        $data->detail_rincian = $request->detail_rincian;
        $data->biaya = $request->biaya;
        $data->save();
        return redirect('/admin/datapembayaran/psb/rincian')->with('alert success', 'Data berhasil ditambahkan');
    }

    public function hapusRincian($id_rincian){
        $rincian = Rincian::find($id_rincian);
        $rincian->delete($rincian);
        return redirect('/admin/datapembayaran/psb/rincian')->with('alert danger', 'Data berhasil dihapus');
    }

    public function ubahRincian(Request $request){
        $rincian = Rincian::find($request->id_rincian);
        $rincian->update($request->all());
        return redirect('/admin/datapembayaran/psb/rincian')->with('alert warning', 'Data berhasil diubah');
    }

    public function kelolaPSB(){
        $data_psb = PSB::all();
        $data_kelas = Kelas::all();
        return view('adm/kelolaPSB', compact('data_psb', 'data_kelas'));
    }
}
