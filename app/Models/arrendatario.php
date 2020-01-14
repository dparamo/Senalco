<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class arrendatario extends Model
{
    //
    protected $fillable = ['id','nombre','email','telefono','observaciones','estado'];

    protected $hidden = [];

    public $timestamps = false;

    protected $table = 'arrendatario';

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}

