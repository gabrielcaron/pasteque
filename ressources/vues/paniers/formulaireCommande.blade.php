<form id="form" name="inscription" class="form" method="POST" action="#">
    <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1" role="alert"></div>
    <fieldset class="form__etape" data-etape="identification" tabindex="-1"
              aria-labelledby="titreIdentification">
        @include('paniers.fragments.livraison')
    </fieldset>
    <fieldset class="form__etape" data-etape="informations-connexion" tabindex="-1"
              aria-labelledby="titreInfoConnexion">
        @include('paniers.fragments.facturationAdresseDifferente')
        @include('paniers.fragments.facturationMemeAdresse')

    </fieldset>
    <fieldset class="form__etape" data-etape="informations-connexion" tabindex="-1"
              aria-labelledby="titreInfoConnexion">
        @include('paniers.fragments.validation')
    </fieldset>
    <div class="form-wrap">
        <button type="submit">S'inscrire</button>
        <button type="reset">Réinitialiser</button>
    </div>
</form>