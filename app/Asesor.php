<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedProfesional', 'noGrupos', 'noAsesorados', 'user_id', 'nivelEscolar'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
