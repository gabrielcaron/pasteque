@extends('gabarit')

@section('classeMain')
    class="formulaireCommande"
@endsection

@section('contenu')
    <section>
        <nav>
            <ol>
                <li><a id="etapeNavLivraison">1. Livraison</a></li>
                <li><a id="etapeNavFacturation">2. Facturation</a></li>
                <li><a id="etapeNavValidation">3. Validation</a></li>
            </ol>
        </nav>
        <form id="form" name="inscription" class="form" method="POST" action="#">
            <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1"></div>
            <fieldset id="etapeLivraison" class="form__etape" data-etape="identification" tabindex="-1" style="display: none"
                      aria-labelledby="titreIdentification">
                @include('paniers.fragments.livraison')
            </fieldset>
            <fieldset id="etapeFacturation" class="form__etape" data-etape="informations-connexion" tabindex="-1" style="display: none"
                      aria-labelledby="titreInfoConnexion">
                @include('paniers.fragments.facturationMemeAdresse')

            </fieldset>
            <fieldset id="etapeValidation" class="form__etape" data-etape="informations-connexion" tabindex="-1" style="display: none"
                      aria-labelledby="titreInfoConnexion">
                @include('paniers.fragments.validation')
            </fieldset>
            <div class="form-wrap">
                <button type="submit">S'inscrire</button>
                <button type="reset">Réinitialiser</button>
            </div>
        </form>
    </section>
@endsection