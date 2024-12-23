@extends('layouts.prof')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tableau de bord</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Vos Affectations</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b px-4 py-2 text-gray-600">Matière</th>
                    <th class="border-b px-4 py-2 text-gray-600">Groupe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($affectations as $affectation)
                <tr>
                    <td class="border-b px-4 py-2">{{ $affectation->nom_matiere }}</td>
                    <td class="border-b px-4 py-2">{{ $affectation->nom_groupe }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
