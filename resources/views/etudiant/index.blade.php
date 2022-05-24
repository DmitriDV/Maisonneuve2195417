@extends('layouts.app')
@section('content')
    <section class="py-5">
        
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-2 justify-content-center">
                <div class="col mb-5">
                    
                    <div class="">
                        <div class="text"><a class="btn btn-outline-dark mt-auto" href="{{ route('forum.create') }}">@lang('lang.title_forum_create')</a></div>
                    </div>
                </div>
                <div class="col-1">
                    <h2 class="display-one">@lang('lang.title_student_index')</h2>
                </div>
            </div>
        </div>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @forelse ($users as $user)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Etudiant image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c7574.jpg" alt="..." />
                        <!-- Etudiant details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Etudiant-->
                                <h5 class="fw-bolder">{{ ucfirst($user->name) }}</h5>
                            </div>
                        </div>
                        <!-- Etudiant actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('liste.show', $user->id) }}">@lang('lang.button_details')</a></div>
                        </div>
                    </div>
                </div>    
                @empty
                <li>Aucun etudiant</li>
                @endforelse
            </div>
        </div>
    </section>
@endsection