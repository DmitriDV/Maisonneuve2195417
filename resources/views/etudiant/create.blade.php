@extends('layouts.app')
@section('content')


    <div class="container mt-4">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <div class="">
                            <a href="{{ route('liste') }}" class="btn btn-outline-dark mt-4 mb-4">Retourner</a>
                        </div>
                        <h2 class="display-one">Créer un profil</h2>
                        <form method="post">
                        @csrf
                            <label class="mt-3" for="name">Nom :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" id="name" name="nom" type="text" placeholder="Entez votre nom..." value=""/>
                            </div>
                            <label class="mt-3" for="adresse">Adresse :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <textarea class="form-control" name="adresse" id="adresse" type="adresse" placeholder="Entez votre adresse..." value=""></textarea>
                            </div>
                            <label class="mt-3" for="phone">Téléphone :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="phone" id="phone" type="tel" placeholder="Entez votre numéro de téléphone..."  value=""/>
                            </div>
                            <label class="mt-3" for="email">Courriel :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Entez votre courriel..."  value=""/>
                            </div>
                            <label class="mt-3" for="date_de_naissance">Date de naissance :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="date_de_naissance" id="date_de_naissance" placeholder="Entrez votre date de naissance..."></input>
                            </div>
                            <label class="mt-3" for="villeId">Ville :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <select class="form-control" name="villeId" id="villeId" placeholder="Entrez votre date de naissance..." >
                                    <option value="">--Select--</option>
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