<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = ['nom', 'effectif', 'filiere_id'];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}

