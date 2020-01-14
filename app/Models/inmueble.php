<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inmueble extends Model
{
    protected $fillable = ['id','id_arrendatario','direccion','Observaciones'];

    protected $hidden = [];

    public $timestamps = false;

    protected $table = 'inmueble';

    public function scopeSearch($query, $codigo)
    {
        return $query->where('nombre','LIKE',"%$codigo%");
    }
}
