<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    
     protected $table = 'paket_belajar';
     protected $fillable = [
        'nama_paket','jenis_paket','durasi_paket','biaya_paket','stok','image','fasilitas1','fasilitas2','fasilitas3','fasilitas4','fasilitas5','fasilitas6'
    ];
public function Datalembaga() {
    
        return $this->belongsTo('App\Lembaga','id_lembaga','id');
    }
}
