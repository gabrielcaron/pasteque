@extends('gabarit')

@section('contenu')
    <div class="indexLivres">
        <section class="filAriane">
            <span><a href="index.php">Accueil</a> / <a href="index.php?controleur=auteur&action=index">Artistes</a></span>
        </section>
        <section>
            <h1>Liste Auteurs</h1>
            <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Auteurs</strong></p>
            <button class="enveloppe__">Filtres</button>
            <form id="formTri" class="enveloppe__Tris" action="index.php?controleur=auteur&action=index" method="POST">
                <input id="id_page" value="0" type="hidden" name="id_page">
                <fieldset class="formulaire__groupeChamps tuiles">
                    <legend class="formulaire__sectionLegende">
                        <h3 class="formulaire__sectionTitre">Type de vue:</h3>
                    </legend>
                    <ul class="formulaire__liste">
                        <li class="bloc">
                            <input  class="radio screen-reader-only" id="vignette" value="vignette" name="choixVue" type="radio" @if($choixVue === 'vignette') checked @endIf>
                            <label  class="libelle" for="vignette">Changer pour une vue en vignette</label>
                        </li>
                        <li class="bloc">
                            <input class="radio screen-reader-only" id="liste" value="liste" name="choixVue" type="radio" @if($choixVue === 'liste') checked @endIf>
                            <label class="libelle" for="liste">Changer pour une vue en liste</label>
                        </li>
                    </ul>
                </fieldset>
                <fieldset class="formulaire__groupeChamps tuiles">
                    <legend class="formulaire__sectionLegende">
                        <h3 class="formulaire__sectionTitre">Nombre de livre par page :</h3>
                    </legend>
                    <p class="formulaire__champEnveloppe">
                        {{--<label class="" for="nbAuteursParPage"> </label>--}}
                        <select name="nbAuteursParPage" id="nbAuteursParPage" class="">
                            <option value="9" @if($nbAuteursParPage === '9') selected @endIf>9 auteurs par page</option>
                            <option value="15" @if($nbAuteursParPage === '15') selected @endIf>15 auteurs par page</option>
                            <option value="30" @if($nbAuteursParPage === '30') selected @endIf>30 auteurs par page</option>
                            <option value="tous" @if($nbAuteursParPage !== '9' && $nbAuteursParPage !== '15' &&  $nbAuteursParPage !== '30') selected @endIf>tout auteurs par page</option>
                        </select>
                    </p>
                </fieldset>
                <p><strong>{{$nbAuteursParPage}} résultats affichés</strong> de {{$nombreAuteurs}} résultats</p>
                <fieldset class="formulaire__groupeChamps tuiles">
                    <legend class="formulaire__sectionLegende">
                        <h3 class="formulaire__sectionTitre">Trier par:</h3>
                    </legend>
                    <p class="bloc">
                        <label class="" for="trierPar">Trier par : </label>
                        <select name="trierPar" id="trierPar" class="">
                            <option value="auteurs.nomA" @if($trierPar === 'auteurs.nomA') selected @endIf>Auteurs A-Z</option>
                            <option value="auteurs.nomD" @if($trierPar === 'auteurs.nomD') selected @endIf>Auteurs Z-A</option>
                        </select>
                    </p>
                </fieldset>

                <input class="" type="submit" id="auteurTrie">
            </form>
        </section>
        <section class="livres @if($choixVue==='liste') modeliste @endif">
            <!-- un titre display none? -->
            <div class="livre conteneurGrille">
                <!-- Foreach Nouveautés -->
                {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
                @foreach($auteurs as $auteur)
                    <a class="livre__lien" href="index.php?controleur=auteur&action=fiche&id={{$auteur->getId()}}">
                        <article class="livre__article">
                            <div class="livre__conteneurVignette">
                                <picture class="livre__picture">
                                    <!-- Image pour mobile, tablette et poste de table
                                    <img class="livre__image etiquette"
                                         src="../public/liaisons/images/livres/-470.jpg"
                                         srcset="../public/liaisons/images/livres/-470.jpg 1x, ../public/liaisons/images/livres/-940.jpg 2x"
                                         alt="">-->
                                </picture>
                            </div>
                            <div class="livre__conteneurTitreInfos">
                                <h3 class="livre__titre">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</h3>
                                <p>{{substr($auteur->getNotice(), 0, 150)}}...</p>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>
        </section>
        @include('auteurs.fragments.pagination')
    </div>
@endsection

