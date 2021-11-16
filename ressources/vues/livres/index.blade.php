@extends('gabarit')

@section('classeBody')
    livresIndex
@endsection

@section('contenu')
    @if($choixVue==='liste')
    <section class="indexLivres livres modeliste">
    @else
    <section class="indexLivres livres">
    @endif
        <section class="enveloppe">
            <section class="filAriane">
                <span><a href="index.php">Accueil</a> / Livres</span>
            </section>
            <!-- Éventuellement être caché en mobile
            <button class="enveloppe__">Filtres</button> -->
            <form id="formTri" class="enveloppe__Tris" action="index.php?controleur=livre&action=index" method="POST">
                <fieldset class="formulaire__groupeChamps tuiles">
                    <legend class="formulaire__sectionLegende">
                        <h3 class="formulaire__sectionTitre screen-reader-only">Trier par:</h3>
                    </legend>
                    <input id="id_page" value="0" type="hidden" name="id_page">
                    <ul class="formulaire__liste">
                        @foreach($categories as $categorie)
                            <li class="bloc">
                                <input onchange="document.getElementById('formTri').submit()" class="cocher screen-reader-only" value="{{$categorie->getId()}}" type="checkbox" id="enveloppe__liste--input--{{$categorie->getId()}}" name="categoriesSelectionner{{$categorie->getId()}}" @if(array_search($categorie->getId(), $categoriesSelectionner)) checked @endIf>
                                <label class="bouton libelle" for="enveloppe__liste--input--{{$categorie->getId()}}" id="enveloppe__liste--label--{{$categorie->getId()}}">{{$categorie->getNom()}}</label>
                            </li>
                        @endforeach
                    </ul>
                </fieldset>
                <svg class="livre__tablette" fill="none" viewBox="0 0 1398 100" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1=".130859" y2="22.7499">
                        <stop offset="0" stop-color="#fcfcfc"/>
                        <stop offset="1" stop-color="#f2f2ee"/>
                    </linearGradient>
                    <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="699" x2="699" y1="22.7499" y2="47.954">
                        <stop offset="0"/>
                        <stop offset="1" stop-color="#fff"/>
                    </linearGradient>
                    <rect fill="url(#a)" height="21.619" rx="3.5" stroke="#f0f0f0" width="1397" x=".5" y=".630859"/>
                    <path d="m0 22.7499h1398l-355 76.9048h-720z" fill="url(#b)" fill-opacity=".04"/>
                </svg>
                <fieldset class="formulaire__groupeChamps tuiles">
                    <legend class="formulaire__sectionLegende">
                        <h3 class="formulaire__sectionTitre" id="testRequest">Type de vue:</h3>
                    </legend>
                    <ul class="formulaire__liste">
                        <li class="bloc">
                            <input onchange="document.getElementById('formTri').submit()" class="radio screen-reader-only" id="vignette" value="vignette" name="choixVue" type="radio" @if($choixVue === 'vignette') checked @endIf>
                            <label  class="bouton libelle" for="vignette">Changer pour une vue en vignette</label>
                        </li>
                        <li class="bloc">
                            <input onchange="document.getElementById('formTri').submit()" class="radio screen-reader-only" id="liste" value="liste" name="choixVue" type="radio" @if($choixVue === 'liste') checked @endIf>
                            <label class="bouton libelle" for="liste">Changer pour une vue en liste</label>
                        </li>
                    </ul>
                </fieldset>
                <fieldset class="formulaire__groupeChamps formulaire__groupeChampsRangee">
                    <legend class="formulaire__sectionLegende">
                        <h3 class="formulaire__sectionTitre screen-reader-only">Nombre de livre par page :</h3>
                    </legend>
                    <p class="formulaire__champEnveloppe formulaire__champEnveloppeRangee">
                        {{--<label class="" for="nbAuteursParPage"> </label>--}}
                        <label class="screen-reader-only" for="nbLivreParPage">Nombre de livre par page :</label>
                        <select onchange="document.getElementById('formTri').submit()" name="nbLivreParPage" id="nbLivreParPage" class="">
                            <option value="9" @if($intNbLivreParPage === '9') selected @endIf>9 livres par page</option>
                            <option value="15" @if($intNbLivreParPage === '15') selected @endIf>15 livres par page</option>
                            <option value="30" @if($intNbLivreParPage === '30') selected @endIf>30 livres par page</option>
                            <option value="tous" @if($intNbLivreParPage !== '9' && $intNbLivreParPage !== '15' &&  $intNbLivreParPage !== '30') selected @endIf>tout livres par page</option>
                        </select>
                    </p>
                    <p class="formulaire__champEnveloppe"><strong>{{$intNbLivreParPage}} résultats affichés</strong> de {{$nombreLivre}}</p>
                    <p class="formulaire__champEnveloppe formulaire__champEnveloppeRangee">
                        <label class="screen-reader-only" for="trierPar">Trier par : </label>
                        <select onchange="document.getElementById('formTri').submit()" name="trierPar" id="trierPar" class="">
                            <option value="categories.nomA" @if($trierPar === 'categories.nomA') selected @endIf>Categories A-Z</option>
                            <option value="categories.nomD" @if($trierPar === 'categories.nomD') selected @endIf>Categories Z-A</option>
                            <option value="livres.titreA" @if($trierPar === 'livres.titreA') selected @endIf>Livres A-Z</option>
                            <option value="livres.titreD" @if($trierPar === 'livres.titreD') selected @endIf>Livres Z-A</option>
                            <option value="auteurs.nomA" @if($trierPar === 'auteurs.nomA') selected @endIf>Auteurs A-Z</option>
                            <option value="auteurs.nomD" @if($trierPar === 'auteurs.nomD') selected @endIf>Auteurs Z-A</option>
                            <option value="statutD" @if($trierPar === 'statutD') selected @endIf>Plus récents au plus anciens</option>
                            <option value="statutA" @if($trierPar === 'statutA') selected @endIf>Plus anciens au plus récents</option>
                        </select>
                    </p>
                </fieldset>
                <input style="display: none" class="" type="submit" id="livresTrie">
            </form>
        </section>
        <section>
            <h1 class="livres__titre">Livres</h1>
            <!-- un titre display none? -->
            <div class="livre conteneurGrille">
                <!-- Foreach Nouveautés -->
                {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
                @foreach($livres as $livre)
                    <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                        <article class="livre__article">
                            <div class="livre__conteneurVignette">
                                <picture class="livre__picture">
                                    <!-- Image pour mobile, tablette et poste de table -->
                                    <img class="livre__image etiquette"
                                         src="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg"
                                         srcset="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg 1x, ../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-940.jpg 2x"
                                         alt="{{$livre->getTitre()}}">
                                </picture>
                                @if ($livre->getStatut() === 2)
                                    <p class="livre__etiquette">Nouveauté</p>
                                @elseif($livre->getStatut() === 3)
                                    <p class="livre__etiquette">À paraitre</p>
                                @endif
                            </div>
                            <div class="livre__conteneurTitreInfos">
                                <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                                <ul class="livre__listeInfos">
                                    @foreach($livre->getAuteurAssocie() as $auteur)
                                        <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                                    @endforeach
                                    <li class="livre__item livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                                </ul>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>
        </section>
        @if($intNbLivreParPage === '9' || $intNbLivreParPage === '15' ||  $intNbLivreParPage === '30')
            <section>
                @include('livres.fragments.pagination')
            </section>
        @endif
    </section>
@endsection

