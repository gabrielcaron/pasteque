@extends('gabarit')

@section('contenu')
    <div class="indexLivres">
        <section class="enveloppe">
            <section class="filAriane">
                <span><a href="index.php">Accueil</a> / Livres</span>
            </section>
            <h1 class="enveloppe__">Livres</h1>
            <button class="enveloppe__">Filtres</button>
            <form id="formTri" class="enveloppe__Tris" action="index.php?controleur=livre&action=index" method="POST">
                <input id="id_page" value="0" type="hidden" name="id_page">
                <ul class="enveloppe__liste">
                    @foreach($categories as $categorie)
                        <div>
                            <input value="{{$categorie->getId()}}" type="checkbox" id="enveloppe__liste--input--{{$categorie->getId()}}" name="categoriesSelectionner{{$categorie->getId()}}" @if(array_search($categorie->getId(), $categoriesSelectionner)) checked @endIf>
                            <label for="enveloppe__liste--input--{{$categorie->getId()}}" id="enveloppe__liste--label--{{$categorie->getId()}}">{{$categorie->getNom()}}</label>
                        </div>
                    @endforeach
                </ul>
                <p class="formulaire__champEnveloppe">
                    <input id="vignette" value="vignette" name="choixVue" type="radio" @if($choixVue === 'vignette') checked @endIf>
                    <label for="vignette">Changer pour une vue en liste</label>
                    <input id="liste" value="liste" name="choixVue" type="radio" @if($choixVue === 'liste') checked @endIf>
                    <label for="liste">Changer pour une vue en liste</label>
                </p>
                <p class="formulaire__champEnveloppe">
                    <label class="" for="nbLivreParPage">Nombre de livre par page : </label>
                    <select name="nbLivreParPage" id="nbLivreParPage" class="">
                        <option value="9" @if($intNbLivreParPage === '9') selected @endIf>9 livres par page</option>
                        <option value="15" @if($intNbLivreParPage === '15') selected @endIf>15 livres par page</option>
                        <option value="30" @if($intNbLivreParPage === '30') selected @endIf>30 livres par page</option>
                        <option value="tous" @if($intNbLivreParPage !== '9' && $intNbLivreParPage !== '15' &&  $intNbLivreParPage !== '30') selected @endIf>tout livres par page</option>
                    </select>
                </p>
                <p><strong>{{$intNbLivreParPage}} résultats affichés</strong> de {{$nombreLivre}} résultats</p>
                <p class="formulaire__champEnveloppe">
                    <label class="" for="trierPar">Trier par : </label>
                    <select name="trierPar" id="trierPar" class="">
                        <option value="categories.nomA" @if($trierPar === 'categories.nomA') selected @endIf>Categories A-Z</option>
                        <option value="categories.nomD" @if($trierPar === 'categories.nomD') selected @endIf>Categories Z-A</option>
                        <option value="livres.titreA" @if($trierPar === 'livres.titreA') selected @endIf>Livres A-Z</option>
                        <option value="livres.titreD" @if($trierPar === 'livres.titreD') selected @endIf>Livres Z-A</option>
                        <option value="auteurs.nomA" @if($trierPar === 'auteurs.nomA') selected @endIf>Auteurs A-Z</option>
                        <option value="auteurs.nomD" @if($trierPar === 'auteurs.nomD') selected @endIf>Auteurs Z-A</option>
                        <option value="statutA" @if($trierPar === 'statutA') selected @endIf>Plus récents au plus anciens</option>
                        <option value="statutD" @if($trierPar === 'statutD') selected @endIf>Plus anciens au plus récents</option>
                    </select>
                </p>
                <input class="" type="submit" id="livresTrie">
            </form>
        </section>
        <section class="index livre">
            <!-- un titre display none? -->
            <div class="nouveautes__conteneurGrille">
                <!-- Foreach Nouveautés -->
                {{--            Faire un modulo, s'il se divise par 3, c'est une rangée--}}
                @foreach($livres as $livre)
                    <a class="livre__lien" href="index.php?controleur=livre&action=fiche&id={{$livre->getId()}}">
                        <article class="livre__article">
                            <div class="livre__conteneurVignette">
                                <img @if ($livre->getStatut() > 1)
                                     class="livre__image etiquette"
                                     @else
                                     class="livre__image"
                                     @endif src="https://via.placeholder.com/460x500">

                                @if ($livre->getStatut() === 2)
                                    <p class="livre__etiquette">Nouveauté</p>
                                @elseif($livre->getStatut() === 3)
                                    <p class="livre__etiquette">À paraitre</p>
                                @endif
                            </div>
                            <h3 class="livre__titre">{{$livre->getTitre()}}</h3>
                            <ul class="livre__listeInfos">
                                @foreach($livre->getAuteurAssocie() as $auteur)
                                    <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                                @endforeach
                                <li class="livre__item livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                            </ul>
                        </article>
                    </a>
                @endforeach
            </div>
        </section>
        @include('livres.fragments.pagination')
    </div>
@endsection
