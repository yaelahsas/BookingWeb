<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    protected function initPaymentGateway()
    {
	// Set your Merchant Server Key
	\Midtrans\Config::$serverKey = 'SB-Mid-server-THTsy7A7QlNBq_LucGxKUqeA';
	// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
	\Midtrans\Config::$isProduction = false;
	// Set sanitization on (default)
	\Midtrans\Config::$isSanitized = true;
	// Set 3DS transaction for credit card to true
	\Midtrans\Config::$is3ds = true;
    }
}
