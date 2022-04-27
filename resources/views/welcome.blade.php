@extends('layouts.app')
@section('content')
    <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/intro.jpg" alt="..." />
    <div class="row">
        <div class="text-center pt-5 pb-5">
            <h1 class="display-one mt-5">{{ config('app.name') }}</h1>

            <div class="card-footer p-4 pt-3 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ 'liste'}}">Voir la communauté</a></div>
            </div>
        </div>
    </div>
@endsection