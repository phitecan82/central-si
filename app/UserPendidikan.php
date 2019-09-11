<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPendidikan extends Model
{
    protected $table = 'user_pendidikan';
    protected $guarded = [];

    protected $fillable = [
        'id',
        'user_id',
        'jenjang_id',
        'nama_sekolah',
        'tahun_masuk',
        'jurusan',
        'tahun_lulus',
        'dalam_negeri',
        'lokasi_sekolah',
        'nomor_ijazah',
        'file_ijazah'
    ];


    // Tambahkan Kode yang diperlukan dibawah ini
    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function post()
    {
    	return $this->belongsTo('App\RefJenjangPendidikan','jenjang_id');
    }

    public function post1()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
