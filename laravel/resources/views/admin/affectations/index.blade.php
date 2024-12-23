@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Liste des Affectations</h1>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tableau des affectations -->
    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left text-gray-800">Professeur</th>
                    <th class="py-2 px-4 border-b text-left text-gray-800">Matière</th>
                    <th class="py-2 px-4 border-b text-left text-gray-800">Groupe</th>
                    <th class="py-2 px-4 border-b text-left text-gray-800">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($affectations as $affectation)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $affectation->professeur->fname }} {{ $affectation->professeur->lname }}</td>
                        <td class="py-2 px-4 border-b">{{ $affectation->matiere->nom_matiere }}</td>
                        <td class="py-2 px-4 border-b">{{ $affectation->groupe->nom }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.affectations.edit', $affectation->id) }}" 
                            class="bg-yellow-500 text-white px-3 py-1 rounded shadow hover:bg-yellow-600">
                                Modifier
                            </a>
                            <!-- Bouton Supprimer -->
                            <form action="{{ route('admin.affectations.destroy', $affectation->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded shadow hover:bg-red-600" 
                                        onclick="return confirm('Voulez-vous vraiment supprimer cette affectation ?');">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4 px-6 text-center text-gray-500">Aucune affectation trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
