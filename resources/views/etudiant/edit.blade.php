@extends('layouts.app')
@section('content')
<section class="vh-120 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">@lang('lang.title_student_modification')</h2>
                            <form action="" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-1">
                                    <label class="mt-3" for="name">@lang('lang.title_registration_name') :</label>
                                    <input type="text" class="form-control" placeholder="@lang('lang.placeholder_registration_name')" name="name" value="{{$user->name}}" />

                                    @if($errors->has('name'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('name') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-outline mb-1">
                                    <label class="mt-3" for="">@lang('lang.title_registration_address') :</label>
                                    <input type="text" class="form-control" placeholder="@lang('lang.placeholder_registration_address')" name="adresse" value="{{$user->userHasEtudiant->adresse}}" />

                                    @if($errors->has('address'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('address') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-outline mb-1">
                                    <label class="mt-3" for="ville_id">@lang('lang.title_registration_city') :</label>
                                    <div class="cta-inner bg-faded text-center rounded">
                                        <select class="form-control" name="ville_id" id="ville_id" placeholder="" >
                                            <option value="{{$user->userHasEtudiant->etudiantHasVille->id}}">{{$user->userHasEtudiant->etudiantHasVille->nom}}</option>
                                            @forelse ($villes as $ville)
                                            <option value= "{{ $ville->id }}" @selected>
                                                {{ $ville->nom }}
                                            </option>
                                            @empty
                                            <li>Aucun ville</li>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="form-outline mb-1">
                                <label class="mt-3" for="phone">@lang('lang.title_registration_telephone') :</label>
                                    <input type="text" class="form-control" placeholder="@lang('lang.placeholder_registration_telephone')" name="phone" value="{{$user->userHasEtudiant->phone}}" />

                                    @if($errors->has('phone'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('phone') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-outline mb-1">
                                <label class="mt-3" for="date_de_naissance">@lang('lang.title_registration_birthday') :</label>
                                    <input type="text" class="form-control" placeholder="@lang('lang.placeholder_registration_birthday')" name="date_de_naissance" value="{{$user->userHasEtudiant->date_de_naissance}}" />

                                    @if($errors->has('date_de_naissance'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('date_de_naissance') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-outline mb-1">
                                    <label class="mt-3" for="email">@lang('lang.text_password') :</label>
                                    <input type="password" class="form-control" placeholder="@lang('lang.text_password')" name="password" />
                                </div>  
                                <div class="form-outline mb-5">    
                                    <label class="mt-3" for="email">@lang('lang.text_password_repeat') :</label>
                                    <input type="password" class="form-control" placeholder="@lang('lang.text_password_repeat')" name="password_confirmation" />
                                    @if($errors->has('password'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('password') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center btn-group-vertical">
                                    <button class="btn btn-outline-dark" id="submitButton" type="submit">@lang('lang.button_student_modify')</button>
                                </div>
                                <div class="d-flex justify-content-center btn-group-vertical mt-4">
                                    <a href="{{ route('liste.show', $user->id) }}" class="btn btn-outline-dark">@lang('lang.button_cancel')</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection