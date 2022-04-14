<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'idActividad','pregunta'
    ];

    public function asesor()
    {
        return $this->hasOne(Asesor::class);
    }
}
