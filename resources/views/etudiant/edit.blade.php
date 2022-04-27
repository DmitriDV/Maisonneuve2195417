@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <!-- Retour-->
                        <div class="">
                            <a href="{{ route('liste') }}" class="btn btn-outline-dark mt-4 mb-4 ">Retourner</a>
                        </div>
                        <h2 class="display-one">Modifier un profil</h2>
                        <form method="post">
                        @csrf
                        @method('PUT')
                            <label class="mt-3" for="nom">Nom :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" id="nom" name="nom" type="text" placeholder="Entez votre nom..." value="{{ $etudiant->nom }}"/>
                            </div>
                            <label class="mt-3" for="adresse">Adresse :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <textarea class="form-control" name="adresse" id="adresse" type="adresse" placeholder="Entez votre adresse...">{{ $etudiant->adresse }}</textarea>
                            </div>
                            <label class="mt-3" for="phone">Téléphone :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="phone" id="phone" type="tel" placeholder="Entez votre numéro de téléphone..."  value="{{ $etudiant->phone }}"/>
                            </div>
                            <label class="mt-3" for="email">Courriel :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Entez votre courriel..." value="{{ $etudiant->email }}"/>
                            </div>
                            <label class="mt-3" for="date_de_naissance">Date de naissance :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="date_de_naissance" id="date_de_naissance" placeholder="Entrez votre date de naissance..." value="{{ $etudiant->date_de_naissance }}"></input>
                            </div>
                            <label class="mt-3" for="villeId">Ville :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <select class="form-control" name="villeId" id="villeId" placeholder="Entrez votre date de naissance...">
                                    <option value="{{ $etudiant->villeId }}"@selected>{{ $etudiant->EtudiantHasVille->nom }}</option>
                                    @forelse ($villes as $ville)
                                    <option value= "{{ $ville->id }}" @selected>
                                        {{ $ville->nom }}
                                    </option>
                                    @empty
                                    <li>Aucun ville</li>
                                    @endforelse
                                </select>
                            </div>
                            <!-- Submit Button-->
                            <button class="btn btn-outline-dark mt-4 mb-5" id="submitButton" type="submit">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection