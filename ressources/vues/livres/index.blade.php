@extends('gabarit')

@section('contenu')
    <div class="conteneur">
        <section class="enveloppe">
            <h1 class="enveloppe__">Livres</h1>
            <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Livres</strong></p>
            <button class="enveloppe__">Filtres</button>
                <form>
                    <ul class="enveloppe__liste">
                        @foreach($categories as $categorie)
                            <input type="checkbox" id="enveloppe__liste--input--{{$categorie->getId()}}" name="categories">
                            <label for="enveloppe__liste--input--{{$categorie->getId()}}" id="enveloppe__liste--label--{{$categorie->getId()}}">{{$categorie->getNom()}}</label>
                        @endforeach
                        @foreach($categories as $categorie)
                            <li class="enveloppe__liste--item"><a class="enveloppe__liste--lien" href="index.php?controleur=livre&action=index&id_categorie={{$categorie->getId()}}">{{$categorie->getNom()}}</a></li>
                        @endforeach
                    </ul>
                </form>

            <!-- Vérification quel est actif -->
            <p id="test" class="enveloppe__test">Changer pour une vue en liste : <a><img src="https://via.placeholder.com/40"></a></p>
            <p class="enveloppe__">Changer pour une vue en vignette : <a><img src="https://via.placeholder.com/40"></a></p>
            <form class="enveloppe__">
                <p class="formulaire__champEnveloppe">
                    <label class="" for="">Trier par : </label>
                    <select id="" class="">
                        <option class="">Categories A-Z</option>
                        <option class="">Categories Z-A</option>
                        <option class="">Livres A-Z</option>
                        <option class="">Livres Z-A</option>
                        <option class="">Auteurs A-Z</option>
                        <option class="">Auteurs Z-A</option>
                    </select>
                </p>
            </form>
            <p><strong>X résultats affichés</strong> de {{$nombreLivre}} résultats</p>

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
    </div>
@endsection

