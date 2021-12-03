@extends('gabarit--transaction')

@section('classeBody')
    stepleft
@endsection

@section('classeMain')
    class="formulaireCommande"
@endsection

@section('contenu')
    <form id="form" name="inscription" class="formulaireCommande__conteneurGrille" method="POST"
          action="index.php?controleur=stepLeft&action=inserer" novalidate>
        <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1"></div>
        <input id="compte_id" name="compte_id" type="hidden" value="@if($compte !== null){{$compte->getId()}}@endif"/>
        <input id="commande_id" name="commande_id" type="hidden"
               value="@if($commande !== null){{$commande->getId()}}@endif"/>
        <fieldset id="etapeLivraison" class="formulaireCommande__etape" data-etape="identification" tabindex="-1"
                  aria-labelledby="titreIdentification">
            <h2 id="titreLivraison" class="formulaireCommande__titreEtape">
                1. Livrer
            </h2>
            @include('paniers.fragments.livraison')
        </fieldset>
        <fieldset id="etapeFacturation" class="formulaireCommande__etape" data-etape="informations-connexion" tabindex="-1"
                  aria-labelledby="titreInfoConnexion">
            <h2 id="titreFacturation" class="formulaireCommande__titreEtape">
                2. Payer
            </h2>
            @include('paniers.fragments.facturationMemeAdresse')
        </fieldset>
        <fieldset id="etapeValidation" class="formulaireCommande__etape" data-etape="informations-connexion" tabindex="-1"
                  aria-labelledby="titreInfoConnexion">
            <h2 id="titreFacturation" class="formulaireCommande__titreEtape">
                3. Valider
            </h2>
            @include('paniers.fragments.validation')
        </fieldset>
    </form>
@endsection
