@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <!-- Retour-->
                        <div class="">
                            <a href="{{ route('liste') }}" class="btn btn-outline-dark mt-4 mb-4">@lang('lang.button_return')</a>
                        </div>
                        <h2 class="display-one">@lang('lang.title_registration')</h2>
                        <form method="post">
                            @csrf
                            <label class="mt-3" for="name">@lang('lang.title_registration_name') :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" id="name" name="nom" type="text" placeholder="@lang('lang.placeholder_registration_name')" value=""/>
                            </div>
                            <label class="mt-3" for="adresse">@lang('lang.title_registration_address') :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <textarea class="form-control" name="adresse" id="adresse" type="adresse" placeholder="@lang('lang.placeholder_registration_address')" value=""></textarea>
                            </div>

                         <label class="mt-3" for="phone">@lang('lang.title_registration_telephone') :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="phone" id="phone" type="tel" placeholder="@lang('lang.placeholder_registration_telephone')"  value=""/>
                            </div>

                            <label class="mt-3" for="email">@lang('lang.title_registration_email') :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="email" id="email" type="email" placeholder="@lang('lang.placeholder_registration_email')"  value=""/>
                            </div>


                            
                            <label class="mt-3" for="date_de_naissance">@lang('lang.title_registration_birthday') :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <input class="form-control" name="date_de_naissance" id="date_de_naissance" placeholder="@lang('lang.placeholder_registration_birthday')"></input>
                            </div>
                            <label class="mt-3" for="ville_id">@lang('lang.title_registration_city') :</label>
                            <div class="cta-inner bg-faded text-center rounded">
                                <select class="form-control" name="ville_id" id="ville_id" placeholder="Entrez votre date de naissance..." >
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
                            <button class="btn btn-outline-dark mt-4 mb-5" id="submitButton" type="submit">@lang('lang.button_sign_up')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection