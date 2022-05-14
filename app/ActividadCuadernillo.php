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
    public function actividad(){
        return $this->belongsToMany(Actividad::class);
    }
    public function cuadernillo()
    {
        return $this->belongsToMany(cuadernillo::class);
    }
}
