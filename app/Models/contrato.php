<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contrato extends Model
{
    //
    protected $fillable = ['id','id_inquilino','id_inmueble','inicontrato','fincontrato','valorcanon','valoradmin','total','observaciones'];

    protected $hidden = [];

    public $timestamps = false;

    protected $table = 'contrato';

    public function scopeSearch($query, $codigo)
    {
        return $query->where('nombre','LIKE',"%$codigo%");
    }
}
