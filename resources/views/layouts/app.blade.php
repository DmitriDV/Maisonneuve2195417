<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="./liste">Maisonneuve-e2195417</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="./about">À propos</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Recherche</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./liste">Anciens étudiants</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="./liste">Nouveaux étudiants</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="./liste">Chats populaires</a></li>
                            </ul>
                        </li>
                    </ul>
                    @php $locale = session()->get('locale'); @endphp
                    @guest
                    <form class="d-flex mx-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-dark" type="submit">
                        Login
                        <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>
                    </form>
                    <form class="d-flex mx-2">
                    <a href="{{ route('registration') }}" class="btn btn-outline-dark" type="submit">
                        Registration
                        <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        <i class="bi bi-person-circle"></i>
                    </a>
                    </form>
                    @else
                    <form class="d-flex mx-2">
                    <a href="{{ route('forum') }}" class="btn btn-outline-dark" type="submit">
                        Articles
                        <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    </form>
                    <form class="d-flex mx-2">
                    <a href="{{ route('logout') }}" class="btn btn-outline-dark" type="submit">
                        Logout
                        <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        <i class="bi bi-arrow-left-circle"></i>
                    </a>
                    </form>
                    @endguest
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Réseau social des étudiants</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Être ensemble, c'est mieux !</p>
                </div>
            </div>
        </header>
        @yield('content')
        @yield('script')
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Dmitriy Dudchenko 2022</p></div>
        </footer>
        <!-- Script -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
