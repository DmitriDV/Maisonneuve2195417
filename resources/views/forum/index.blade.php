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
                        <a href="{{ route('forum.create') }}" class="btn btn-primary btn-sm">Ajouter un article</a>
                    </div>
                </div>
                <ul>
                    @forelse($articles as $article)
                        <li><a href="{{ route('forum.show', $article->id) }}">{{ ucfirst($article->titre)}}</a></li>
                    @empty
                        <li>Aucun article</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection