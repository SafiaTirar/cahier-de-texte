@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Gestion des Matières</h1>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bouton Ajouter -->
    <div class="mb-4">
        <a href="{{ route('admin.matieres.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
            Ajouter une Matière
        </a>
    </div>

    <!-- Tableau des Matières -->
    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="text-left px-6 py-3 border-b">Nom de la Matière</th>
                    <th class="text-left px-6 py-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matieres as $matiere)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $matiere->nom_matiere }}</td>
                        <td class="px-6 py-4 border-b">
                            <a href="{{ route('admin.matieres.edit', $matiere->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Modifier</a>
                            <form action="{{ route('admin.matieres.destroy', $matiere->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette matière ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
