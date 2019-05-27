<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaPengujiSidang extends Model
{
    protected $table = 'ta_penguji_sidang';
    protected $primaryKey = 'id';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    public function taSidang()
    {
        return $this->belongsTo(TaSidang::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
