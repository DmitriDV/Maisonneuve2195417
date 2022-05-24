@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="about-heading-content">
        <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
                <div class="bg-faded rounded p-5">
                    <!-- Retour-->
                    <div class="">
                        <a href="{{ route('forum') }}" class="btn btn-outline-dark mt-4 mb-4 ">@lang('lang.button_return')</a>
                    </div>
                    <h2 class="display-one mb-4">@lang('lang.title_forum_create')</h2>

                    <form method="post">
                        @csrf
                        @method('POST')
                        <div class="row">   
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="home" aria-selected="true">English</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#french" type="button" role="tab" aria-controls="profile" aria-selected="false">French</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="control-group col-12">  
                                        <label class="mt-3" for="titre_en">@lang('lang.title_forum_text')</label>
                                        <div class="cta-inner bg-faded text-center rounded">
                                            <input type="text" id="titre_en" class="form-control" name="titre_en" value="" >
                                        </div>
                                        @if($errors->has('titre_en'))
                                        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                            {{ $errors->first('titre_en') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="control-group col-12 mt-2">
                                        <label class="mt-3" for="contenu_en">@lang('lang.content_forum_text')</label>
                                        <div class="cta-inner bg-faded text-center rounded">
                                            <textarea id="contenu_en" class="form-control" name="contenu_en" rows="" >
                                            </textarea>
                                        </div>
                                        @if($errors->has('contenu_en'))
                                        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                            {{ $errors->first('contenu_en') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                    </div>
                                </div>  
                                <div class="tab-pane fade" id="french" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="control-group col-12">
                                        <label class="mt-3" for="titre_fr">@lang('lang.title_forum_text')</label>
                                        <div class="cta-inner bg-faded text-center rounded">
                                            <input type="text" id="titre_fr" class="form-control" name="titre_fr" value="" >
                                        </div>
                                        @if($errors->has('titre_fr'))
                                        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                            {{ $errors->first('titre_fr') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="control-group col-12 mt-2">
                                        <label class="mt-3" for="contenu_fr">@lang('lang.content_forum_text')</label>
                                        <div class="cta-inner bg-faded text-center rounded">
                                            <textarea id="contenu_fr" class="form-control" name="contenu_fr" rows="" >
                                            </textarea>
                                        </div>
                                        @if($errors->has('contenu_fr'))
                                        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                            {{ $errors->first('contenu_fr') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Categorie -->
                            <div class="control-group col-12 mt-2">
                                <label for="categorie">Categorie</label>
                                <select id="categorie" class="form-control" name="categorie_id" >
                                    <option value=""></option>
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('categorie_id'))
                                <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                    {{ $errors->first('categorie_id') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <button class="btn btn-outline-dark mt-4 mb-5" id="submitButton" type="submit">@lang('lang.button_forum_create')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection