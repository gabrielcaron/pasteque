@extends('gabarit')
@section('classeMain')
    class="artiste"
@endsection
@section('contenu')
    <section class="filAriane">
        <span><a href="index.php">Accueil</a><a href="index.php?controleur=auteur&action=index"> / Artistes</a> / {{$auteur->getPrenom()}} {{$auteur->getNom()}}</span>
    </section>
    <section class="auteur">
        <div class="auteur__conteneur1">
            @if(file_exists("liaisons/images/extraits/{$auteur->getId()}-1140.jpg"))
                <img class="auteur__conteneurImg" src="../public/liaisons/images/auteurs/{{$auteur->getId()}}-1140.jpg" alt="{{$auteur->getPrenom()}} {{$auteur->getNom()}}" width="20%">
            @else
                <img class="auteur__conteneurImg" src="../public/liaisons/images/auteurs/img-auteur-sans-photo.jpg" alt="{{$auteur->getPrenom()}} {{$auteur->getNom()}}" width="20%">
            @endif
        </div>
        <div class="auteur__conteneur2">
            <h1 class="auteur__nom">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</h1>
            <br>
            <h3 class="auteur__noticeTitre">Biographie</h3>
            <p class="auteur__notice">{{$auteur->getNotice()}}</p>
            <br>
            <h3 class="auteur__noticeTitre">Site web</h3>
            <p class="auteur__site">Visiter le <a href="{{$auteur->getSiteWeb()}}" class="auteur__siteLien" target="_blank">site internet de {{$auteur->getPrenom()}} {{$auteur->getNom()}}</a></p>

        </div>
    </section>

    <section class="livres">
        <h2 class="livres__titre">Découvrez ses livres</h2>
        <div class="livre conteneurGrille">
            @foreach($auteur->getLivresAssocies() as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={$livre->getIdLivre()}">
                    <article class="livre__article">
                        <div class="livre__conteneurVignette">
                            <picture class="livre__picture">
                                <!-- Image pour mobile, tablette et poste de table -->
                                <img class="livre__image etiquette"
                                     src="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg"
                                     srcset="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg 1x, ../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-940.jpg 2x"
                                     alt="">
                            </picture>
                            <p class="livre__etiquette">À paraître</p>
                        </div>
                        <div class="livre__conteneurTitreInfos">
                            <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>
    </section>









   {{-- <section class="nouveautes livres">
        <h2 class="accueil__titre">Découvrir ses livres</h2>
        <div class="livre conteneurGrille">
            <!-- Foreach Nouveautés -->
            --}}{{--                        Faire un modulo, s'il se divise par 3, c'est une rangée--}}{{--
            @foreach($auteur->getLivresAssocies() as $livre)
                <a class="livre__lienAuteur" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                    <article class="livre__article">
                        <div class="livre__conteneurVignette">
                            <picture class="livre__picture">
                                <!-- Image pour mobile, tablette et poste de table -->
                                <img class="livre__image etiquette"
                                     src="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg"
                                     srcset="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg 1x, ../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-940.jpg 2x"
                                     alt="">
                            </picture>
                            <p class="livre__etiquette">Nouveauté</p>
                        </div>
                        <div class="livre__conteneurTitreInfos">
                            <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                            <ul class="livre__listeInfos">
                                @foreach($livre->getAuteurAssocie() as $auteur)
                                    <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                                @endforeach
                                <li class="livre__item livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                            </ul>
                        </div>
                    </article>
                </a>
            @endforeach
        </div>
        <svg class="livre__tablette" fill="none" viewBox="0 0 1398 100" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink">
            <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1=".130859" y2="22.7499">
                <stop offset="0" stop-color="#fcfcfc"/>
                <stop offset="1" stop-color="#f2f2ee"/>
            </linearGradient>
            <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1="22.7499" y2="47.954">
                <stop offset="0"/>
                <stop offset="1" stop-color="#fff"/>
            </linearGradient>
            <rect fill="url(#a)" height="21.619" rx="3.5" stroke="#f0f0f0" width="1397" x=".5" y=".630859"/>
            <path d="m0 22.7499h1398l-355 76.9048h-720z" fill="url(#b)" fill-opacity=".04"/>
        </svg>
    </section>--}}
@endsection

