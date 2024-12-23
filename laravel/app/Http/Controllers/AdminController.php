<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Groupe;
use App\Models\Affectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    // Gestion des utilisateurs (Professeurs)
    public function indexUsers()
    {
        $users = User::where('role', 'prof')->get();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'prof',
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Professeur ajouté avec succès.');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('admin.users.index')->with('success', 'Professeur mis à jour avec succès.');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Professeur supprimé avec succès.');
    }

    // Gestion des filières
    public function indexFilieres()
    {
        $filieres = Filiere::all();
        return view('admin.filieres.index', compact('filieres'));
    }

    public function storeFiliere(Request $request)
    {
        $request->validate(['nom_filiere' => 'required|unique:filieres,nom_filiere']);
        Filiere::create($request->only('nom_filiere'));

        return redirect()->route('admin.filieres.index')->with('success', 'Filière ajoutée avec succès.');
    }

    // Gestion des matières
    public function indexMatieres()
    {
        $matieres = Matiere::all();
        return view('admin.matieres.index', compact('matieres'));
    }

    public function storeMatiere(Request $request)
    {
        $request->validate(['nom_matiere' => 'required|unique:matieres,nom_matiere']);
        Matiere::create($request->only('nom_matiere'));

        return redirect()->route('admin.matieres.index')->with('success', 'Matière ajoutée avec succès.');
    }

    // Gestion des groupes
    public function indexGroupes()
    {
        $groupes = Groupe::with('filiere')->get();
        $filieres = Filiere::all();
        return view('admin.groupes.index', compact('groupes', 'filieres'));
    }

    public function storeGroupe(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'effectif' => 'required|integer',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        Groupe::create($request->only('nom', 'effectif', 'filiere_id'));

        return redirect()->route('admin.groupes.index')->with('success', 'Groupe ajouté avec succès.');
    }

    // Gestion des affectations
    public function indexAffectations()
    {
        $affectations = Affectation::with('prof', 'matiere', 'groupe')->get();
        $profs = User::where('role', 'prof')->get();
        $matieres = Matiere::all();
        $groupes = Groupe::all();

        return view('admin.affectations.index', compact('affectations', 'profs', 'matieres', 'groupes'));
    }

    // public function storeAffectation(Request $request)
    // {
    //     $request->validate([
    //         'prof_id' => 'required|exists:users,id',
    //         'matiere_id' => 'required|exists:matieres,id',
    //         'groupe_id' => 'required|exists:groupes,id',
    //     ]);

    //     Affectation::create($request->only('prof_id', 'matiere_id', 'groupe_id'));

    //     return redirect()->route('admin.affectations.index')->with('success', 'Affectation créée avec succès.');
    // }

    public function createAffectation()
{
    $professeurs = User::all();
    $matieres = Matiere::all();
    $groupes = Groupe::all();

    return view('admin.affectations.create', compact('professeurs', 'matieres', 'groupes'));
}

public function storeAffectation(Request $request)
{
    $request->validate([
        'professeur_id' => 'required|exists:profs,id',
        'matiere_id' => 'required|exists:matieres,id',
        'groupe_id' => 'required|exists:groupes,id',
    ]);

    DB::table('affectations')->insert([
        'professeur_id' => $request->professeur_id,
        'matiere_id' => $request->matiere_id,
        'groupe_id' => $request->groupe_id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Affectation réussie !');
}
public function destroyAffectation($id)
{
    DB::table('affectations')->where('id', $id)->delete();

    return redirect()->route('admin.affectations.index')->with('success', 'Affectation supprimée avec succès !');
}

public function editAffectation($id)
{
    $affectation = DB::table('affectations')->where('id', $id)->first();
    $profs = DB::table('profs')->get();
    $matieres = DB::table('matieres')->get();
    $groupes = DB::table('groupes')->get();

    return view('admin.affectations.edit', compact('affectation', 'profs', 'matieres', 'groupes'));
}
public function updateAffectation(Request $request, $id)
{
    $request->validate([
        'professeur_id' => 'required|exists:profs,id',
        'matiere_id' => 'required|exists:matieres,id',
        'groupe_id' => 'required|exists:groupes,id',
    ]);

    DB::table('affectations')->where('id', $id)->update([
        'professeur_id' => $request->professeur_id,
        'matiere_id' => $request->matiere_id,
        'groupe_id' => $request->groupe_id,
    ]);

    return redirect()->route('admin.affectations.index')->with('success', 'Affectation modifiée avec succès !');
}




}

