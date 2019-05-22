<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaSemhas extends Model
{
    protected $table = 'ta_semhas';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    public function pesertas()
    {
        return $this->hasMany(TaPesertaSemhas::class);
    }
    public function pengujis()
    {
        return $this->hasMany(TaPengujiSemhas::class);
    }
    public function sidangs()
    {
        return $this->hasMany(TaSidang::class);
    }

}
