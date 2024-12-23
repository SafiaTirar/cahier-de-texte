@extends('layouts.prof')

@section('content')
<div class="container">
    <h1>Liste des Avancements</h1>

    <table>
        <thead>
            <tr>
                <th>Matière</th>
                <th>Groupe</th>
                <th>Contenu</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seances as $seance)
                <tr>
                    <td>{{ $seance->matiere->nom_matiere }}</td>
                    <td>{{ $seance->groupe->nom }}</td>
                    <td>{{ $seance->contenu }}</td>
                    <td>{{ $seance->date_seance }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
