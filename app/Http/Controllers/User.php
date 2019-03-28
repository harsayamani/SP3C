<?php

namespace App\Http\Controllers;

use App\modelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda harus login terlebih dulu');
        }
        else{
            return view('user');
        }
    }


    public function loginPost(Request $request){

        $username = $request->username;
        $password = $request->password;

        $data = modelUser::where('username', $username)->first();

        if($username=="admin"){
        	if($data){ //apakah email tersebut ada atau tidak
	            if($data->password==$password){
	                Session::put('name',$data->name);
	                Session::put('username',$data->username);
	                Session::put('loginAdmin',TRUE);
	                return redirect('/admin/dashboard');
	            }
	            else{
	                return redirect('login')->with('alert','Password, Salah !');
	            }
	        }
	        else{
	            return redirect('login')->with('alert','Username, Salah!');
	        }
        }elseif ($username=="bendaharapsb") {
        	if($data){ //apakah email tersebut ada atau tidak
	            if($data->password==$password){
	                Session::put('name',$data->name);
	                Session::put('username',$data->username);
	                Session::put('loginPSB',TRUE);
	                return redirect('psb/dashboard');
	            }
	            else{
	                return redirect('login')->with('alert','Password, Salah !');
	            }
	        }
	        else{
	            return redirect('login')->with('alert','Username, Salah!');
	        }
        }elseif ($username=="bendaharaspp") {
        	if($data){ //apakah email tersebut ada atau tidak
	            if($data->password==$password){
	                Session::put('name',$data->name);
	                Session::put('username',$data->username);
	                Session::put('loginSPP',TRUE);
	                return redirect('spp/dashboard');
	            }
	            else{
	                return redirect('login')->with('alert','Password, Salah !');
	            }
	        }
	        else{
	            return redirect('login')->with('alert','Username, Salah!');
	        }
        }else{
        	return redirect('login')->with('alert','Username atau Password, Salah!');
        }  
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Anda sudah logout');
    }


}
