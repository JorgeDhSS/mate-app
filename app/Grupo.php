<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombreGrupo', 'nivelEscolar'
    ];

    public function verActividad(){
        return $this->hasMany(Actividad::class);
    }
}
