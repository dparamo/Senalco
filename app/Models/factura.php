<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    //
    protected $fillable = ['id','id_inquilino','id_inmueble','id_contrato','periodo','avaladora','multas','otros','total'];

    protected $hidden = [];

    public $timestamps = false;

    protected $table = 'factura';

    public function scopeSearch($query, $periodo)
    {
        return $query->where('nombre','LIKE',"%$periodo%");
    }
}
