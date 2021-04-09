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
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PaketController extends Controller
{
  
//====================================================== ROLE ADMIN ============================================================



public function kelolapaket(){

	$Daftarpaket = Paket::where('id_lembaga',Auth::user()->id_lembaga)->get();

	return view('admin.kelola_paket',compact('Daftarpaket'));
}



public function tambahpaket(){

	$cekdata = Admin::where('id_user',Auth::user()->id)->first();

		if (isset($cekdata)) {

			$Dataadmin = Admin::where('id_user',Auth::user()->id)->get();

				return view('admin.tambah_paket',compact('Dataadmin'));
           
        }else{//jika data membr belum ada tidak diperbolehkan akses halaman booking

        	$Datalembaga = Lembaga::all();//mengambil data lembaga
			
	    		return view('admin.gagal_tambah_paket',compact('Datalembaga'));
        }

} 


public function addpaket(Request $request){
 
        $tambahpaket = new Paket();

        $tambahpaket->nama_paket = $request->input('nama_paket');
        $tambahpaket->jenis_paket = $request->input('jenis_paket');
        $tambahpaket->durasi_paket = $request->input('durasi_paket');
        $tambahpaket->biaya_paket = $request->input('biaya_paket');
        $tambahpaket->stok = $request->input('stok');
		$tambahpaket->id_lembaga  = $request->input('id_lembaga');
		$tambahpaket->id_admin  = $request->input('id_admin');
		$tambahpaket->fasilitas1  = $request->input('fasilitas1');
		$tambahpaket->fasilitas2  = $request->input('fasilitas2');
		$tambahpaket->fasilitas3  = $request->input('fasilitas3');
		$tambahpaket->fasilitas4  = $request->input('fasilitas4');
		$tambahpaket->fasilitas5  = $request->input('fasilitas5');
		$tambahpaket->fasilitas6  = $request->input('fasilitas6');
		
		if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('uploads/imagepaket/', $filename);
                $tambahpaket->image = $filename;

              
        }else{
           echo "Gagal upload gambar";
        }

	   	$tambahpaket->save();
       
        return redirect('/paket-kelolapaket');


	   }


public function edit($id){

	$Editpaket = Paket::where('id',$id)->get();

	return view('admin.edit_paket',compact('Editpaket'));
} 


//role admin
public function updatepaket(Request $request, $id){

     	 $paket = Paket::where('id', $id);


            $input =([
            'nama_paket' => $request->nama_paket,
            'jenis_paket' => $request->jenis_paket,
            'durasi_paket' => $request->durasi_paket,
            'biaya_paket' => $request->biaya_paket,
            'stok' => $request->stok,
            'fasilitas1' => $request->fasilitas1,
            'fasilitas2' => $request->fasilitas2,
            'fasilitas3' => $request->fasilitas3,
            'fasilitas4' => $request->fasilitas4,
            'fasilitas5' => $request->fasilitas5,
            'fasilitas6' => $request->fasilitas6,

        ]);
            
        $paket->update($input);
       
         return redirect('/paket-kelolapaket');

    }



public function destroypaket($id){
   
     $Paket = Paket::find($id);
     File::delete('uploads/imagepaket/'.$Paket->image);//fungsi untuk menghapus image paket
            
     $Paket->delete();
    
     alert()->success('Data Berhasil Dihapus');
     return redirect()->back();

}





//========================================================= ROLE PEMESAN =========================================================






//load halaman detail paket sesuai paket yang dipilih
public function detail($id){//$id mengambil id lembaga

		$detailpaket = Paket::where('id',$id)->get();
		$Datalembaga = Lembaga::all();//mengambil data lembaga
		$Lembagaback = Lembaga::where('id',$id)->get();//mengambuil nama lembaga
    	$Datapaket = Paket::where('id_lembaga',$id)->get();//mengambil paket sesuai dengan lembaga yang dipilih

    	return view('pemesan.detail_paket',compact('detailpaket','Datapaket','Datalembaga','Lembagaback'));
    }


//load halaman booking paket
public function booking($id){//$id mengambil id paket

		

			$bookingpaket = Paket::where('id',$id)->with('Datalembaga')->get();//with->datalembaga = untuk ambil nama data lembaga  
			$Datalembaga = Lembaga::all();//mengambil data lembaga
			$Pemesan = User::where('id',Auth::user()->id)->get();

	    		return view('pemesan.booking',compact('bookingpaket','Pemesan','Datalembaga'));
		
    }


//fungsi untuk menambahkan proses booking
public function prosesbooking(Request $request){

        $this->initPaymentGateway();

        $Pemesan = User::where('id',Auth::user()->id)->first();
        $paket = Paket::where('id',$request->id_paket)->first();

        $Order_id = Str::random(5);
        
        $customerDetails = [
            'first_name' =>$Pemesan->name,           
            'email' => $Pemesan->email,
            'phone' => $Pemesan->nohp,

        ]; 

        $params = [
            'enable_payments' => ['credit_card', 'mandiri_clickpay', 'cimb_clicks',
                                'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va',
                                'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret',
                                'danamon_online', 'akulaku'],
            'transaction_details' => [
                'order_id' => $Order_id,
                'gross_amount' => $paket->biaya_paket,
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => 'days',
                'duration' => 7,
            ],
        ];


        $snap = \Midtrans\Snap::createTransaction($params);

        $book = new Booking();

        $book->tanggal_booking = $request->input('tanggal_booking');
        $book->periode_booking = $request->input('periode_booking');
        $book->id_user = $request->input('id_user');
        $book->id_paket = $request->input('id_paket');
        $book->kode_booking = $Order_id;
        $book->id_lembaga = $request->input('id_lembaga');
        $book->status_booking = $request->input('status_booking','pending');//status pembayaran jika belum melakukan transaksi maka akan terisi otomatis pending    
        $book->payment_token = $snap->token;
        $book->payment_url = $snap->redirect_url;
        $book->save();

        $last_id = $book->id;


		alert()->success('Berhasil','Menambahkan Data Profil');
		return redirect()->route('pemesan-bookingpending', $last_id)->with(['success' => 'Booking Berhasil']);


}




}
