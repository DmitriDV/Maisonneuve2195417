@extends('layouts.app')
@section('content')
<section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Enregistrement</h2>

                <form action="{{ route('custom.registration')}}" method="post">
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control form-control-lg" name="name" value="{{old('name')}}" required/>
                        <label class="form-label" for="">Votre Nom</label>

                        @if($errors->has('name'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                {{ $errors->first('name') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" class="form-control form-control-lg" name="email" value="{{old('email')}}"  required/>
                        <label class="form-label" for="">Votre courriel</label>

                        @if($errors->has('email'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                {{ $errors->first('email') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" class="form-control form-control-lg" name="password" required/>
                        <label class="form-label" for="">Entrer le mot de passe</label>

                        <input type="password" class="form-control form-control-lg" name="password_confirmation" required/>
                        <label class="form-label" for="">Répétez le mot de passe</label>
                    </div>

                    @if($errors->has('password'))
                        <div class="alert alert-warning alert-dismissible fade show mt--1" role="alert">
                            {{ $errors->first('password') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="d-flex justify-content-center btn-group-vertical">
                        <button class="btn btn-outline-dark">Enregistrer</button>
                    </div>

                    <p class="text-center text-muted mt-5 mb-0">Have already an account? Avez-vous déjà un compte? <a href="{{ route('login') }}"
                        class="fw-bold text-body"><u>Se connecter</u></a></p>

                </form>

                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection