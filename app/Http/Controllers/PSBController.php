<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Siswa;
use App\Kelas;
use App\Jenjang;
use App\PSB;
use App\Rincian;
use App\BulanSPP;
use DB;
use Carbon\Carbon;

class PSBController extends Controller
{
    public function index(){
        $jumlah = 0;
        $siswa = Siswa::count();
        $psb = PSB::all();
        $transaksi = PSB::count();
        $lunas = PSB::where('status_pembayaran', "1")->count();

        foreach ($psb as $psb) {
            $jumlah = $jumlah + $psb->nominal;
        }

    	if(!Session::get('loginPSB')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	 	    return view('/psb/dashboardPSB', compact('siswa', 'psb', 'transaksi', 'lunas', 'jumlah'));
	    }
    }

    public function pembayaran(){

    	$siswa_baru = Siswa::all();

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
        $date = Carbon::now()->toDateString();

    	if (!Session::get('loginPSB')) {
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    	}else{
    		return view('/psb/detailPSB', ['psb'=>$psb, 'siswa'=>$siswa, 'rincian'=>$rincian, 'rnc_psb'=>$rnc_psb, 'date'=>$date]);
    	}

    }

    public function bayarPSB(Request $request){
        $this->validate($request, [
                'nominal' => '|max:7|regex:/^([1-9][0-9]+)/',
            ]);
        // $NIS = PSB::where('NIS', $request->NIS)->value('id_rincian');

        $psb = PSB::where('NIS', $request->NIS)->count();
        // $rincian = Rincian::where('id_rincian', $NIS)->value('detail_rincian');
        
        $id_rincian_all = PSB::where('NIS', $request->NIS)->where('id_rincian', 583010)->count();
        $id_rincian = PSB::where('NIS', $request->NIS)->where('id_rincian', $request->id_rincian)->count();

            if ($id_rincian_all>0) {
                return redirect()->back()->with('alert danger', 'Pembayaran Sudah Dilakukan');
            }elseif($id_rincian_all<1){
                if ($request->id_rincian!=583010 || $id_rincian <1) {
                    $psb = new PSB;
                    $psb->id_psb = uniqid();
                    $psb->NIS = $request->NIS;
                    $psb->id_rincian = $request->id_rincian;
                    $psb->nominal = $request->nominal;
                    $psb->tgl_pembayaran = $request->tgl_pembayaran;
                    
                    $rincian = Rincian::where('id_rincian', $request->id_rincian)->first();

                    if ($request->nominal < $rincian->biaya) {
                        $psb->status_pembayaran = 0;
                    }
                    elseif($request->nominal > $rincian->biaya){
                        return redirect()->back()->with('alert danger', 'Nominal tidak boleh lebih dari Rp.'.$rincian->biaya);
                    }
                    else{
                        $psb->status_pembayaran = 1;
                    }

                    $psb->save();

                    return redirect()->back()->with('alert success', 'Pembayaran berhasil');
                }else{
                    return redirect()->back()->with('alert danger', 'Pembayaran Sudah Dilakukan');
                }
            }
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
        }elseif ($request->nominal > $rincian->biaya-$psb_lama) {
            return redirect()->back()->with('alert danger', 'Nominal tidak boleh lebih dari Rp.'.($rincian->biaya-$psb_lama));
        }else{
            $psb_baru->status_pembayaran = 1;
        }

        $psb_baru->save();
        return redirect()->back()->with('alert success', 'Data berhasil ditambahkan');
    }

    public function cetakNota($NIS){
        $siswa = Siswa::find($NIS);
        $psb = PSB::where('NIS', $NIS)->get();
        $bendahara = Session::get('name');
        $rincian = Rincian::all();
        $thn_ajaran = BulanSPP::value('thn_ajaran');

         return view('/psb/cetakNota', compact('psb', 'bendahara', 'siswa', 'thn_ajaran', 'rincian'));
    }

    public function cetakKwitansi($NIS){
        $siswa = Siswa::find($NIS);
        $psb = PSB::where('NIS', $NIS)->get();
        $bendahara = Session::get('name');
        $rincian = Rincian::all();
        $total=0;

        $tgl_pembayaran = PSB::where('NIS', $NIS)->orderBy('tgl_pembayaran', 'desc')->value('tgl_pembayaran');

        foreach ($psb as $psb) {
            $total = $total+$psb->nominal;
        }

        return view('/psb/cetakBukti', compact('siswa', 'psb', 'bendahara', 'tgl_pembayaran', 'total', 'rincian'));
    }
}
