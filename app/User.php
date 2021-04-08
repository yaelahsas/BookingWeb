<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
        'name', 'username', 'password','role','email','nohp','remember_token','image','status','alamat','jenis_kelamin','pendidikan','id_lembaga'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //fungsi cek role untuk miidle ware

     //membuat fungsi isAdmin untuk admin
    public function isAdmin(){
        
        //jika role=admin maka benar
        if($this->role == 'admin'){

            return true;
        }
            return false;
    }

    public function isPemesan(){

        //jika role=kader maka benar
        if($this->role == 'pemesan'){

            return true;
        }
            return false;
    }

    public function isSuperadmin(){

        //jika role=kader maka benar
        if($this->role == 'super_admin'){

            return true;
        }
            return false;
    }
}
