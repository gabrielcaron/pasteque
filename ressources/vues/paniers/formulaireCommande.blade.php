@extends('gabarit')

@section('classeMain')
    class="formulaireCommande"
@endsection

@section('contenu')


    <section class="stepleft">
        {{--<nav>
            <ol>
                <li><a id="etapeNavLivraison">1. Livraison</a></li>
                <li><a id="etapeNavFacturation">2. Facturation</a></li>
                <li><a id="etapeNavValidation">3. Validation</a></li>
            </ol>
        </nav>--}}
        <section>
            <form id="form" name="inscription" class="form" method="POST" action="index.php?controleur=stepLeft&action=inserer" novalidate>
                <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1"></div>
                <input id="compte_id" name="compte_id" type="hidden" value="@if($compte !== null){{$compte->getId()}}@endif"/>
                <input id="commande_id" name="commande_id" type="hidden" value="@if($commande !== null){{$commande->getId()}}@endif"/>
                <fieldset id="etapeLivraison" class="stepleft__etape" data-etape="identification" tabindex="-1"
                          aria-labelledby="titreIdentification">
                    <h2 id="titreLivraison" class="stepleft__titreEtape">
                        1. Livrer
                    </h2>
                    @include('paniers.fragments.livraison')
                </fieldset>
                <fieldset id="etapeFacturation" class="stepleft__etape" data-etape="informations-connexion" tabindex="-1"
                          aria-labelledby="titreInfoConnexion">
                    <h2 id="titreFacturation" class="stepleft__titreEtape">
                        2. Payer
                    </h2>
                    @include('paniers.fragments.facturationMemeAdresse')
                </fieldset>
                <fieldset id="etapeValidation" class="stepleft__etape" data-etape="informations-connexion" tabindex="-1"
                          aria-labelledby="titreInfoConnexion">
                    <h2 id="titreFacturation" class="stepleft__titreEtape">
                        3. Valider
                    </h2>
                    @include('paniers.fragments.validation')
                </fieldset>
            </form>
        </section>

    </section>
@endsection