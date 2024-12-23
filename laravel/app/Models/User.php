<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'role'];

    public function affectations()
    {
        return $this->hasMany(Affectation::class, 'prof_id');
    }

    public function seances()
    {
        return $this->hasMany(Seance::class, 'prof_id');
    }
}

