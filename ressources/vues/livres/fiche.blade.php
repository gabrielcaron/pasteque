@extends('gabarit')

@section('classeBody')
    livreFiche
@endsection

@section('classeMain')
    class="contenu"
@endsection

@section('contenu')
    <div class="filAriane">
        <span><a href="index.php">Accueil</a> / <a href="index.php?controleur=livre&action=index">Livres</a> / {{$livre->getTitre()}}</span>
    </div>
    <section class="ficheLivre">
        <div class="ficheLivre__conteneurVignette">
            <div class="ficheLivre__productImage">
                @if(file_exists("liaisons/images/livres/{$livre->getIsbnPapier()}-940.jpg"))
                    <img class="ficheLivre__active"
                         src="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-940.jpg" alt="">
                @else
                    <img class="livre__image etiquette"
                         src="../public/liaisons/images/livres/img-livre-sans-vignette-1140.png"
                         srcset="../public/liaisons/images/livres/img-livre-sans-vignette-570.png 1x"
                         alt="">
                @endif

                @if($livre->getStatut()===3)
                    <p class="ficheLivre__statut">À paraitre</p>
                @elseif($livre->getStatut()===2)
                    <p class="ficheLivre__statut">Nouveauté</p>
                @else
                    <p class="ficheLivre__statut"></p>
                @endif
            </div>
            <ul class="ficheLivre__imageList">
                @if(file_exists("liaisons/images/extraits/{$livre->getIsbnPapier()}_002-940.jpg"))
                    <li class="ficheLivre__imageItem"><img class="ficheLivre__active"
                                                           src="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-940.jpg">
                    </li>
                    @for($i=1;$i < 4; $i++)
                        @if(file_exists("liaisons/images/extraits/{$livre->getIsbnPapier()}_00{$i}-940.jpg"))
                            <li class="ficheLivre__imageItem"><img
                                        src="liaisons/images/extraits/{{$livre->getIsbnPapier()}}_00{{$i}}-940.jpg" alt="">
                            </li>
                        @endif
                    @endfor
                @endif
            </ul>
        </div>
        <div class="ficheLivre__conteneurInfos">
            <div class="ficheLivre__flexNomPrix">
                <h1 class="ficheLivre__title">{{$livre->getTitre()}}</h1>
            </div>
            @foreach($livre->getAuteurAssocie() as $auteur)
                <a href="index.php?controleur=auteur&action=fiche&id={{$auteur->getId()}}">
                    <span class="ficheLivre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</span>
                </a>
                <br>
            @endforeach
            <br><span class="ficheLivre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</span>
            <br><br>
            <p class="ficheLivre__argument">{{$livre->getArgumentsCommerciaux()}}</p>
            <div class="tabSection">
                <div class="tabSection__menu">
                    <button class="tabSection__menuLink active" data-content="first">
                        <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="tabSection__menuLinkPath"
                                  d="M10.5 0H2.5C1.4 0 0.51 0.9 0.51 2L0.5 18C0.5 19.1 1.39 20 2.49 20H14.5C15.6 20 16.5 19.1 16.5 18V6L10.5 0ZM12.5 16H4.5V14H12.5V16ZM12.5 12H4.5V10H12.5V12ZM9.5 7V1.5L15 7H9.5Z"
                                  fill="#595959"/>
                        </svg>
                        <span data-title="first">Résumé</span>
                    </button>
                    @if($livre->getReconnaissanceAssocie()!== [])
                        <button class="tabSection__menuLink" data-content="second">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path class="tabSection__menuLinkPath"
                                      d="M16.5 2H14.5V0H4.5V2H2.5C1.4 2 0.5 2.9 0.5 4V5C0.5 7.55 2.42 9.63 4.89 9.94C5.52 11.44 6.87 12.57 8.5 12.9V16H4.5V18H14.5V16H10.5V12.9C12.13 12.57 13.48 11.44 14.11 9.94C16.58 9.63 18.5 7.55 18.5 5V4C18.5 2.9 17.6 2 16.5 2ZM2.5 5V4H4.5V7.82C3.34 7.4 2.5 6.3 2.5 5ZM16.5 5C16.5 6.3 15.66 7.4 14.5 7.82V4H16.5V5Z"
                                      fill="#595959"/>
                            </svg>
                            <span data-title="second">Prix obtenus</span>
                        </button>
                    @endif
                </div>
                <div class="tabSection__bar">
                    <div class="tabSection__barContent active" id="first">
                        <div class="tabSection__texts">
                            <p class="tabSection__paragraph">
                                {{$livre->getLeLivre()}}
                            </p>
                        </div>
                    </div>

                    @if($livre->getReconnaissanceAssocie()!== [])
                        <div class="tabSection__barContent" id="second">
                            <div class="tabSection__texts">
                                @foreach($livre->getReconnaissanceAssocie() as $reconnaissanceLivre)
                                    <p>{{$reconnaissanceLivre->getReconnaissance()}}</p>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="ficheLivre__format">
                <form id="formulaireAjoutPanier" class="formulaire enveloppe__Tris" action="../public/index.php?controleur=article&action=inserer" method="POST">
                    <div class="formulaire__groupeChamps tuiles">
                        <ul class="formulaire__liste">
                            @if($livre->getIsbnPapier()!== '')
                                <li class="bloc">
                                    <input class="radio screen-reader-only" id="papier" value="papier" name="version"
                                           type="radio" checked>
                                    <label class="libelle bouton" for="papier">Version papier</label>
                                </li>
                            @endif
                            @if($livre->getIsbnEpub()!== '')
                                <li class="bloc">
                                    <input class="radio screen-reader-only" id="numerique" value="numerique"
                                           name="version"
                                           type="radio">
                                    <label class="libelle bouton" for="numerique">Version numérique</label>
                                </li>
                            @endif
                            @if($livre->getIsbnPdf()!== '')
                                <li class="bloc">
                                    <input class="radio screen-reader-only" id="pdf" value="pdf" name="version"
                                           type="radio">
                                    <label class="libelle bouton" for="pdf">Version PDF</label>
                                </li>
                            @endif
                        </ul>
                        <div class="ficheLivre__ajoutQuantite">
                            <button class="minus-btn btnQuantite" type="button" name="button"
                                    onclick="document.getElementById('quantite_panier{{$livre->getId()}}').value = parseInt(document.getElementById('quantite_panier{{$livre->getId()}}').value) - 1">
                                -
                            </button>
                            <label style="display: none" for="quantite_panier{{$livre->getId()}}">Quantité :</label>
                            <input id="quantite_panier{{$livre->getId()}}" class="ficheLivre__ajoutInput" type="text"
                                   name="quantite" value="1">
                            <button class="plus-btn btnQuantite" type="button" name="button"
                                    onclick="document.getElementById('quantite_panier{{$livre->getId()}}').value = parseInt(document.getElementById('quantite_panier{{$livre->getId()}}').value) + 1">
                                +
                            </button>
                        </div>
                        <input id="produit_id" type="text" name="produit_id" value="{{$livre->getId()}}" hidden>
                        <input id="panier_id" type="text" name="panier_id" value="{{$panier->getId()}}" hidden>
                        <input id="quantite" type="text" name="quantite" value="1" hidden>
                    </div>
                    <button id="boutonAjouterPanierPHP" class="bouton action ajoutPanier" type="submit">Ajouter au panier</button>
                </form>
{{--                <a id="boutonAjouterPanier" class="bouton action ajoutPanier" href="#panier">Ajouter au panier en JS</a>--}}
            </div>
        </div>
    </section>
    <section class="informations">
        <h2 class="informations__titre">Informations</h2>
        <table class="informations__table">
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Titre</td>
                <td class="informations__tableColumn">{{$livre->getTitre()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Auteur</td>
                <td class="informations__tableColumn">@foreach($livre->getAuteurAssocie() as $auteur)<a
                            href="index.php?controleur=auteur&action=fiche&id={{$auteur->getId()}}">
                        <span class="livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</span><br>
                    </a>@endforeach</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Éditeur</td>
                <td class="informations__tableColumn">La Pastèque</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Prix canadien</td>
                <td class="informations__tableColumn">{{$livre->getPrixCan()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Prix européen</td>
                <td class="informations__tableColumn">{{$livre->getPrixEuro()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Catégorie</td>
                <td class="informations__tableColumn">{{$livre->getCategorieAssocie()->getNom()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Date de parution au Québec</td>
                <td class="informations__tableColumn">{{$livre->getDateParutionQuebec()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Format</td>
                <td class="informations__tableColumn">{{$livre->getFormat()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Langue</td>
                <td class="informations__tableColumn">Français</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Nombre de pages</td>
                <td class="informations__tableColumn">{{$livre->getPagination()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">ISBN</td>
                <td class="informations__tableColumn">{{$livre->getIsbnPapier()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">ISBN PDF</td>
                <td class="informations__tableColumn">{{$livre->getIsbnPdf()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">ISBN Epub</td>
                <td class="informations__tableColumn">{{$livre->getIsbnEpub()}}</td>
            </tr>
        </table>
    </section>
@endsection

@section('scripts')
    @include('livres.fragments.panier')
    <script src="liaisons/js/productPage.js" type="text/javascript"></script>
    <script src="../public/liaisons/js/ajoutPanier.js" type="text/javascript"></script>
@endsection


