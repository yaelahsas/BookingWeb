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

        if ($notification->signature_key != $validSignatureKey) {
			return response(['message' => 'Invalid signature'], 403);
		}

		$this->initPaymentGateway();
		

		$paymentNotification = new \Midtrans\Notification();

		// $transaction = $notification->transaction_status;
		// $type = $notification->payment_type;
		// $orderId = $notification->order_id;
		// $fraud = $notification->fraud_status;
		$transaction = $paymentNotification->transaction_status;
		$type = $paymentNotification->payment_type;
		$orderId = $paymentNotification->order_id;
		$fraud = $paymentNotification->fraud_status;

		$vaNumber = null;
		$vendorName = null;
		if (!empty($paymentNotification->va_numbers[0])) {
			$vaNumber = $paymentNotification->va_numbers[0]->va_number;
			$vendorName = $paymentNotification->va_numbers[0]->bank;
		}

		

		$notification->biller_code = null;
		$notification->bill_key = null;
		
		$booking = Booking::where('kode_booking',$orderId)->first();
		
		if ($transaction == 'capture') {
			// For credit card transaction, we need to check whether transaction is challenge by FDS or not
			if ($type == 'credit_card') {
				if ($fraud == 'challenge') {
					// TODO set payment status in merchant's database to 'Challenge by FDS'
					// TODO merchant should decide whether this transaction is authorized or not in MAP
					$paymentStatus = Payment::CHALLENGE;
				} else {
					// TODO set payment status in merchant's database to 'Success'
					$paymentStatus = Payment::SUCCESS;
				}
			}
		} else if ($transaction == 'settlement') {
			// TODO set payment status in merchant's database to 'Settlement'
			// $paymentStatus = Payment::SETTLEMENT;
			// Ndek kene query digae nambahne saldo ne ndk tabel user sesuai idne 

			// $balance = User::where('order_id',$orderId)->first();

			// $saldo_awal = $balance->saldo;
			// $saldoakhir=$paymentNotification->gross_amount+$saldo_awal;
			$input =([
				'status_booking'=> 'Sukses',
	
			  ]);
			 
			// 	$balance->update($input);
					$booking->update($input);
			// $fcm->topup($tokenku->fcm_token,"Top Up","Pembayaran Rp.$paymentNotification->gross_amount. Berhasil","sukses",$saldoakhir);
			
		} else if ($transaction == 'pending') {
			// TODO set payment status in merchant's database to 'Pending'
			// $paymentStatus = Payment::PENDING;
			// $fcm->pending($tokenku->fcm_token,"Top Up","Pembayaran Pending","pending");
		} else if ($transaction == 'deny') {
			// TODO set payment status in merchant's database to 'Denied'
			// $paymentStatus = PAYMENT::DENY;
			// $fcm->topup($tokenya,"Top Up","Pembayaran Ditolak","deny");
		} else if ($transaction == 'expire') {
			// TODO set payment status in merchant's database to 'expire'
			// $paymentStatus = PAYMENT::EXPIRE;
			// $fcm->topup($tokenya,"Top Up","Pembayaran kadaluarsa","expire");
			$input =([
				'status_booking'=> 'Pembayaran kadaluarsa',
	
			  ]);
			 
			// 	$balance->update($input);
					$booking->update($input);
		} else if ($transaction == 'cancel') {
			// TODO set payment status in merchant's database to 'Denied'
			// $paymentStatus = PAYMENT::CANCEL;
			// $fcm->topup($tokenya,"Top Up","Pembayaran Dibatalkan","cancel");
		}
		
		
		$paymentParams = [
			
			'total_biaya' => $paymentNotification->gross_amount,
			'token' => $paymentNotification->transaction_id,
			'tanggal_transaksi' => $paymentNotification->transaction_time,
			'status_pembayaran' => $paymentNotification->transaction_status,
			'id_user' => $booking->id_user,
			'id_booking' =>$booking->id,
			'id_paket_belajar' => $booking->id_paket,
			'id_lembaga' => $booking->id_lembaga,
			'kode_pembayaran' => $orderId
						
		];
		
		$payment = Transaksi::create($paymentParams);

		

		// return redirect()->route('pemesan-bookingsukses');
	}
	public function sukses(){
		return redirect()->route('pemesan-bookingsukses');
	}
}
