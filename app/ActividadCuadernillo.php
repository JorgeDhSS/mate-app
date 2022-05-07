<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadCuadernillo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'actividad_id', 'cuadernillo_id'
    ];

    public function cuadernillos(){
        return $this->belongsToMany(Cuadernillo::class);
    }

    public function actividad(){
        return $this->belongsToMany(Actividad::class);
    }
}
