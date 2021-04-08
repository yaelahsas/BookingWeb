<?php

namespace App\Http\Controllers;

use Auth; //untuk auth
use App\User;
use App\Paket;
use App\Booking;
use App\Admin;
use App\Lembaga;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //

     public function index(){

    	return view('admin.index');
    }


    public function infobooking(){
    	$Infobooking = Booking::where('id','0')->get();//kondisi awal sebelum kode booking dicari, yaitu menampilkan data yang tidak ada di database agar kondisi awal kosong
    	
    	return view('admin.info_booking',compact('Infobooking'));
    }


    // fungsi untuk mencari informasi booking sesuai dengan kode
    public function carikode(Request $request){
       
        $cari = $request->carikode;

    	 // proses pencarian data booking sesuai dengan kode yang dimasukkan
		$Infobooking = Booking::where('status_booking','sukses')->where('id_lembaga',Auth::user()->id_lembaga)->where('kode_booking',$cari)->with('infopemesan')->with('Paket')->get();
    
	    $infopemesan = User::where('role','pemesan')->get();
	    $Paket = Paket::all();

        return view('admin.info_booking',compact('Infobooking'));
    }


     public function add_profil(Request $request){
        $Tambah_profil = new Admin();

        $Tambah_profil->nama_admin = $request->input('nama_admin');
        $Tambah_profil->id_lembaga = $request->input('id_lembaga');
        $Tambah_profil->id_user = $request->input('id_user');
        
        
        $Tambah_profil->save();
       
        return redirect('/paket-tambahpaket');

    }
    
}
