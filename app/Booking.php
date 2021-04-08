<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table = 'booking';
     protected $fillable = [
        'tanggal_booking','periode_booking','id_user','id_admin ','id_paket','status_booking','id_lembaga'
    ];

    public function Paket() {
    
        return $this->belongsTo('App\Paket','id_paket','id');
    }

    public function Lembaga() {
    
        return $this->belongsTo('App\Lembaga','id_lembaga','id');
    }


     public function infopemesan() {
    
        return $this->belongsTo('App\User','id_user','id');
    }
}
