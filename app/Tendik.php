<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tendik extends Model
{
    protected $table = 'tendik';
    protected $guarded = [];
    public $incrementing = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function getEmailAttribute($value)
    {
       return optional($this->user)->email;
    }


    // Tambahkan Kode yang diperlukan dibawah ini

}
