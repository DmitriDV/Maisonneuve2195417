@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Notre Blog!</h1>
                        <p>Bonne lecture</p>
                    </div>
                    <div class="col-4">
                        <p>Créer un nouveau message</p>
                        <a href="{{ route('liste.create') }}" class="btn btn-primary btn-sm">Ajouter un message</a>
                    </div>
                </div>
                @forelse ($etudiants as $etudiant)
                <li><a href="{{ route('liste.show', $etudiant->id) }}">{{ ucfirst($etudiant->nom) }}</a></li>
                @empty
                <li>Aucun article</li>
                @endforelse
            </div>
        </div>
    </div>
@endsection