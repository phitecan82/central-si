<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KpMahasiswa extends Model
{
    protected $table = 'kp_mahasiswa';
    protected $guarded=[];
    protected $fillable = ['kp_proposal_id', 'mahasiswa_id', 'bidang_usulan', 'judul_laporan'];

    // Tambahkan Kode yang diperlukan dibawah ini

}
