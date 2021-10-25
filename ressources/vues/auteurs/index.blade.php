@extends('gabarit')

@section('contenu')
    <div class="conteneur">
        <h1>Liste Auteurs</h1>
        <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Auteurs</strong></p>
        <button class="enveloppe__">Filtres</button>

        <!-- Vérification quel est actif -->
        <p id="test" class="enveloppe__test">Changer pour une vue en liste : <a><img src="https://via.placeholder.com/40"></a></p>
        <p class="enveloppe__">Changer pour une vue en vignette : <a><img src="https://via.placeholder.com/40"></a></p>
        <form class="enveloppe__" novalidate>
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
        <section class="auteurs">
            <!-- Foreach auteurs -->
            @foreach($auteurs as $auteur)
                <a href="index.php?controleur=auteur&action=fiche&id={{$auteur->getId()}}">
                    <article class="auteurs__article">
                        <h2 class="auteurs__titre">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</h2>
                        <img src="https://via.placeholder.com/150">
                        <p>{{substr($auteur->getNotice(), 0, 150)}}...</p>
                    </article>
                </a>
            @endforeach
        </section>
    </div>
@endsection

