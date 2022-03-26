<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'curp', 'domicilio', 'numberPhone', 'user_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
