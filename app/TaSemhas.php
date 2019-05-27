<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaSemhas extends Model
{
    protected $table = 'ta_semhas';
    protected $primaryKey='id';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    public function taPesertaSemhas()
    {
        return $this->hasMany(TaPesertaSemhas::class, 'ta_semhas_id');
    }

    public function taSidang()
    {
        return $this->hasOne(TaSidang::class, 'ta_semhas_id');
    }
}
