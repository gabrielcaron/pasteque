@extends('gabarit')

@section('contenu')
    <section class="nouveautes livre">
        <h2 class="accueil__titre">Nouveautés</h2>
        <div class="nouveautes__conteneurGrille">
            <!-- Foreach Nouveautés -->
            @foreach($nouveautes as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                    <article class="livre__article">
                        <img @if ($livre->getStatut() > 0)
                             class="livre__image etiquette"
                             @else
                             class="livre__image"
                             @endif src="https://via.placeholder.com/400x500">

                        @if ($livre->getStatut() > 0)
                            <p class="livre__etiquette">Nouveauté</p>
                        @endif
                        <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                        <ul class="livre__listeInfos">
                            <li class="livre__item livre__auteur">{{$livre->getAuteurAssocie()->getPrenom()}} {{$livre->getAuteurAssocie()->getNom()}}</li>
                            <li class="livre__item livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                        </ul>
                    </article>
                </a>
            @endforeach
        </div>
    </section>
@endsection

