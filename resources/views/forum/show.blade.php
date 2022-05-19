@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">  
                <a href="{{ route('forum') }}" class="btn btn-outline-primary btn-sm">Retourner</a>             
                <h1 class="display-one">{{ ucfirst($article->titre) }}</h1>
                {!! $article->contenu !!}
                <hr>
                
                <hr>
                <strong>Author :</strong> {{$article->articleHasEtudiant->nom}}
                <hr>
                <a href="{{ route('forum.edit', $article->id)}}" class="btn btn-outline-primary">Modifier l'article</a>
                <hr>
                <a href="{{ route('forum.pdf', $article->id)}}" class="btn btn-outline-success" target="_blank">PDF</a>
                <hr>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Supprimer l'article
                </button>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         Vous etes certains de supprimer cet article?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection