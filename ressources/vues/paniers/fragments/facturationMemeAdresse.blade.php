<section class="adressePaiement">
    <h5>Adresse de Facturation</h5>
    <section id="sectionRecapAdresseFacturation" >
        @component('paniers.fragments.adresseRecap')
            @slot('titre')  @endslot
            @slot('sousTitre')  @endslot
            @slot('idUnique') facturationAdresseFacturation @endslot
            @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
            @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceAssocie()->getNom()}} @endif @endslot
            @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
        @endcomponent
        <button id="modifierAdresseFacturation" type="button">Modifier l'adresse de facturation</button>
    </section>
    <section id="sectionAdresseFacturation" >
        @component('paniers.fragments.adresse')
            @slot('livraisonOuFacturation') facturation @endslot
            @slot('id') @if($facturation !== null) {{$facturation->getId()}} @endif @endslot
            @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
            @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceAssocie()->getNom()}} @endif @endslot
            @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
        @endcomponent
            <button id="continuerAdresseFacturation" type="button">Confirmer mon adressse de facturation</button>
    </section>
</section>
<section id="sectionPaiementFacturation" class="modePaiement">
<h5>Mode de paiement</h5>
    <h4>Cartes de crédits acceptées</h4>
    Ajouter les logos des cartes

    <input id="paiement_id" name="paiement_id" type="hidden" value="@if($paiement !== null){{$paiement->getId()}}@endif"/>
    <div id="champNomTitulaire" class="champ champ--lg">
        <div class="champ__boite">
            <label for="facturation_nomTitulaire" class="champ__etiquette">Nom du titulaire</label>
            <input class="champ__input" id="facturation_nomTitulaire" name="facturation_nomTitulaire" type="text"
                   autocomplete="nomTitulaire" aria-labelledby="messagesNomTitulaire"
                   pattern="^[a-zA-Z-_]{2,}$" min="2" value="@if($paiement !== null){{$paiement->getTitulaire()}}@endif"/>
        </div>
        <div id="messagesNomTitulaire" class="champ__messages">
            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
        </div>
    </div>
    <div id="champNumeroCarte" class="champ champ--lg">
        <div class="champ__boite">
            <label for="facturation_numeroCarte" class="champ__etiquette">Numéro de la carte</label>
            <input class="champ__input" id="facturation_numeroCarte" name="facturation_numeroCarte" type="number"
                   autocomplete="numeroCarte" aria-labelledby="messagesNumeroCarte"
                   pattern="^[a-zA-Z-_]{2,}$" min="2" value="@if($paiement !== null){{$paiement->getNumeroCarte()}}@endif"/>
        </div>
        <div id="messagesNumeroCarte" class="champ__messages">
            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
        </div>
    </div>
    <div class="formulaire__champ">
        <div class="formulaire__champInputFlex">
            <label for="facturation_cvv">Code de sécurité</label>
            <input class="formulaire__champInput formulaire__champInputExp" id="facturation_cvv" name="facturation_cvv" placeholder="352" type="text" value="@if($paiement !== null){{$paiement->getCvv()}}@endif"/>
            <span>Ce code à trois chiffres se trouve à l’endos de votre carte.</span>
        </div>
    </div>
    <div class="formulaire__champ">
        <label>Date d'expiration: *</label>
        <div class="formulaire__champInputFlex">
            <label class="screen-reader-only" for="facturation_moisExpiration">Mois d'expiration : </label>
            <input class="formulaire__champInput formulaire__champInputExp" id="facturation_moisExpiration" name="facturation_moisExpiration" type="number" value="@if($paiement !== null){{$paiement->getMoisExpiration()}}@endif"/>
            <label class="screen-reader-only" for="facturation_anneeExpiration">Annee d'expiration : </label>
            <input class="formulaire__champInput formulaire__champInputExp" id="facturation_anneeExpiration" name="facturation_anneeExpiration" type="number" value="@if($paiement !== null){{$paiement->getAnneeExpiration()}}@endif"/>
        </div>
    </div>

</section>

<div class="form-wrap">
    <button id="continuerFacturation" type="button" class="btnCommander">Valider la commande</button>
</div>

