@extends('gabarit')

@section('contenu')
    <div class="conteneur">
        <section class="enveloppe">
            <h1 class="enveloppe__">Livres</h1>
            <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Livres</strong></p>
            <bouton class="enveloppe__">Filtres</bouton>
            <ul class="enveloppe__">
                <form>
                    <input type="checkbox" id="categorie_tous" name="categories">
                    <label for="categorie_tous">Tous</label>
                    <!-- Foreach categorie categorie->nom -->
                    @foreach($categories as $categorie)
                        <li class="enveloppe__"><a class="enveloppe__" href="index.php?controleur=livre&action=index&id_categorie={{$categorie->getId()}}">{{$categorie->getNom()}}</a></li>
                    @endforeach
                </form>
            </ul>
            <!-- Vérification quel est actif -->
            <p class="enveloppe__">Changer pour une vue en liste : <a><img src="https://via.placeholder.com/40"></a></p>
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

