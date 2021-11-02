@extends('gabarit')

@section('contenu')
    <section class="filAriane">
        <span><a href="index.php">Accueil</a> / <a href="index.php?controleur=livre&action=index">Livres</a> / {{$livre->getTitre()}}</span>
    </section>
    <section class="livre">
        <div class="livre__conteneur1">
            <img class="livre__conteneurImg" src="liaisons/images/9782897770013.jpg" width="100%">
            @if($livre->getStatut()===3)
                <p class="livre__statut">À paraitre</p>
            @elseif($livre->getStatut()===2)
                <p class="livre__statut">Nouveauté</p>
            @endif
        </div>
        <div class="livre__conteneur2">
            <div class="livre__flexNomPrix">
                <h1 class="livre__title">{{$livre->getTitre()}}</h1>
                <h3 class="livre__prixCan">{{$livre->getPrixCan()}}$</h3>
            </div>
            <a href="index.php?controleur=auteur&action=fiche&id={{$livre->getAuteurAssocie()->getId()}}"><span class="livre__auteur">{{$livre->getAuteurAssocie()->getNom()}} {{$livre->getAuteurAssocie()->getPrenom()}}</span></a>
            <br><br><span class="livre__categorie">{{$livre->getCategorieAssocie()->getNom()}}</span>

            <div class="livre__ajout">
                <div class="livre__ajoutQuantite">
                    <button class="minus-btn btnQuantite" type="button" name="button">-</button>
                    <input class="livre__ajoutInput" type="text" name="name" value="1">
                    <button class="plus-btn btnQuantite" type="button" name="button">+</button>

                </div>
                <div class="livre__ajoutPanier">
                    <button class="livre__ajoutPanierBtn"><span class="livre__panierImg"></span>
                        AJOUTER AU PANIER
                    </button>
                </div>
            </div>


            <div class="tabSection">
                <div class="tabSection__menu">
                    <button class="tabSection__menuLink active" data-content="first">
                        <span data-title="first">Résumé</span>
                    </button>
                    <button class="tabSection__menuLink" data-content="second">
                        <span data-title="second">Reconnaissances</span>
                    </button>
                </div>
                <div class="tabSection__bar">
                    <div class="tabSection__barContent active" id="first">
                        <div class="tabSection__texts">
                            <p class="tabSection__paragraph">
                                {{$livre->getLeLivre()}}
                            </p>
                        </div>
                    </div>
                    <div class="tabSection__barContent" id="second">
                        <div class="tabSection__texts">
                            @foreach($livre->getReconnaissanceAssocie() as $reconnaissanceLivre)
                                {{$reconnaissanceLivre->getReconnaissance()}}
                            @endforeach
                        </div>
                    </div>
                </div>
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
                <td class="informations__tableColumn">{{$livre->getAuteurAssocie()->getPrenom()}} {{$livre->getAuteurAssocie()->getNom()}}</td>
            </tr>
            <tr class="informations__tableRow">
                <td class="informations__tableColumn">Éditeur</td>
                <td class="informations__tableColumn">La pastèque</td>
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
                <td class="informations__tableColumn">Nombre de page</td>
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

