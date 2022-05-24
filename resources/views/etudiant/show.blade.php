@extends('layouts.app')
@section('content')
    <div class="container px-4 px-lg-5 mt-3">
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-2 justify-content-left">
            <!-- Retour-->
            <div class="">
                <a href="{{ route('liste') }}" class="btn btn-outline-dark mt-4 mb-4">@lang('lang.button_liste_etudiants')</a>
            </div>
        </div>
    </div>
    <div class="container px-4 px-lg-5 mb-5 card h-100">
        <div class="row">
            <div class="col-12 pt-2 mt-3">  
                <h2 class="display-one mb-3">@lang('lang.title_student_profile') : {{ ucfirst($user->name) }} </h2>
                <p>@lang('lang.title_registration_address') : {{ $user->userHasEtudiant->adresse }}</p>
                <p>@lang('lang.title_registration_telephone') : {{ $user->userHasEtudiant->phone }}</p>
                <p>@lang('lang.title_registration_email') : {{ $user->email }}</p>
                <p>@lang('lang.title_registration_birthday') : {{ $user->userHasEtudiant->date_de_naissance }}</p>
                <p>@lang('lang.title_registration_city') : {{ $user->userHasEtudiant->etudiantHasVille->nom }}</p>
                @if($user->email == $user_email)
                <a href="{{ route('liste.edit', $user->id) }}" class="btn btn-outline-dark mt-auto">@lang('lang.button_student_modify')</a>
                <hr>
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-warning mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('lang.button_student_delete')</button>
                </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer ce profil?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark mt-4 mb-4" data-bs-dismiss="modal">Close</button>
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
