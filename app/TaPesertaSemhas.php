<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaPesertaSemhas extends Model
{
    protected $table = 'ta_peserta_semhas';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini'

    public function mahasiswa()
    {
        return $this->hasOne(mahasiswa::class,'mahasiswa_id','id');
    }
}
