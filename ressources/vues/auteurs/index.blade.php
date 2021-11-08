@extends('gabarit')

@section('contenu')
    <section class="indexLivres livres @if($choixVue==='liste') modeliste @endif">
        <section class="filAriane">
            <span><a href="index.php">Accueil</a> / Artistes</span>
        </section>
        <section>
            <!-- Éventuellement être caché en mobile
            <button class="enveloppe__">Filtres</button> -->
            <form id="formTri" class="enveloppe__Tris" action="index.php?controleur=auteur&action=index" method="POST">
                <input id="id_page" value="0" type="hidden" name="id_page">
                <fieldset class="formulaire__groupeChamps tuiles">
                    <legend class="formulaire__sectionLegende">
                        <h3 class="formulaire__sectionTitre">Type de vue:</h3>
                    </legend>
                    <ul class="formulaire__liste">
                        <li class="bloc">
                            <input  onchange="document.getElementById('formTri').submit()" class="radio screen-reader-only" id="vignette" value="vignette" name="choixVue" type="radio" @if($choixVue === 'vignette') checked @endIf>
                            <label  class="libelle" for="vignette">Vue en vignette</label>
                        </li>
                        <li class="bloc">
                            <input onchange="document.getElementById('formTri').submit()" class="radio screen-reader-only" id="liste" value="liste" name="choixVue" type="radio" @if($choixVue === 'liste') checked @endIf>
                            <label class="libelle" for="liste">Vue en liste</label>
                        </li>
                    </ul>
                </fieldset>
                <fieldset class="formulaire__groupeChamps formulaire__groupeChampsRangee">
                    <legend class="formulaire__sectionLegende">
                        <h3 class="formulaire__sectionTitre screen-reader-only">Nombre d'auteurs par page :</h3>
                    </legend>
                    <p class="formulaire__champEnveloppe formulaire__champEnveloppeRangee">
                        {{--<label class="" for="nbAuteursParPage"> </label>--}}
                        <label class="screen-reader-only" for="nbAuteursParPage">Nombre d'auteurs par page :</label>
                        <select onchange="document.getElementById('formTri').submit()" name="nbAuteursParPage" id="nbAuteursParPage">
                            <option value="9" @if($nbAuteursParPage === '9') selected @endIf>9 auteurs par page</option>
                            <option value="15" @if($nbAuteursParPage === '15') selected @endIf>15 auteurs par page</option>
                            <option value="30" @if($nbAuteursParPage === '30') selected @endIf>30 auteurs par page</option>
                            <option value="tous" @if($nbAuteursParPage !== '9' && $nbAuteursParPage !== '15' &&  $nbAuteursParPage !== '30') selected @endIf>tout auteurs par page</option>
                        </select>
                    </p>
                    <p class="formulaire__champEnveloppe"><strong>{{$nbAuteursParPage}} résultats affichés</strong> de {{$nombreAuteurs}}</p>
                    <p class="formulaire__champEnveloppe formulaire__champEnveloppeRangee">
                        <label class="screen-reader-only" for="trierPar">Trier par : </label>
                        <select onchange="document.getElementById('formTri').submit()" name="trierPar" id="trierPar" class="">
                            <option value="auteurs.nomA" @if($trierPar === 'auteurs.nomA') selected @endIf>Auteurs A-Z</option>
                            <option value="auteurs.nomD" @if($trierPar === 'auteurs.nomD') selected @endIf>Auteurs Z-A</option>
                        </select>
                    </p>
                </fieldset>

                <input style="display: none" class="" type="submit" id="auteurTrie">
            </form>
        </section>
        <section >
            <h1>Auteurs</h1>
            <!-- un titre display none? -->
            <div class="livre conteneurGrille">
                <!-- Foreach Nouveautés -->
                {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
                @foreach($auteurs as $auteur)
                    <a class="livre__lien" href="index.php?controleur=auteur&action=fiche&id={{$auteur->getId()}}">
                        <article class="livre__article">
                            <div class="livre__conteneurVignette">
                                <picture class="livre__picture">
                                    <!-- Image pour mobile, tablette et poste de table -->
                                    <img class="livre__image etiquette"
                                         src="../public/liaisons/images/auteurs/{{$auteur->getId()}}-570.jpg"
                                         srcset="../public/liaisons/images/auteurs/{{$auteur->getId()}}-570.jpg 1x, ../public/liaisons/images/auteurs/{{$auteur->getId()}}-1140.jpg 2x"
                                         alt="{{$auteur->getPrenom()}} {{$auteur->getNom()}}">
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
        @if($nbAuteursParPage === '9' || $nbAuteursParPage === '15' ||  $nbAuteursParPage === '30')
            <section>
                @include('auteurs.fragments.pagination')
            </section>
        @endif
    </section>

@endsection

