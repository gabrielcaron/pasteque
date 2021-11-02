@extends('gabarit')

@section('contenu')
    <section class="nouveautes livre">
        <h2 class="accueil__titre">Nouveautés</h2>
        <div class="nouveautes__conteneurGrille">
            <!-- Foreach Nouveautés -->
{{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
            @foreach($nouveautes as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                    <article class="livre__article">
                        <div class="livre__conteneurVignette">
                            <img @if ($livre->getStatut() > 1)
                                 class="livre__image etiquette"
                                 @else
                                 class="livre__image"
                                 @endif src="https://via.placeholder.com/460x500">

                            @if ($livre->getStatut() == 2)
                                <p class="livre__etiquette">Nouveauté</p>
                            @endif
                        </div>
                        <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                        <ul class="livre__listeInfos">
                            <li class="livre__item livre__auteur">{{$livre->getAuteurAssocie()->getPrenom()}} {{$livre->getAuteurAssocie()->getNom()}}</li>
                            <li class="livre__item livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                        </ul>
                    </article>
                </a>
            @endforeach
        </div>
        <svg class="livre__tablette" fill="none" viewBox="0 0 1398 100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1=".130859" y2="22.7499"><stop offset="0" stop-color="#fcfcfc"/><stop offset="1" stop-color="#f2f2ee"/></linearGradient><linearGradient id="b" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1="22.7499" y2="47.954"><stop offset="0"/><stop offset="1" stop-color="#fff"/></linearGradient><rect fill="url(#a)" height="21.619" rx="3.5" stroke="#f0f0f0" width="1397" x=".5" y=".630859"/><path d="m0 22.7499h1398l-355 76.9048h-720z" fill="url(#b)" fill-opacity=".04"/></svg>
    </section>
    <section class="aparaitre livre">
        <h2 class="accueil__titre">À paraître</h2>
        <div class="nouveautes__conteneurGrille">
            <!-- Foreach À paraître -->
            {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
            @foreach($aparaitre as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                    <article class="livre__article">
                        <div class="livre__conteneurVignette">
                            <img @if ($livre->getStatut() > 1)
                                 class="livre__image etiquette"
                                 @else
                                 class="livre__image"
                                 @endif src="https://via.placeholder.com/460x500">

                            @if ($livre->getStatut() == 3)
                                <p class="livre__etiquette">Nouveauté</p>
                            @endif
                        </div>
                        <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                        <ul class="livre__listeInfos">
                            <li class="livre__item livre__auteur">{{$livre->getAuteurAssocie()->getPrenom()}} {{$livre->getAuteurAssocie()->getNom()}}</li>
                            <li class="livre__item livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                        </ul>
                    </article>
                </a>
            @endforeach
        </div>
        <svg class="livre__tablette" fill="none" viewBox="0 0 1398 100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="a" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1=".130859" y2="22.7499"><stop offset="0" stop-color="#fcfcfc"/><stop offset="1" stop-color="#f2f2ee"/></linearGradient><linearGradient id="b" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1="22.7499" y2="47.954"><stop offset="0"/><stop offset="1" stop-color="#fff"/></linearGradient><rect fill="url(#a)" height="21.619" rx="3.5" stroke="#f0f0f0" width="1397" x=".5" y=".630859"/><path d="m0 22.7499h1398l-355 76.9048h-720z" fill="url(#b)" fill-opacity=".04"/></svg>
    </section>
    <section class="actualites">
        <h2 class="accueil__titre">Actualités</h2>
        <div class="nouveautes__conteneurGrille">
            <!-- Foreach Actualités -->
            @foreach($actualites as $actualite)
                <a class="actualite__lien" href="{{$actualite->getId()}}">
                    <article class="actualite__article">
                            <img class="actualite__image" src="https://via.placeholder.com/460x500">
                        <h3 class="actualite__titre">{{$actualite->getTitre()}}</h3>
                        <p class="actualite__contenu"></p>
                    </article>
                </a>
            @endforeach
        </div>
    </section>
@endsection
