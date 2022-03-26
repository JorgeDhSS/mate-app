<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedProfesional', 'user_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
