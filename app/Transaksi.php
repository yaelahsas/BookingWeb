<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    
     protected $table = 'transaksi';
     protected $fillable = [
        'tanggal_transaksi','total_biaya','id_user','id_booking ','id_paket_belajar ','id_lembaga','status_pembayaran','kode_pembayaran','token'
    ];
}
