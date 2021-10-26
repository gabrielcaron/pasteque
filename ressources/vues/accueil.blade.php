@extends('gabarit')

@section('contenu')
    <section class="nouveautes livre">
        <h2 class="accueil__titre">Nouveautés</h2>
        <div class="nouveautes__conteneurGrille">
            <!-- Foreach Nouveautés -->
            @foreach($nouveautes as $livre)
                <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                    <article class="livre__article">
                        <img src="https://via.placeholder.com/400x500">
                        <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                        {{--                    <p class="livres__nouveaute">Nouveauté</p>--}}
                        {{--                    <p class="livres__nouveaute">A parraitre</p>--}}
                        <ul class="">
                            <li class="livre__auteur">{{$livre->getAuteurAssocie()->getPrenom()}} {{$livre->getAuteurAssocie()->getNom()}}</li>
                            <li class="livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                        </ul>
                    </article>
                </a>
            @endforeach
        </div>
    </section>
@endsection

