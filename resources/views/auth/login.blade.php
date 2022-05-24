@extends('layouts.app')
@section('content')
<section class="vh-65 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">@lang('lang.title_login_user')</h2>
                            <form action="{{ route('custom.login')}}" method="post">
                                @csrf
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                    {{ session('success')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control" placeholder="@lang('lang.placeholder_registration_email')" name="email" value="{{old('email')}}"/>
                                    @if($errors->has('email'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('email') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" class="form-control" placeholder="@lang('lang.text_password')" name="password"/>
                                    @if($errors->has('password'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first('password') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @elseif(!$errors->has('email') and ($errors->all()))
                                    
                                    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                        {{ $errors->first() }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center btn-group-vertical">
                                    <button class="btn btn-outline-dark">@lang('lang.button_login')</button>
                                </div>
                                <p class="text-center text-muted mt-5 mb-0">@lang('lang.text_question_login')<a href="{{ route('registration') }}"
                                    class="fw-bold text-body"><u>@lang('lang.button_sign_up')</u></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection