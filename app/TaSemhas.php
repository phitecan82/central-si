<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaSemhas extends Model
{
    protected $table = 'ta_semhas';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    
    public function peserta_semhas()
    {
        return $this->hasOne(TaPesertaSemhas::class,'ta_semhas_id','id');
    }
}
