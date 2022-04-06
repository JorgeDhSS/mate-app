<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion', 'titulo', 'fechaInicio', 'fechaCierre', 'valor', 'idgrupo', 'asesor_id'
    ];
    public function asesor()
    {
        return $this->hasOne(Asesor::class);
    }
}
