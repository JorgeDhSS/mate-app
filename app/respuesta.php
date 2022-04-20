<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuesta extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'idpregunta', 'respuesta', 'valor'
    ];
    public function asesor()
    {
        return $this->hasOne(Asesor::class);
    }
}
