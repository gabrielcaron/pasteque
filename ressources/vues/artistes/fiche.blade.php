@extends('gabarit')

@section('classeBody')
    artiste
@endsection

@section('contenu')
    <section class="filAriane">
        <span><a href="index.php">Accueil</a><a
                    href="index.php?controleur=auteur&action=index"> / Artistes</a> / {{$auteur->getPrenom()}} {{$auteur->getNom()}}</span>
    </section>
    <section class="auteur">
        <div class="auteur__conteneur1">
            @if(file_exists("liaisons/images/auteurs/{$auteur->getId()}-1140.jpg"))
                <img class="auteur__conteneurImg" src="../public/liaisons/images/auteurs/{{$auteur->getId()}}-1140.jpg"
                     alt="{{$auteur->getPrenom()}} {{$auteur->getNom()}}" width="20%">
            @else
                <img class="auteur__conteneurImg" src="../public/liaisons/images/auteurs/img-auteur-sans-photo.jpg"
                     alt="{{$auteur->getPrenom()}} {{$auteur->getNom()}}" width="20%">
            @endif
        </div>
        <div class="auteur__conteneur2">
            <h1 class="auteur__nom">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</h1>
            <br>
            <h3 class="auteur__noticeTitre">Biographie</h3>
            <p class="auteur__notice">{{$auteur->getNotice()}}</p>
            <br>
            <h3 class="auteur__noticeTitre">Site web</h3>
            <p class="auteur__site">Visiter le <a href="{{$auteur->getSiteWeb()}}" class="auteur__siteLien"
                                                  target="_blank">site internet
                    de {{$auteur->getPrenom()}} {{$auteur->getNom()}}</a></p>

        </div>
    </section>

    <section class="livres">
        <h2 class="livres__titre">Découvrez ses livres</h2>
        <div class="livre conteneurGrille">
            @foreach($auteur->getLivresAssocies() as $livre)
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
                        </div>
                    </article>
                </a>
            @endforeach
        </div>
    </section>
@endsection

