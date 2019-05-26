<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaSidang extends Model
{
    protected $table = 'ta_sidang';
    protected $primaryKey='id';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    public function taPengujiSidang()
    {
        return $this->hasMany(TaPengujiSidang::class);
    }
    
    public function taSemhas()
    {
        return $this->belongsTo(TaSemhas::class);
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }


}
