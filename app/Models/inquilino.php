<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inquilino extends Model
{
    //

    protected $fillable = ['id','nombre','email','telefono','observaciones','estado'];

    protected $hidden = [];

    public $timestamps = false;

    protected $table = 'inquilino';

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre','LIKE',"%$nombre%");
    }
}
