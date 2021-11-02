@extends('gabarit')

@section('contenu')
    <div class="conteneur">
        <section class="enveloppe">
            <section class="filAriane">
                <span><a href="index.php">Accueil</a> / Livres</span>
            </section>
            <h1 class="enveloppe__">Livres</h1>

            <button class="enveloppe__">Filtres</button>
            <form id="formTri" class="enveloppe__Tris" action="index.php?controleur=livre&action=index" method="POST">
                    <ul class="enveloppe__liste">
                        @foreach($categories as $categorie)
                            <div>
                                @if(array_search($categorie->getId(), $categoriesSelectionner))
                                    <input value="{{$categorie->getId()}}" type="checkbox" id="enveloppe__liste--input--{{$categorie->getId()}}" name="categoriesSelectionner{{$categorie->getId()}}" checked>
                                    <label for="enveloppe__liste--input--{{$categorie->getId()}}" id="enveloppe__liste--label--{{$categorie->getId()}}">{{$categorie->getNom()}}</label>
                                @else
                                    <input value="{{$categorie->getId()}}" type="checkbox" id="enveloppe__liste--input--{{$categorie->getId()}}" name="categoriesSelectionner{{$categorie->getId()}}">
                                    <label for="enveloppe__liste--input--{{$categorie->getId()}}" id="enveloppe__liste--label--{{$categorie->getId()}}">{{$categorie->getNom()}}</label>
                                @endif
                            </div>
                        @endforeach
                    </ul>
                <input id="id_page" value="{{$numeroPage}}" type="hidden" name="id_page">
            <!-- Vérification quel est actif -->
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
                    <label class="" for="nbLivreParPage">Nombre de livre par page : </label>
                    <select name="nbLivreParPage" id="nbLivreParPage" class="">
                        @switch($intNbLivreParPage)
                            @case(9)
                                <option value="9" selected>9 livres par page</option>
                                <option value="15">15 livres par page</option>
                                <option value="30">30 livres par page</option>
                                <option value="tous">tout livres par page</option>
                                @break

                            @case(15)
                                <option value="9">9 livres par page</option>
                                <option value="15" selected>15 livres par page</option>
                                <option value="30">30 livres par page</option>
                                <option value="tous">tout livres par page</option>
                                @break

                            @case(30)
                                <option value="9">9 livres par page</option>
                                <option value="15">15 livres par page</option>
                                <option value="30" selected>30 livres par page</option>
                                <option value="tous">tout livres par page</option>
                                @break

                            @default
                                <option value="9">9 livres par page</option>
                                <option value="15">15 livres par page</option>
                                <option value="30">30 livres par page</option>
                                <option value="tous" selected>tout livres par page</option>
                        @endswitch
                    </select>
                </p>
                <p><strong>X résultats affichés</strong> de {{$nombreLivre}} résultats</p>
                <p class="formulaire__champEnveloppe">
                    <label class="" for="trierPar">Trier par : </label>
                    <select name="trierPar" id="trierPar" class="">
                        @switch($trierPar)
                            @case('categories.nomA')
                                <option value="categories.nomA" selected>Categories A-Z</option>
                                <option value="categories.nomD">Categories Z-A</option>
                                <option value="livres.titreA">Livres A-Z</option>
                                <option value="livres.titreD">Livres Z-A</option>
                                <option value="auteurs.nomA">Auteurs A-Z</option>
                                <option value="auteurs.nomD">Auteurs Z-A</option>
                                <option value="statutA">Plus récents au plus anciens</option>
                                <option value="statutD">Plus anciens au plus récents</option>
                            @break

                            @case('categories.nomD')
                                <option value="categories.nomA">Categories A-Z</option>
                                <option value="categories.nomD" selected>Categories Z-A</option>
                                <option value="livres.titreA">Livres A-Z</option>
                                <option value="livres.titreD">Livres Z-A</option>
                                <option value="auteurs.nomA">Auteurs A-Z</option>
                                <option value="auteurs.nomD">Auteurs Z-A</option>
                                <option value="statutA">Plus récents au plus anciens</option>
                                <option value="statutD">Plus anciens au plus récents</option>
                            @break

                            @case('livres.titreA')
                                <option value="categories.nomA">Categories A-Z</option>
                                <option value="categories.nomD">Categories Z-A</option>
                                <option value="livres.titreA" selected>Livres A-Z</option>
                                <option value="livres.titreD">Livres Z-A</option>
                                <option value="auteurs.nomA">Auteurs A-Z</option>
                                <option value="auteurs.nomD">Auteurs Z-A</option>
                                <option value="statutA">Plus récents au plus anciens</option>
                                <option value="statutD">Plus anciens au plus récents</option>
                            @break

                            @case('livres.titreD')
                                <option value="categories.nomA">Categories A-Z</option>
                                <option value="categories.nomD">Categories Z-A</option>
                                <option value="livres.titreA">Livres A-Z</option>
                                <option value="livres.titreD" selected>Livres Z-A</option>
                                <option value="auteurs.nomA">Auteurs A-Z</option>
                                <option value="auteurs.nomD">Auteurs Z-A</option>
                                <option value="statutA">Plus récents au plus anciens</option>
                                <option value="statutD">Plus anciens au plus récents</option>
                            @break

                            @case('auteurs.nomA')
                                <option value="categories.nomA">Categories A-Z</option>
                                <option value="categories.nomD">Categories Z-A</option>
                                <option value="livres.titreA">Livres A-Z</option>
                                <option value="livres.titreD">Livres Z-A</option>
                                <option value="auteurs.nomA" selected>Auteurs A-Z</option>
                                <option value="auteurs.nomD">Auteurs Z-A</option>
                                <option value="statutA">Plus récents au plus anciens</option>
                                <option value="statutD">Plus anciens au plus récents</option>
                            @break

                            @case('auteurs.nomD')
                                <option value="categories.nomA">Categories A-Z</option>
                                <option value="categories.nomD">Categories Z-A</option>
                                <option value="livres.titreA">Livres A-Z</option>
                                <option value="livres.titreD">Livres Z-A</option>
                                <option value="auteurs.nomA">Auteurs A-Z</option>
                                <option value="auteurs.nomD" selected>Auteurs Z-A</option>
                                <option value="statutA">Plus récents au plus anciens</option>
                                <option value="statutD">Plus anciens au plus récents</option>
                            @break

                            @case('statutA')
                                <option value="categories.nomA">Categories A-Z</option>
                                <option value="categories.nomD">Categories Z-A</option>
                                <option value="livres.titreA">Livres A-Z</option>
                                <option value="livres.titreD">Livres Z-A</option>
                                <option value="auteurs.nomA">Auteurs A-Z</option>
                                <option value="auteurs.nomD">Auteurs Z-A</option>
                                <option value="statutA" selected>Plus récents au plus anciens</option>
                                <option value="statutD">Plus anciens au plus récents</option>
                            @break

                            @default
                                <option value="categories.nomA">Categories A-Z</option>
                                <option value="categories.nomD">Categories Z-A</option>
                                <option value="livres.titreA">Livres A-Z</option>
                                <option value="livres.titreD">Livres Z-A</option>
                                <option value="auteurs.nomA">Auteurs A-Z</option>
                                <option value="auteurs.nomD">Auteurs Z-A</option>
                                <option value="statutA">Plus récents au plus anciens</option>
                                <option value="statutD" selected>Plus anciens au plus récents</option>

                        @endswitch

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
                    @if($livre->getStatut() === 3)
                        <p class="livres__nouveaute">A parraitre</p>
                    @elseif($livre->getStatut() === 2)
                        <p class="livres__nouveaute">Nouveauté</p>
                    @endif
                    <img alt="" src="https://via.placeholder.com/150">
                    <ul class="">
                        @foreach($livre->getAuteurAssocie() as $auteur)
                        <li class="livres__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                        @endforeach
                        <li class="livres__categorie">{{$livre->getCategorieAssocie()->getNom()}}</li>
                    </ul>
                </article>
            </a>
            @endforeach
        </section>
        @include('livres.fragments.pagination')
    </div>
@endsection

