<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = ['nom_matiere'];

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}

