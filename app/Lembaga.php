<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    
    protected $table = 'lembaga';
     protected $fillable = [
        'nama_lembaga','alamat'
    ];

   
}
