<h2 id="titreFacturation" class="form__titre-etape">
    2. Facturation
</h2>
<section class="identification">
    @include('paniers.fragments.identification')
</section>
<h2>Informations de paiement</h2>
<section class="adressePaiement">
    <h3>Adresse de Facturation</h3>
    <section id="sectionRecapAdresseFacturation" style="display: none">
        @component('paniers.fragments.adresseRecap')
            @slot('titre')  @endslot
            @slot('sousTitre')  @endslot
            @slot('idUnique') facturationAdresseFacturation @endslot
            @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
            @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceId()}} @endif @endslot
            @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
        @endcomponent
        <button id="modifierAdresseFacturation">Modifier l'adresse de livraison</button>
    </section>
    <section id="sectionAdresseFacturation" style="display: none">
        @component('paniers.fragments.adresse')
            @slot('livraisonOuFacturation') facturation @endslot
            @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
            @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceId()}} @endif @endslot
            @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
        @endcomponent
            <button id="">Continuer</button>
    </section>
</section>
<section id="sectionPaiementFacturation" class="modePaiement">
<h3>Mode de paiement</h3>
    <h4>Cartes de crédits acceptées</h4>
    Ajouter les logos des cartes

    <div id="champNomTitulaire" class="champ champ--lg">
        <div class="champ__boite">
            <label for="facturation_nomTitulaire" class="champ__etiquette">Nom du titulaire</label>
            <input class="champ__input" id="facturation_nomTitulaire" name="facturation_nomTitulaire" type="text"
                   autocomplete="nomTitulaire" required="required" aria-labelledby="messagesNomTitulaire"
                   pattern="^[a-zA-Z-_]{2,}$" min="2" />
        </div>
        <div id="messagesNomTitulaire" class="champ__messages">
            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
        </div>
    </div>
    <div id="champNumeroCarte" class="champ champ--lg">
        <div class="champ__boite">
            <label for="facturation_numeroCarte" class="champ__etiquette">Numéro de la carte</label>
            <input class="champ__input" id="facturation_numeroCarte" name="facturation_numeroCarte" type="text"
                   autocomplete="numeroCarte" required="required" aria-labelledby="messagesNumeroCarte"
                   pattern="^[a-zA-Z-_]{2,}$" min="2" />
        </div>
        <div id="messagesNumeroCarte" class="champ__messages">
            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
        </div>
    </div>
    <div class="formulaire__champ">
        <label>Date d'expiration: *</label>
        <div class="formulaire__champInputFlex">
            <label class="screen-reader-only" for="facturation_moisExpiration">Mois d'expiration : </label>
            <input class="formulaire__champInput formulaire__champInputExp" id="facturation_moisExpiration" name="facturation_moisExpiration" type="text" />
            <label class="screen-reader-only" for="facturation_anneeExpiration">Annee d'expiration : </label>
            <input class="formulaire__champInput formulaire__champInputExp" id="facturation_anneeExpiration" name="facturation_anneeExpiration" type="text" />
        </div>
    </div>
    <div class="formulaire__champ">
        <div class="formulaire__champInputFlex">
            <label for="facturation_cvv">Code de sécurité</label>
            <input class="formulaire__champInput formulaire__champInputExp" id="facturation_cvv" name="facturation_cvv" placeholder="352" type="text"/>
        </div>
    </div>
</section>

<div class="form-wrap">
    <button id="continuerFacturation" type="button" class="btnCommander">Continuer</button>
</div>

