<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublikasiDosen extends Model
{
    protected $table = 'publikasi_dosen';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    public function dosen() 
    {
    	return $this->hasOne(Dosen::class, 'id','dosen_id');
    }
}
