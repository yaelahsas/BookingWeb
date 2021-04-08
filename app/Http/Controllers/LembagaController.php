<?php

namespace App\Http\Controllers;

use Auth; //untuk auth
use App\User;
use App\Paket;
use App\Booking;
use App\Lembaga;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Validator;

class LembagaController extends Controller
{
 

 //fungsi untuk berpindah ke halaman lembaga yang dipilih
	public function index($id){
		$Datalembaga = Lembaga::all();//mengambil data lembaga
		$Namalembaga = Lembaga::where('id',$id)->get();//mengambuil nama lembaga
    	$Datapaket = Paket::where('id_lembaga',$id)->get();//mengambil paket sesuai dengan lembaga yang dipilih

    	//paket akan ditampilkan sesuai dengan lembaga yang dipilih.
    	return view('lembaga.index',compact('Datapaket','Datalembaga','Namalembaga'));
    }



}
