@extends('layouts.prof')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Saisie de l'Avancement</h1>

    <!-- Message d'erreur -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulaire de saisie -->
    <form action="{{ route('prof.seances.store') }}" method="POST">
        @csrf

        <!-- Sélection de la Matière -->
        <div class="mb-4">
            <label for="matiere_id" class="block text-gray-700 font-bold mb-2">Matière</label>
            <select name="matiere_id" id="matiere_id" class="w-full border-gray-300 rounded shadow-sm">
                @foreach($matieres as $matiere)
                    <option value="{{ $matiere->id }}">{{ $matiere->nom_matiere }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sélection du Groupe -->
        <div class="mb-4">
            <label for="groupe_id" class="block text-gray-700 font-bold mb-2">Groupe</label>
            <select name="groupe_id" id="groupe_id" class="w-full border-gray-300 rounded shadow-sm">
                @foreach($groupes as $groupe)
                    <option value="{{ $groupe->id }}">{{ $groupe->nom }}</option>
                @endforeach
            </select>
        </div>

        <!-- Contenu Réalisé -->
        <div class="mb-4">
            <label for="contenu" class="block text-gray-700 font-bold mb-2">Contenu Réalisé</label>
            <textarea name="contenu" id="contenu" rows="4" class="w-full border-gray-300 rounded shadow-sm"></textarea>
        </div>

        <!-- Date de la Séance -->
        <div class="mb-4">
            <label for="date_seance" class="block text-gray-700 font-bold mb-2">Date de la Séance</label>
            <input type="date" name="date_seance" id="date_seance" class="w-full border-gray-300 rounded shadow-sm">
        </div>

        <!-- Bouton Ajouter -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Ajouter
            </button>
        </div>
    </form>
</div>
@endsection
