<section class="stepleft__section">
    <section class="stepleft__sectionRecapAdresseFacturation">
        <section id="sectionRecapAdresseFacturation" class="stepleft__sectionForm">
            <h5>Adresse de Facturation</h5>
            @component('paniers.fragments.adresseRecap')
                @slot('titre')  @endslot
                @slot('sousTitre')  @endslot
                @slot('idUnique') facturationAdresseFacturation @endslot
                @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
                @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
                @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceAssocie()->getNom()}} @endif @endslot
                @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
            @endcomponent
            <a id="modifierAdresseFacturation" class="stepleft__lien">Modifier les informations de facturation</a>
        </section>
        <section id="sectionAdresseFacturation" class="stepleft__sectionForm">
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
    <section id="sectionPaiementFacturation" class="">
        <section id="sectionRecapPaiement" class="stepleft__sectionForm">
            <h6>Mode de paiement</h6>
            <p id="paiement_titulaire">Titulaire</p>
            <p id="paiement_numeroCarte">Numero Carte</p>
            <p id="paiement_moisExpiration">Mois expiration</p>
            <p id="paiement_anneeExpiration">Annee expiration</p>
            <p id="paiement_cvv">Cvv</p>
            <button id="modifierPaiementFacturationValidation" type="button">Modifier le mode de paiement</button>
        </section>
        <section class="stepleft__sectionForm">
            <!-- Ajouter les logos des cartes -->
            <h5>Mode de paiement</h5>
            <h6>Cartes de crédits acceptées</h6>
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
            <div class="champ champ--md">
                <div class="champ__boite">
                    <label for="facturation_cvv" class="champ__etiquette">Code de sécurité</label>
                    <input class="champ__input" id="facturation_cvv" name="facturation_cvv" placeholder="352" type="number" value="@if($paiement !== null){{$paiement->getCvv()}}@endif"/>
                </div>
                <span>Ce code à trois chiffres se trouve à l’endos de votre carte.</span>
            </div>
            <div class="formulaire__champ">
                <label>Date d'expiration: *</label>
                <div class="stepleft__champFlex">
                    <div class="stepleft__champFlex--item">
                        <label class="screen-reader-only champ__etiquette" for="facturation_moisExpiration">Mois d'expiration : </label>
                        <select class=" formulaire__champInputExp" id="facturation_moisExpiration" name="facturation_moisExpiration">
                            <option value="">Selectionner le mois</option>
                            <option value="01" @if($paiement !== null && $paiement->getMoisExpiration() === 1) selected @endif>01</option>
                            <option value="02" @if($paiement !== null && $paiement->getMoisExpiration() === 2) selected @endif>02</option>
                            <option value="03" @if($paiement !== null && $paiement->getMoisExpiration() === 3) selected @endif>03</option>
                            <option value="04" @if($paiement !== null && $paiement->getMoisExpiration() === 4) selected @endif>04</option>
                            <option value="05" @if($paiement !== null && $paiement->getMoisExpiration() === 5) selected @endif>05</option>
                            <option value="06" @if($paiement !== null && $paiement->getMoisExpiration() === 6) selected @endif>06</option>
                            <option value="07" @if($paiement !== null && $paiement->getMoisExpiration() === 7) selected @endif>07</option>
                            <option value="08" @if($paiement !== null && $paiement->getMoisExpiration() === 8) selected @endif>08</option>
                            <option value="09" @if($paiement !== null && $paiement->getMoisExpiration() === 9) selected @endif>09</option>
                            <option value="10" @if($paiement !== null && $paiement->getMoisExpiration() === 10) selected @endif>10</option>
                            <option value="11" @if($paiement !== null && $paiement->getMoisExpiration() === 11) selected @endif>11</option>
                            <option value="12" @if($paiement !== null && $paiement->getMoisExpiration() === 12) selected @endif>12</option>
                        </select>
                    </div>
                    <div class="stepleft__champFlex--item">
                        <label class="screen-reader-only champ__etiquette" for="facturation_anneeExpiration">Annee d'expiration : </label>
                        <select class="formulaire__champInput formulaire__champInputExp" id="facturation_anneeExpiration" name="facturation_anneeExpiration"value="@if($paiement !== null){{$paiement->getAnneeExpiration()}}@endif">
                            <option value="">Selectionner l'année</option>
                            <option value="2021" @if($paiement !== null && $paiement->getAnneeExpiration() === 2021) selected @endif>2021</option>
                            <option value="2022" @if($paiement !== null && $paiement->getAnneeExpiration() === 2022) selected @endif>2022</option>
                            <option value="2023" @if($paiement !== null && $paiement->getAnneeExpiration() === 2023) selected @endif>2023</option>
                            <option value="2024" @if($paiement !== null && $paiement->getAnneeExpiration() === 2024) selected @endif>2024</option>
                        </select>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <section class="stepleft__sectionForm">
        <button id="continuerFacturation" type="button" class="btnCommander">Valider la commande</button>
    </section>
</section>


