<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PracticanteGrupo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'practicante_id', 'grupo_id', 'fechaActividad'
    ];
    public function grupo()
    {
        return $this->hasOne(Grupo::class);
    }
}
