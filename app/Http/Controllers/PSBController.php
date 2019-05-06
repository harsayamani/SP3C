<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Siswa;
use App\Kelas;
use App\Jenjang;
use App\PSB;
use App\Rincian;
use DB;

class PSBController extends Controller
{
    public function index(){
    	if(!Session::get('loginPSB')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	 	    return view('/psb/dashboardPSB');
	    }
    }

    public function pembayaran(){
    	$val = "1";
    	$id_kelas = Kelas::where('id_jenjang', 4627275)->pluck('id_kelas');

    	$siswa_baru = Siswa::where('id_kelas', $id_kelas)->get();

    	if(!Session::get('loginPSB')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	 	    return view('/psb/pembayaranPSB', compact('siswa_baru'));
	    }
    }

    public function detail($NIS){
    	$siswa = Siswa::where('NIS', $NIS)->first();
    	$rincian = Rincian::all();
    	$psb = PSB::all();
        $rnc_psb = PSB::where('NIS', $NIS)->get();

    	if (!Session::get('loginPSB')) {
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    	}else{
    		return view('/psb/detailPSB', ['psb'=>$psb, 'siswa'=>$siswa, 'rincian'=>$rincian, 'rnc_psb'=>$rnc_psb]);
    	}

    }

    public function bayarPSB(Request $request){
        $this->validate($request, [
                'nominal' => '|max:6|regex:/^([1-9][0-9]+)/',
            ]);

        $psb = new PSB;
        $psb->id_psb = uniqid();
        $psb->NIS = $request->NIS;
        $psb->id_rincian = $request->id_rincian;
        $psb->nominal = $request->nominal;
        $psb->tgl_pembayaran = $request->tgl_pembayaran;
        
        $rincian = Rincian::where('id_rincian', $request->id_rincian)->first();

        if ($request->nominal < $rincian->biaya) {
            $psb->status_pembayaran = 0;
        }else{
            $psb->status_pembayaran = 1;
        }

        $psb->save();

        return redirect()->back()->with('alert success', 'Pembayaran berhasil');
    }

    public function lunasiPSB(Request $request){
        $psb_lama = PSB::where('id_psb', $request->id_psb)->first()->nominal;

        $psb_baru = PSB::where('id_psb', $request->id_psb)->first();
        $psb_baru->id_psb = $request->id_psb;
        $psb_baru->tgl_pembayaran = $request->tgl;
        $psb_baru->nominal = $psb_lama + $request->nominal;

        $id_rincian = PSB::where('id_psb', $request->id_psb)->first()->id_rincian;
        
        $rincian = Rincian::where('id_rincian', $id_rincian)->first();

        if (($psb_lama + $request->nominal) < $rincian->biaya) {
            $psb_baru->status_pembayaran = 0;
        }else{
            $psb_baru->status_pembayaran = 1;
        }

        $psb_baru->save();
        return redirect()->back()->with('alert success', 'Data berhasil ditambahkan');
    }
}
