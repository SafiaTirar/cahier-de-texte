<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ProfController extends Controller
{
    public function dashboard()
{
    $profId = Auth::user()->id;

    $affectations = DB::table('affectations')
        ->join('matieres', 'affectations.matiere_id', '=', 'matieres.id')
        ->join('groupes', 'affectations.groupe_id', '=', 'groupes.id')
        ->where('affectations.professeur_id', $profId)
        ->get();

    return view('prof.dashboard', compact('affectations'));
}
public function saisirAvancement()
{
    $profId = Auth::user()->id;

    $matieres = DB::table('matieres')
        ->join('affectations', 'matieres.id', '=', 'affectations.matiere_id')
        ->where('affectations.professeur_id', $profId)
        ->get();

    $groupes = DB::table('groupes')
        ->join('affectations', 'groupes.id', '=', 'affectations.groupe_id')
        ->where('affectations.professeur_id', $profId)
        ->get();

    return view('prof.saisir_avancement', compact('matieres', 'groupes'));
}
public function storeSeance(Request $request)
{
    $request->validate([
        'matiere_id' => 'required',
        'groupe_id' => 'required',
        'contenu' => 'required',
        'date_seance' => 'required|date',
    ]);

    DB::table('seances')->insert([
        'matiere_id' => $request->matiere_id,
        'groupe_id' => $request->groupe_id,
        'contenu' => $request->contenu,
        'date_seance' => $request->date_seance,
        'professeur_id' => Auth::user()->id,
    ]);

    return redirect()->route('prof.dashboard')->with('success', 'Séance ajoutée avec succès !');
}

}
