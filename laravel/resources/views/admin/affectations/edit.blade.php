@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Modifier une Affectation</h1>

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

    <!-- Formulaire de modification -->
    <form action="{{ route('admin.affectations.update', $affectation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Sélection du Professeur -->
        <div class="mb-4">
            <label for="professeur_id" class="block text-gray-700 font-bold mb-2">Professeur</label>
            <select name="professeur_id" id="professeur_id" class="w-full border-gray-300 rounded shadow-sm">
                @foreach($profs as $prof)
                    <option value="{{ $prof->id }}" {{ $prof->id == $affectation->professeur_id ? 'selected' : '' }}>
                        {{ $prof->fname }} {{ $prof->lname }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Sélection de la Matière -->
        <div class="mb-4">
            <label for="matiere_id" class="block text-gray-700 font-bold mb-2">Matière</label>
            <select name="matiere_id" id="matiere_id" class="w-full border-gray-300 rounded shadow-sm">
                @foreach($matieres as $matiere)
                    <option value="{{ $matiere->id }}" {{ $matiere->id == $affectation->matiere_id ? 'selected' : '' }}>
                        {{ $matiere->nom_matiere }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Sélection du Groupe -->
        <div class="mb-4">
            <label for="groupe_id" class="block text-gray-700 font-bold mb-2">Groupe</label>
            <select name="groupe_id" id="groupe_id" class="w-full border-gray-300 rounded shadow-sm">
                @foreach($groupes as $groupe)
                    <option value="{{ $groupe->id }}" {{ $groupe->id == $affectation->groupe_id ? 'selected' : '' }}>
                        {{ $groupe->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Bouton Modifier -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Modifier
            </button>
        </div>
    </form>
</div>
@endsection
