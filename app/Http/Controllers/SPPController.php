<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Siswa;
use App\SPP;
use App\BulanSPP;
use App\Jenjang;
use App\Kelas;
use App\modelUser;
use App\Inbox;
use Carbon\Carbon;

class SPPController extends Controller
{
    public function index(){
        $jumlah = 0;
    	$siswa = Siswa::count();
        $spp = SPP::all();
        $transaksi = SPP::count();
        $lunas = SPP::where('status_pembayaran', "1")->count();
        $inbox = Inbox::orderBy('ReceivingDateTime', 'desc')->get();

        foreach ($spp as $spp) {
            $jumlah = $jumlah + $spp->nominal_spp ;
        }

    	if(!Session::get('loginSPP')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
	    }else{
	 	    return view('/spp/dashboardSPP', compact('siswa', 'jumlah', 'transaksi', 'lunas', 'inbox'));
	    }
    }

    public function pembayaran(){
    	$siswa = Siswa::all();
        $inbox = Inbox::orderBy('ReceivingDateTime', 'desc')->get();

    	if(!Session::get('loginSPP')){
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    	}else{
	 	    return view('/spp/kelolaPembayaranSPP', compact('siswa', 'spp', 'inbox'));
    	}
    }

    public function cetakKwitansi($id_spp){
        $spp = SPP::find($id_spp);
        $bendahara = Session::get('name');

        return view('/spp/cetakKwitansi', compact('spp', 'bendahara'));
    }

    public function detailPembayaran($NIS){
    	$siswa = Siswa::where('NIS', $NIS)->first();
        $date = Carbon::now()->toDateString();
    	$spp = SPP::all();
        $bulan = BulanSPP::all();
        $inbox = Inbox::orderBy('ReceivingDateTime', 'desc')->get();

    	if (!Session::get('loginSPP')) {
	    	return redirect('login')->with('alert','Anda harus login terlebih dulu');
    	}else{
    		return view('/spp/detailSPP', ['spp'=>$spp, 'siswa'=>$siswa, 'bulan'=>$bulan, 'inbox'=>$inbox, 'date'=>$date]);
    	}
    }

    public function lunasiSPP(Request $request){
        $spp_lama = SPP::where('id_spp', $request->id_spp)->first()->nominal_spp;

        $spp_baru = SPP::where('id_spp', $request->id_spp)->first();
        $spp_baru->id_spp = $request->id_spp;
        $spp_baru->tgl_pembayaran = $request->tgl;
        $spp_baru->nominal_spp = $spp_lama + $request->nominal;

        $NIS = SPP::where('id_spp', $request->id_spp)->first()->NIS;

        $id_kelas = Siswa::where('NIS', $NIS)->first()->id_kelas;

        $id_jenjang = Kelas::where('id_kelas', $id_kelas)->first()->id_jenjang;

        $jenjang = Jenjang::where('id_jenjang', $id_jenjang)->first()->nama_jenjang;

        $bln = SPP::where('id_spp', $request->id_spp)->first()->id_bulan;
        
        $bulan = BulanSPP::where('id_bulan', $bln)->first();

        if ($jenjang == "SMA") {
            if (($spp_lama + $request->nominal) < $bulan->spp_sma) {
                $spp_baru->status_pembayaran = 0;
            }else{
                $spp_baru->status_pembayaran = 1;
            }
        }else if ($jenjang == "SMP") {
            if (($spp_lama + $request->nominal) < $bulan->spp_smp) {
                $spp_baru->status_pembayaran = 0;
            }else{
                $spp_baru->status_pembayaran = 1;
            }
        }else if ($jenjang == "I'dady") {
            if (($spp_lama + $request->nominal) < $bulan->spp_idady) {
                $spp_baru->status_pembayaran = 0;
            }else{
                $spp_baru->status_pembayaran = 1;
            }
        }

        $spp_baru->save();
        return redirect()->back()->with('alert success', 'Data berhasil ditambahkan');
    }

    public function bayarSPP(Request $request){
        $this->validate($request, [
                'nominal' => '|max:6|regex:/^([1-9][0-9]+)/',
            ]);

        $id_bulan = SPP::where('NIS', $request->NIS)->where('id_bulan', $request->id_bulan)->count();

        if ($id_bulan<1) {
                $spp = new SPP;
                $spp->id_spp = uniqid();
                $spp->NIS = $request->NIS;
                $spp->id_bulan = $request->id_bulan;
                $spp->nominal_spp = $request->nominal;
                $spp->tgl_pembayaran = $request->tgl_pembayaran;

                $id_kelas = Siswa::where('NIS', $request->NIS)->first()->id_kelas;

                $id_jenjang = Kelas::where('id_kelas', $id_kelas)->first()->id_jenjang;

                $jenjang = Jenjang::where('id_jenjang', $id_jenjang)->first()->nama_jenjang;
                
                $bulan = BulanSPP::where('id_bulan', $request->id_bulan)->first();

                if ($jenjang == "SMA") {
                    if ($request->nominal < $bulan->spp_sma) {
                        $spp->status_pembayaran = 0;
                    }else{
                        $spp->status_pembayaran = 1;
                    }
                }else if ($jenjang == "SMP") {
                    if ($request->nominal < $bulan->spp_smp) {
                        $spp->status_pembayaran = 0;
                    }else{
                        $spp->status_pembayaran = 1;
                    }
                }else if ($jenjang == "I'dady") {
                    if ($request->nominal < $bulan->spp_idady) {
                        $spp->status_pembayaran = 0;
                    }else{
                        $spp->status_pembayaran = 1;
                    }
                }

                $spp->save();

                return redirect()->back()->with('alert success', 'Pembayaran Berhasil');
            }else{
                return redirect()->back()->with('alert danger', 'SPP bulan ini sudah dibayar');
            }
        
    }
}
