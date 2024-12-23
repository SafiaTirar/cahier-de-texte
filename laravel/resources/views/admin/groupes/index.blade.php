@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Gestion des Groupes</h1>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bouton Ajouter -->
    <div class="mb-4">
        <a href="{{ route('admin.groupes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
            Ajouter un Groupe
        </a>
    </div>

    <!-- Tableau des Groupes -->
    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="text-left px-6 py-3 border-b">Nom du Groupe</th>
                    <th class="text-left px-6 py-3 border-b">Effectif</th>
                    <th class="text-left px-6 py-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groupes as $groupe)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $groupe->nom }}</td>
                        <td class="px-6 py-4 border-b">{{ $groupe->effectif }}</td>
                        <td class="px-6 py-4 border-b">
                            <a href="{{ route('admin.groupes.edit', $groupe->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Modifier</a>
                            <form action="{{ route('admin.groupes.destroy', $groupe->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce groupe ?')">
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
