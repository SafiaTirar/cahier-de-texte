@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Affecter des Matières et Groupes</h1>

    <div class="card">
        <form action="{{ route('admin.affectations.store') }}" method="POST">
            @csrf
            <label for="professeur_id">Professeur</label>
            <select name="professeur_id" id="professeur_id">
                @foreach($professeurs as $professeur)
                    <option value="{{ $professeur->id }}">{{ $professeur->nom }}</option>
                @endforeach
            </select>

            <label for="matiere_id">Matière</label>
            <select name="matiere_id" id="matiere_id">
                @foreach($matieres as $matiere)
                    <option value="{{ $matiere->id }}">{{ $matiere->nom_matiere }}</option>
                @endforeach
            </select>

            <label for="groupe_id">Groupe</label>
            <select name="groupe_id" id="groupe_id">
                @foreach($groupes as $groupe)
                    <option value="{{ $groupe->id }}">{{ $groupe->nom }}</option>
                @endforeach
            </select>

            <button type="submit">Affecter</button>
        </form>
    </div>
</div>
@endsection
