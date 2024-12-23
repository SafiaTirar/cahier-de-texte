<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    protected $fillable = ['nom', 'horaire', 'duree', 'contenu_realise', 'prof_id', 'groupe_id', 'matiere_id'];

    public function prof()
    {
        return $this->belongsTo(User::class, 'prof_id');
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}

