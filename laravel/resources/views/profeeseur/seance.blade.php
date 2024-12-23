@extends('layouts.prof')

@section('content')
<div class="container">
    <h1>Saisie de l'Avancement</h1>
    
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form action="{{ route('prof.seances.store') }}" method="POST">
            @csrf
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

            <label for="contenu">Contenu Réalisé</label>
            <textarea name="contenu" id="contenu" rows="4"></textarea>

            <label for="date_seance">Date de la Séance</label>
            <input type="date" name="date_seance" id="date_seance">

            <button type="submit">Ajouter</button>
        </form>
    </div>
</div>
@endsection
