<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nilaiTA extends Model
{
    protected $table="ta_sidang";
    protected $guarded=[];
    protected $dates = [];
    public $incrementing = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function getEmailAttribute($value)
    {
        return optional($this->user)->email;
    } 

    public function publikasis()
    {
        return $this->belongsToMany(Publikasi::class, PublikasiDosen::class);
    }

    public function fungsionals()
    {
        return $this->belongsToMany(RefFungsional::class, DosenFungsional::class, 'dosen_id', 'fungsional_id');
    }

    public function ta_semhas()
    {
        return $this->hasOne(TaSemhas::class,'id','ta_semhas_id');
    }
 

    
}

