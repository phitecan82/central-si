<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    protected $table = 'pengabdian';
    protected $guarded = [];


    

    // Tambahkan Kode yang diperlukan dibawah ini
    public function members()
    {
        return $this->hasMany(PengabdianUser::class);
    }
}
