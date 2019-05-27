<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaPesertaSemhas extends Model
{
    protected $table = 'ta_peserta_semhas';
    protected $primaryKey='id';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
        public function mahasiswa()
        {
            return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
        }

        public function taSemhas()
        {
            return $this->belongsTo(TaSemhas::class );
        }
}
