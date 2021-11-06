@extends('gabarit')

@section('classeMain')
{{--    class="accueil"--}}
@endsection

@section('contenu')
{{--    Mettre un commentaire dans Kanban pour dire que je me suis entendu à Michelle pour le balisage--}}
    <section class="livres">
        <h2 class="accueil__titre">Livres</h2>
        <div class="livre conteneurGrille">
            <!-- Foreach Nouveautés -->
            {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
            @foreach($nouveautes as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
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
    </section>
    <section class="nouveautes livres">
        <h2 class="accueil__titre">Nouveautés</h2>
        <div class="nouveautes__conteneurGrille">
            <!-- Foreach Nouveautés -->
            {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
            @foreach($nouveautes as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
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
    </section>
    <section class="aparaitre livres">
        <h2 class="accueil__titre">À paraître</h2>
        <div class="nouveautes__conteneurGrille">
            <!-- Foreach À paraître -->
            {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
            @foreach($aparaitre as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                    <article class="livre__article">
                        <div class="livre__conteneurVignette">
                            <img class="livre__image etiquette" src="https://via.placeholder.com/460x500">
                            <p class="livre__etiquette">À paraître</p>
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
    </section>
    <section class="actualites">
        <div class="actualites__conteneurGrille">
            <h2 class="accueil__titre">Actualités</h2>
            <!-- Foreach Actualités -->
            @foreach($actualites as $actualite)
                <article class="actualite">
                    <img class="actualite__image" src="https://via.placeholder.com/460x500">
                    <div class="actualite__conteneurInfos">
                        <h3 class="actualite__titre">{{$actualite->getTitre()}}</h3>
                        <time class="actualite__date">{{$actualite->getDate()}}</time>
                        <p class="actualite__contenu">{{$actualite->getlActualite()}}</p>
                        <a class="actualite__lien" href="{{$actualite->getLienFacebook()}}">Voir sur Facebook</a>
                        <a class="actualite__lien" href="{{$actualite->getLienInstagram()}}">Voir sur Instagram</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
