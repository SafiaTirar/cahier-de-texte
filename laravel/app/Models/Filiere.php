<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['nom_filiere'];

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}
