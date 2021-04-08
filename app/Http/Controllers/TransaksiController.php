<?php

namespace App\Http\Controllers;
use Auth; //untuk auth
use App\User;
use App\Booking;
use App\Lembaga;
use App\Transaksi;
use App\Paket;
use Illuminate\Http\Request;
use Alert;
use File;

class TransaksiController extends Controller
{


	public function notification(Request $request)
	{

		$payload = $request->getContent();
		$notification = json_decode($payload);
		

        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . "SB-Mid-server-THTsy7A7QlNBq_LucGxKUqeA");

  //       if ($notification->signature_key != $validSignatureKey) {
		// 	return response(['message' => 'Invalid signature'], 403);
		// }

		$this->initPaymentGateway();
		$statusCode = null;

		$paymentNotification = new \Midtrans\Notification();

		$transaction = $notification->transaction_status;
		$type = $notification->payment_type;
		$orderId = $notification->order_id;
		$fraud = $notification->fraud_status;

		$vaNumber = null;
		$vendorName = null;
		if (!empty($notification->va_numbers[0])) {
			$vaNumber = $notification->va_numbers[0]->va_number;
			$vendorName = $notification->va_numbers[0]->bank;
		}

		

		$notification->biller_code = null;
		$notification->bill_key = null;
		
		
		
		
		$paymentParams = [
			
			'total_biaya' => $notification->gross_amount,
			'id_user' => 'id_user',
			'id_booking' => '>id',
			'id_paket_belajar' => 'id_paket',
			'id_lembaga' => 'id_lembaga',
			'status_pembayaran' => 'sukses',
			'kode_pembayaran' => $notification->order_id
						
		];

		$payment = Transaksi::create($paymentParams);

		

		return redirect()->route('pemesan-bookingsukses');
	}
}
