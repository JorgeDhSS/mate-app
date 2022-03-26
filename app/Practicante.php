<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practicante extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricula', 'nivelEscolar', 'horasSemanales', 'calificacion', 'noMaterias', 'user_id', 'tutor_id', 'asesor_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function tutor()
    {
        return $this->hasOne(Tutor::class);
    }
    public function asesor()
    {
        return $this->hasOne(Asesor::class);
    }
    public function practicanteGrupo()
    {
        return $this->hasMany(PracticanteGrupo::class);
    }
}
