@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Affectation des Matières et des Groupes</h1>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire d'affectation -->
    <form action="{{ route('admin.affectations.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Sélection du Professeur -->
        <div class="mb-4">
            <label for="professeur_id" class="block text-gray-700 font-bold mb-2">Professeur :</label>
            <select name="professeur_id" id="professeur_id" class="block w-full bg-gray-50 border border-gray-300 rounded px-3 py-2 text-gray-800">
                <option value="">-- Sélectionner un professeur --</option>
                @foreach ($professeurs as $professeur)
                    <option value="{{ $professeur->id }}">{{ $professeur->fname }} {{ $professeur->lname }}</option>
                @endforeach
            </select>
            @error('professeur_id')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sélection de la Matière -->
        <div class="mb-4">
            <label for="matiere_id" class="block text-gray-700 font-bold mb-2">Matière :</label>
            <select name="matiere_id" id="matiere_id" class="block w-full bg-gray-50 border border-gray-300 rounded px-3 py-2 text-gray-800">
                <option value="">-- Sélectionner une matière --</option>
                @foreach ($matieres as $matiere)
                    <option value="{{ $matiere->id }}">{{ $matiere->nom_matiere }}</option>
                @endforeach
            </select>
            @error('matiere_id')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Sélection du Groupe -->
        <div class="mb-4">
            <label for="groupe_id" class="block text-gray-700 font-bold mb-2">Groupe :</label>
            <select name="groupe_id" id="groupe_id" class="block w-full bg-gray-50 border border-gray-300 rounded px-3 py-2 text-gray-800">
                <option value="">-- Sélectionner un groupe --</option>
                @foreach ($groupes as $groupe)
                    <option value="{{ $groupe->id }}">{{ $groupe->nom }}</option>
                @endforeach
            </select>
            @error('groupe_id')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bouton Soumettre -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Affecter
            </button>
        </div>
    </form>
</div>
@endsection
