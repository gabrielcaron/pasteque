@extends('gabarit')

@section('contenu')
    <div class="conteneur">
        <section class="filAriane">
            <span><a href="index.php">Accueil</a> / <a href="index.php?controleur=Auteur&action=index">Artistes</a></span>
        </section>
        <section>
            <h1>Liste Auteurs</h1>
            <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Auteurs</strong></p>
            <button class="enveloppe__">Filtres</button>
            <form id="formTri" class="enveloppe__Tris" action="index.php?controleur=livre&action=index" method="POST">
                <input id="id_page" value="{{$numeroPage}}" type="hidden" name="id_page">
                <p class="formulaire__champEnveloppe">
                    @if($choixVue === 'vignette')
                        <input id="vignette" value="vignette" name="choixVue" type="radio" checked>
                        <label for="vignette">Changer pour une vue en liste</label>
                        <input id="liste" value="liste" name="choixVue" type="radio">
                        <label for="liste">Changer pour une vue en liste</label>
                    @else
                        <input id="vignette" value="vignette" name="choixVue" type="radio">
                        <label for="vignette">Changer pour une vue en liste</label>
                        <input id="liste" value="liste" name="choixVue" type="radio" checked>
                        <label for="liste">Changer pour une vue en liste</label>
                    @endif
                </p>
                <p class="formulaire__champEnveloppe">
                    <label class="" for="nbAuteursParPage">Nombre d'auteurs par page : </label>
                    <select name="nbAuteursParPage" id="nbAuteursParPage" class="">
                        @switch($intNbLivreParPage)
                            @case(9)
                            <option value="9" selected>9 auteurs par page</option>
                            <option value="15">15 auteurs par page</option>
                            <option value="30">30 auteurs par page</option>
                            <option value="tous">tout auteurs par page</option>
                            @break

                            @case(15)
                            <option value="9">9 auteurs par page</option>
                            <option value="15" selected>15 auteurs par page</option>
                            <option value="30">30 auteurs par page</option>
                            <option value="tous">tout auteurs par page</option>
                            @break

                            @case(30)
                            <option value="9">9 auteurs par page</option>
                            <option value="15">15 auteurs par page</option>
                            <option value="30" selected>30 auteurs par page</option>
                            <option value="tous">tout auteurs par page</option>
                            @break

                            @default
                            <option value="9">9 auteurs par page</option>
                            <option value="15">15 auteurs par page</option>
                            <option value="30">30 auteurs par page</option>
                            <option value="tous" selected>tout auteurs par page</option>
                        @endswitch
                    </select>
                </p>
                <p><strong>X résultats affichés</strong> de {{$nombreAuteurs}} résultats</p>
                <p class="formulaire__champEnveloppe">
                    <label class="" for="trierPar">Trier par : </label>
                    <select name="trierPar" id="trierPar" class="">
                        @switch($trierPar)
                            @case('auteurs.nomD')
                            <option value="auteurs.nomA">Auteurs A-Z</option>
                            <option value="auteurs.nomD" selected>Auteurs Z-A</option>
                            @break

                            @default
                            <option value="auteurs.nomA" selected>Auteurs A-Z</option>
                            <option value="auteurs.nomD">Auteurs Z-A</option>
                        @endswitch
                    </select>
                </p>
                <input class="" type="submit" id="auteurTrie">
            </form>
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

