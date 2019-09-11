<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaSemhas extends Model
{
    protected $table = 'ta_semhas';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    public function ruangans()
    {
        return $this->hasOne(Ruangan::class);
    }
    
    public function sempros()
    {
        return $this->hasOne(TaSempro::class);
    }
    public function pengujis()
    {
        return $this->hasMany(TaPengujiSemhas::class);
    }
    public function sidangs()
    {
        return $this->hasMany(TaSidang::class);
    }
    
    public function peserta_semhas()
    {
        return $this->hasOne(TaPesertaSemhas::class,'ta_semhas_id','id');
    }
}
