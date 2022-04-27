<div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Bienvenue sur notre réseau social!</h1>
                    </div>
                    <div class="col-4">
                        <p>Ajouter un nouvel étudiant</p>
                        <a href="{{ route('liste.create') }}" class="btn btn-primary btn-sm">Ajouter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                 
                    

                    @forelse ($etudiants as $etudiant)

                    <div class="card h-100">
                        <!-- Etudiant image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Etudiant details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Etudiant-->
                                <h5 class="fw-bolder">{{ ucfirst($etudiant->nom) }}</h5>                               
                            </div>
                        </div>
                        <!-- Etudiant actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Voir les détails</a></div>
                        </div>
                    </div>
                    @empty
                    <li>Aucun etudiant</li>
                    @endforelse

                </div>
        

            </div>
        </div>
    </section>