<?php

namespace App\Http\Controllers;
use Auth; //untuk auth
use App\User;
use App\Lembaga;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{



    public function register(){

        $Datalembaga = Lembaga::all();
        
        return view('register',compact('Datalembaga'));
    }
    //
	//fungsi proses login post ambil request
    public function prosesLogin(Request $request){
        //remember
        $ingat = $request->remember ? true : false; //jika di ceklik true jika tidak false
        //akan ingat selama 5 tahun jika tidak logout
    	 
    	//auth()->attempt buat proses login  request input username dan password,  request input  sama kayak $request->password dan usernamenya, ditambah $ingat jika pengen ingat
    	if(auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $ingat)){
    		//auth->user() untuk memanggil data user yang sudah login
    		 if(auth()->user()->role == "admin"){
                return redirect()->route('dashboard-admin');//route itu isinya name dari route di web.php
             }else if(auth()->user()->role == "pemesan"){
                return redirect()->route('dashboard-pemesan');//route itu isinya name dari route di web.php
             }else if(auth()->user()->role == "super_admin"){
                return redirect()->route('dashboard-superadmin');//route itu isinya name dari route di web.php
             }
    	}else{
             alert()->error('akun tidak ada');
            return redirect()->route('login'); //route itu isinya name dari route di web.php

        }


    }

    //proses logout
    public function logout(){
        
        auth()->logout(); //logout
        
        return redirect()->route('login');
        

    }

    //register
    public function prosesregister(Request $request){
        $messages = [
        'required' => ':attribute wajib diisi',
        'min' => ':attribute harus diisi minimal :min karakter',
        'max' => ':attribute harus diisi maksimal :max karakter',
        'same' => ':attribute harus sama dengan re password',
        ];
 
            //validasi
        $this->validate($request, [
            //pasword validasinya repassword
            'password' => 'min:8|required_with:repassword|same:repassword',
            'repassword' => 'min:8'
        ], $messages);

        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'nohp' => $request['nohp'],
            'alamat' => $request['alamat'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'pendidikan' => $request['pendidikan'],
            'role' => $request['role']="pemesan",
            'status' => $request['role']="aktif",
            'password' => Hash::make($request['password']),
            
        ]);

        alert()->success('Tunggu Verifikasi Untuk Aktivasi Akun Anda','Register Berhasil');
        return redirect('/')->with(['success' => 'Register Berhasil']);
    }
}
