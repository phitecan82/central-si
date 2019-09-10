<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefJabatanOrganisasi extends Model
{
    protected $table = 'ref_jabatan_organisasi';
    protected $guarded = [];
    protected $fillable = ['mhs_organisasi_id', 'mahasiswa_id'];

    // Tambahkan Kode yang diperlukan dibawah ini
}
