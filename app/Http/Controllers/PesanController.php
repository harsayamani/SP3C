<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\Pesan\ValidationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Pesan;
use App\Siswa;
use App\Outbox;
use App\Inbox;
use App\Sentitems;

class PesanController extends Controller
{
    
    public function form()
    {
        $siswa = Siswa::all();
        $pesan = Pesan::all();
        $inbox = Inbox::orderBy('ReceivingDateTime', 'desc')->get();
        $sent = Sentitems::orderBy('ID', 'desc')->get();
        $sent_count = Sentitems::all();
        $i = 0; 

        if(!Session::get('loginSPP')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            return view('spp/kirimNotifikasi', compact('siswa', 'pesan', 'inbox', 'sent', 'i'));
        }
    }
 
    
    public function send(Request $request)
    {

        $nama = $request->nama;
        $pesan = $request->pesan;
        
        try {
          for ($i=0; $i <count($request->no_hp_ortu) ; $i++) { 
            $basic  = new \Nexmo\Client\Credentials\Basic('0a3fdb5e', 'mVHelRccDZFXU8RI');
            $client = new \Nexmo\Client($basic);

            $message = $client->message()->send([
                'to' => $request->no_hp_ortu[$i],
                'from' => $nama,
                'text' => $pesan
            ]);

            $nama_ortu = Siswa::where('no_hp_ortu', $request->no_hp_ortu[$i])->value('nama_ortu');

            $response = $message->getResponseData();

            if ($response['messages'][0]['status'] == 0) {
                $log_pesan = new Pesan;
                $log_pesan->contact_number = $request->no_hp_ortu[$i];
                $log_pesan->contact_name = $nama_ortu;
                $log_pesan->message = $pesan;
                $log_pesan->save();
                return redirect('/spp/notifikasiPembayaran')->with('alert success', 'Pesan berhasil dikirim');
            }else{
                return redirect('/spp/notifikasiPembayaran')->with('alert danger', 'Pesan gagal dikirim');
            }
        }
        }
        catch (\Exception $e) {
            return redirect('/spp/notifikasiPembayaran')->with('alert danger', 'Nomor tidak terdaftar');
        }

    }

    public function sendGammu(Request $request){
        $nama = $request->nama;
        $pesan = $request->pesan;
        
        try {
          for ($i=0; $i <count($request->no_hp_ortu) ; $i++) { 
            
            $message = new Outbox;

            $message->DestinationNumber = $request->no_hp_ortu[$i];
            $message->TextDecoded = $pesan;
            $message->CreatorID = $nama;
            $message->save();

            $nama_ortu = Siswa::where('no_hp_ortu', $request->no_hp_ortu[$i])->value('nama_ortu');

            if ($message) {
                $log_pesan = new Pesan;
                $log_pesan->contact_number = $request->no_hp_ortu[$i];
                $log_pesan->contact_name = $nama_ortu;
                $log_pesan->message = $pesan;
                $log_pesan->save();
                return redirect('/spp/notifikasiPembayaran')->with('alert success', 'Pesan berhasil dikirim');
            }else{
                return redirect('/spp/notifikasiPembayaran')->with('alert danger', 'Pesan gagal dikirim');
            }
        }
        }
        catch (\Exception $e) {
            return redirect('/spp/notifikasiPembayaran')->with('alert danger', 'error : '.$e);
        }
    }

    public function pesanMasuk(){
        $inbox = Inbox::orderBy('ReceivingDateTime', 'desc')->get();
        $i=0;
        if(!Session::get('loginSPP')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            return view('spp/pesanMasuk', compact('inbox','i'));
        }
    }

    public function detailPesan($ID){
        $dtl_inbox = Inbox::find($ID);
        $inbox = Inbox::orderBy('ReceivingDateTime', 'desc')->get();

        if(!Session::get('loginSPP')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }else{
            return view('spp/detailPesan', compact('dtl_inbox', 'inbox'));
        }
    }

    public function hapusPesan($ID){
        $inbox = Inbox::find($ID);
        $inbox->delete($inbox);

        return redirect('/spp/pesanMasuk')->with('alert danger', 'Pesan Berhasil Dihapus');
    }
}