<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $primaryKey='id';
    protected $guarded = [];
    public $timestamps = false;

    // Tambahkan Kode yang diperlukan dibawah ini
    public function comments()
    {
        return $this->hasMany(TaSidang::class, 'ruangan_id');
    }
}
