
@extends('layouts.app')

@section('content_nav')
    <form class="d-flex nav-item dropdown">
        <a href="/login" class="btn btn-outline-dark" type="submit" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $name }}
            <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
            <i class="bi bi-box-arrow-in-right"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @guest
            <li><a class="dropdown-item" href="./liste">Login</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="./liste">Registration</a></li>
            @else
            <li><a class="dropdown-item" href="./liste">Articles</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            @endguest
        </ul>
    </form>
@endsection