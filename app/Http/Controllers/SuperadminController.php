<?php

namespace App\Http\Controllers;


use Auth; //untuk auth
use App\User;
use App\Admin;
use App\Booking;
use App\Lembaga;
use App\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Alert;
use File;

class SuperadminController extends Controller
{
    //
  	
  	public function index(){

    	return view('super-admin.index');
    }

	public function kelolalembaga(){

		
		$Daftarlembaga = Lembaga::all();

    	return view('super-admin.kelola_lembaga',compact('Daftarlembaga'));
    }



    public function addlembaga(Request $request){
    	$Tambahlembaga = new Lembaga();

        $Tambahlembaga->nama_lembaga = $request->input('nama_lembaga');
        $Tambahlembaga->alamat = $request->input('alamat');
        
	   	$Tambahlembaga->save();
       
        return redirect('/superadmin-kelolalembaga');

    	
    }

    public function detaillembaga($id){//$id mengambil id lembaga
    	$Detaillembaga = Lembaga::where('id',$id)->get();
    	$Dataadmin = User::Where('id_lembaga',$id)->where('role','admin')->get();
	

    	return view('super-admin.detail_lembaga',compact('Detaillembaga','Dataadmin'));
    }


    public function tambahadmin(Request $request){

    	 User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'id_lembaga' => $request['id_lembaga'],
            'role' => $request['role']="admin",
            'status' => $request['status']="aktif",
            'password' => Hash::make($request['password']),
            
        ]);;
       
        return redirect()->back();
    	
    }


    public function destroylembaga($id){
   
        $Lembaga = Lembaga::find($id);
        //File::delete('uploads/imagepaket/'.$Paket->image);//fungsi untuk menghapus image paket
            
        $Lembaga->delete();
    
    alert()->success('Data Berhasil Dihapus');
    return redirect()->back();

}

}
