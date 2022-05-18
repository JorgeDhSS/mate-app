<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta_Pregunta extends Model
{
    protected $fillable = [
        'correcta','actividad_id', 'cuadernillo_id', 'practicante_id', 'pregunta_id'
    ];
    public function practicante()
    {
        return $this->hasOne(Practicante::class);
    }
}
