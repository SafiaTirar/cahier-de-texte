<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $fillable = ['prof_id', 'matiere_id', 'groupe_id'];

    public function prof()
    {
        return $this->belongsTo(User::class, 'prof_id');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}

