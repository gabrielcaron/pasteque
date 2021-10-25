@extends('gabarit')

@section('contenu')
    <div class="conteneur">
        <h1>Liste Auteurs</h1>
        <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Auteurs</strong></p>
        <button class="enveloppe__">Filtres</button>

        <!-- Vérification quel est actif -->
        <p id="test" class="enveloppe__test">Changer pour une vue en liste : <a><img src="https://via.placeholder.com/40"></a></p>
        <p class="enveloppe__">Changer pour une vue en vignette : <a><img src="https://via.placeholder.com/40"></a></p>
        <form class="enveloppe__">
            <p class="formulaire__champEnveloppe">
                <label class="" for="">Trier par : </label>
                <select id="" class="">
                    <option class="">Auteurs A-Z</option>
                    <option class="">Auteurs Z-A</option>
                </select>
            </p>
        </form>
        <p><strong>X résultats affichés</strong> de {{$nombreAuteurs}} résultats</p>

        </section>
        <section class="livres">
            <!-- Foreach livres -->
            @foreach($auteurs as $auteur)
                <a href="index.php?controleur=livre&action=fiche&id={{$auteur->getId()}}">
                    <article class="livres__article">
                        <h2 class="livres__titre">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</h2>
                        <img src="https://via.placeholder.com/150">
                        <p>{{substr($auteur->getNotice(), 0, 150)}}</p>
                    </article>
                </a>
            @endforeach
        </section>
    </div>
@endsection

