<?php

namespace App\Http\Controllers;

use Auth; //untuk auth
use App\User;
use App\Booking;
use App\Lembaga;
use App\Paket;
use Illuminate\Http\Request;
use Alert;
use File;

use Illuminate\Support\Facades\Validator;

class PemesanController extends Controller
{
    //
    public function index(){

    	$Datalembaga = Lembaga::all();

    	return view('pemesan.index',compact('Datalembaga'));
    }


    public function profil(){

             $userpemesan = User::where('id',Auth::user()->id)->get();
             $Datalembaga = Lembaga::all();
             return view('pemesan.edit_profil',compact('userpemesan','Datalembaga'));
            
      
    }


    public function updatefoto(Request $request ,$id){

        $fotopemesan = User::find($id);
        	//menghapus foto yang sebelumnya sesuai dengan yang ada dalam databas untuk di ganti dengan foto baru.

            // File::delete('uploads/fotoprofil/'.$fotopemesan->image);
            // $fotopemesan->delete();  
        
       //fungsi untuk menguopload foto batu
        if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/fotoprofil/', $filename);
                $fotopemesan->image = $filename;
              
            }else{
                echo "Gagal upload gambar";
            }

            $fotopemesan->save();

         alert()->success('Berhasil','Update Fotoprofil');
        return redirect('/editprofil');
    }


   


    public function updateprofil(Request $request,$id){

     	 $pemesan = User::where('id', $id);

            $input =([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
           
        ]);
            
        $pemesan->update($input);
       
        alert()->success('Berhasil','Update Profil');
        return redirect()->back();

    }


    	//cek status booking
     public function bookingpending(){

     		$statusbooking = Booking::where('status_booking','pending')->where('id_user',Auth::user()->id)->with('Paket')->with('Lembaga')->orderBy('id', 'DESC')->get();
            // $token = Booking::where('id', $last_id)->first();
           // dd($statusbooking);
     		$Paket = Paket::all();	
     		$Lembaga = Lembaga::all();//untuk ambil nama lembaga dan ditampilkan di status booking serta navbar
     		
              return view('pemesan.booking_pending',compact('statusbooking','Lembaga'));
        
    	
    }


    public function bookingsukses(){

	     		$statusbooking = Booking::where('status_booking','sukses')->where('id_user',Auth::user()->id)->with('Paket')->with('Lembaga')->with('infopemesan')->orderBy('id', 'DESC')->get();
	     		$Paket = Paket::all();	
	     		$Lembaga = Lembaga::all();//untuk ambil nama lembaga dan ditampilkan di status booking serta navbar
	     		$infopemesan = User::where('role','pemesan')->get();		
	     		

              return view('pemesan.booking_sukses',compact('statusbooking','Lembaga'));
        
    	
    }


    public function destroybooking($id){
       
         $Booking = Booking::findOrFail($id);
         
         $Booking->delete();
        
         alert()->success('Data Berhasil Dihapus');
         return redirect()->back();

    }


}
