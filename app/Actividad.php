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
        'descripcion', 'titulo', 'fechaInicio', 'fechaCierre', 'valor', 'idgrupo', 'asesor_id', 'leccion_id'
    ];

    public function asesor()
    {
        return $this->hasOne(Asesor::class);
    }
    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }
    public function leccion()
    {
        return $this->belongsTo('App\User');
    }
}
