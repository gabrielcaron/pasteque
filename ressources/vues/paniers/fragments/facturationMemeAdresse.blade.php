<h2 id="titreFacturation" class="form__titre-etape">
    2. Facturation
</h2>
<section class="identification">
    @include('paniers.fragments.identification')
</section>
<h2>Informations de paiement</h2>
<section class="adressePaiement">
    <h3>Adresse de Facturation</h3>
    @component('paniers.fragments.adresseRecap')
        @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
        @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
        @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceId()}} @endif @endslot
        @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
    @endcomponent
    @component('paniers.fragments.adresse')
        @slot('livraisonOuFacturation') facturation @endslot
        @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
        @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
        @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceId()}} @endif @endslot
        @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
    @endcomponent
</section>
<section class="modePaiement">
<h3>Mode de paiement</h3>
    <h4>Cartes de crédits acceptées</h4>
    Ajouter les logos des cartes

    <div id="champNomTitulaire" class="champ champ--lg">
        <div class="champ__boite">
            <label for="nomTitulaire" class="champ__etiquette">Nom du titulaire</label>
            <input class="champ__input" id="nomTitulaire" name="nomTitulaire" type="text"
                   autocomplete="nomTitulaire" required="required" aria-labelledby="messagesNomTitulaire"
                   pattern="^[a-zA-Z-_]{2,}$" min="2" />
        </div>
        <div id="messagesNomTitulaire" class="champ__messages">
            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
        </div>
    </div>
    <div id="champNumeroCarte" class="champ champ--lg">
        <div class="champ__boite">
            <label for="numeroCarte" class="champ__etiquette">Numéro de la carte</label>
            <input class="champ__input" id="numeroCarte" name="numeroCarte" type="text"
                   autocomplete="numeroCarte" required="required" aria-labelledby="messagesNumeroCarte"
                   pattern="^[a-zA-Z-_]{2,}$" min="2" />
        </div>
        <div id="messagesNumeroCarte" class="champ__messages">
            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
        </div>
    </div>
    <div class="formulaire__champ">
        <label  for="expmonth1">Date d'expiration: *</label>
        <div class="formulaire__champInputFlex">
            <input class="formulaire__champInput formulaire__champInputExp" id="expmonth1" name="exp" type="text" />
            <input class="formulaire__champInput formulaire__champInputExp" id="expmonth2" name="exp" type="text" />
        </div>
    </div>
    <div class="formulaire__champ">
        <label for="cvv">Code de sécurité</label>
        <div class="formulaire__champInputFlex">
            <input class="formulaire__champInput formulaire__champInputExp" id="cvv" name="cvv" placeholder="352" type="text"/>
        </div>
    </div>
</section>

<div class="form-wrap">
    <button id="btnContinuerEtape1" type="button" class="btnCommander">Continuer</button>
</div>

