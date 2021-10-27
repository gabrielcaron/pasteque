@extends('gabarit')

@section('contenu')
    <section class="filAriane">
        <span>Accueil / Livres / {{$livre->getTitre()}}</span>
    </section>
    <section class="livre">
        <div class="livre__conteneur1">
            <img class="livre__conteneurImg" src="liaisons/images/9782897770013.jpg" width="50%">
            @if($livre->getStatut()===3)
                <p class="livre__auteur">À paraitre</p>
            @elseif($livre->getStatut()===2)
                <p class="livre__auteur">Nouveauté</p>
            @endif
        </div>
        <div class="livre__conteneur2">
            <h1 class="livre__title">{{$livre->getTitre()}}</h1>
            <p class="livre__auteur">{{$livre->getAuteurAssocie()->getNom()}} {{$livre->getAuteurAssocie()->getPrenom()}}</p>
            <h2 class="livre__prixCan">{{$livre->getPrixCan()}}</h2>
            <span class="livre__prixEuro">{{$livre->getPrixEuro()}}</span>

            <div class="livre__ajout">
                <div class="livre__ajoutQuantite">
                    <button class="plus-btn" type="button" name="button">+</button>
                    <input type="text" name="name" value="1">
                    <button class="minus-btn" type="button" name="button">-</button>
                </div>
                <div class="livers__ajoutPanier">
                    <button class="livre__ajoutPanierBtn">
                        AJOUTER AU PANIER
                    </button>
                </div>
            </div>
            <nav class="livre__details">
                <ul class="livre__detailsListe">
                    <li class="livre__detailsListeItem">Résumé</li>
                    {{--<li class="livre__detailsListeItem">Critiques</li>--}}
                    <li class="livre__detailsListeItem">Reconnaissance</li>
                </ul>
            </nav>
            <div class="livre__resume">
                <p class="livre__resumeTexte">
                    {{$livre->getLeLivre()}}
                </p>
            </div>
           {{-- <div class="livre__critiques">
                <p class="livre__critiquesTexte">
                    Nicolas Thibault<br>
                    Très bon livre! Super intéressant.
                    <br><br>
                    Gabriel Caron<br>
                    Ce livre est bon, mais sans plus.
                </p>
            </div>--}}
            @foreach($livre->getReconnaissanceAssocie() as $reconnaissanceLivre)
            <div class="livre__reconnaissance">
                <p class="livre__reconnaissanceTexte">
                    {{$reconnaissanceLivre->getReconnaissance()}}
                </p>
            </div>
            @endforeach
        </div>
    </section>
    <section class="informations">
        <h2 class="informations__titre">Informations</h2>
        <table class="informations__table">
            <tr class="informations__tableRow">
                <th class="informations__tableColumn">Titre</th>
                <th class="informations__tableColumn">{{$livre->getTitre()}}</th>
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
        </table>
    </section>
@endsection

