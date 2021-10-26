@extends('gabarit')

@section('contenu')
    <div class="conteneur">
        <section class="enveloppe">
            <h1 class="enveloppe__">Livres</h1>
            <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Livres</strong></p>
            <button class="enveloppe__">Filtres</button>
            <form class="enveloppe__Tris" action="index.php?controleur=livre&action=index" method="POST">
                    <ul class="enveloppe__liste">
                        @foreach($categories as $categorie)
                            <div>
                                <input value="{{$categorie->getId()}}" type="checkbox" id="enveloppe__liste--input--{{$categorie->getId()}}" name="{{$categorie->getId()}}">
                                <label for="enveloppe__liste--input--{{$categorie->getId()}}" id="enveloppe__liste--label--{{$categorie->getId()}}">{{$categorie->getNom()}}</label>
                            </div>
                        @endforeach
                    </ul>
            <!-- Vérification quel est actif -->
                <p class="formulaire__champEnveloppe">
                    <input id="vignette" value="vignette" name="choixVue" type="radio">
                    <label for="vignette">Changer pour une vue en liste</label>
                    <input id="vignette" value="vignette" name="choixVue" type="radio">
                    <label for="vignette">Changer pour une vue en liste</label>
                </p>
                <p class="formulaire__champEnveloppe">
                    <label class="" for="nombreLivres">Nombre de livre par page : </label>
                    <select name="nombreLivres" id="nombreLivres" class="">
                        <option value="9">9 livres par page</option>
                        <option value="15">15 livres par page</option>
                        <option value="30">30 livres par page</option>
                        <option value="tous">tout livres par page</option>
                    </select>
                </p>
                <p><strong>X résultats affichés</strong> de {{$nombreLivre}} résultats</p>
                <p class="formulaire__champEnveloppe">
                    <label class="" for="trierPar">Trier par : </label>
                    <select name="trierPar" id="trierPar" class="">
                        <option value="categorieA">Categories A-Z</option>
                        <option value="categorieD">Categories Z-A</option>
                        <option value="livresA">Livres A-Z</option>
                        <option value="livresD">Livres Z-A</option>
                        <option value="auteursA">Auteurs A-Z</option>
                        <option value="auteursD">Auteurs Z-A</option>
                        <option value="parutionA">Plus récents au plus anciens</option>
                        <option value="parutionD">Plus anciens au plus récents</option>
                    </select>
                </p>
                <input class="" type="submit" id="livresTrie">
            </form>
        </section>
        <section class="livres">
            <!-- Foreach livres -->
            @foreach($livres as $livre)
            <a href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                <article class="livres__article">
                    <h2 class="livres__titre">{{$livre->getTitre()}}</h2>
                    <p class="livres__nouveaute">Nouveauté</p>
                    <p class="livres__nouveaute">A parraitre</p>
                    <img src="https://via.placeholder.com/150">
                    <ul class="">
                        <li class="livres__auteur">{{$livre->getAuteurAssocie()->getPrenom()}} {{$livre->getAuteurAssocie()->getNom()}}</li>
                        <li class="livres__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                    </ul>
                </article>
            </a>
            @endforeach
        </section>
        @include('livres.fragments.pagination')
    </div>
@endsection

