<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\Pesan\ValidationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Pesan;
 
/**
 * @author Yugo <dedy.yugo.purwanto@gmail.com>
 * @copyright Laravel.web.id - 2016
 */
class PesanController extends Controller
{
    /**
     * Show form for send messae
     */
    public function form()
    {
        return view('spp/kirimNotifikasi');
    }
 
    /**
     * @param ValidationRequest $request
     */
    public function send(ValidationRequest $request)
    {

    	// $this->validate($request, [
     //            'number'  => 'required|max:30',
	    //         'name'    => 'required|string|max:50',
	    //         'message' => 'required',
     //        ]);

        abort_if(!function_exists('curl_init'), 400, 'CURL is not installed.');
 
        $curl = curl_init('https://smsgateway.me/api/v4/message/send');
 
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'email'    => config('smsgateway.email'),
            'password' => config('smsgateway.password'),
            'device'   => config('smsgateway.device'),
            'number'   => $request->number,
            'name'     => $request->name,
            'message'  => $request->message,
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
        $response = json_decode(curl_exec($curl));
 
        curl_close($curl);
 
        if ($response->success === true) {
            if (!empty($response->result->fails)) {
                \Log::debug($response->result->fails);
            } else {
                foreach ($response->result->success as $success) {
                    $messages[] = [
                        'type'           => 'outbox',
                        'contact_id'     => $success->contact->id,
                        'contact_name'   => $success->contact->name,
                        'contact_number' => $success->contact->number,
                        'device_id'      => $success->device_id,
                        'message'        => $success->message,
                        'expired_at'     => \Carbon\Carbon::now()->timestamp($success->expires_at),
                        'created_at'     => \Carbon\Carbon::now(),
                        'updated_at'     => \Carbon\Carbon::now(),
                    ];
                }
 
                Pesan::insert($messages);
 
                return redirect()
                    ->route('spp/notifikasiPembayaran')
                    ->withSuccess('Message has been sent successfully.');
            }
        } else {
            \Log::debug(json_encode($response->errors));
        }
 
        return redirect()
            ->back()
            ->withError('Failed to send message.');
    }
}