<section class="sectionFormulaire">
    <section id="sectionRecapAdresseFacturation" class="sectionFormulaire__sectionForm sectionAnciennesAdressesLivraisons">
        <h3 class="sectionFormulaire__sectionFormH3">Adresse de Facturation</h3>
        @component('paniers.fragments.adresseRecap')
            @slot('titre')  @endslot
            @slot('sousTitre')  @endslot
            @slot('idUnique') facturationAdresseFacturation @endslot
            @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
            @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceAssocie()->getNom()}} @endif @endslot
            @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
        @endcomponent
        <a id="modifierAdresseFacturation" class="stepleft__lien bouton texte">Modifier les informations de facturation</a>
    </section>
    <section id="sectionAdresseFacturation" class="sectionFormulaire__sectionForm">
        @component('paniers.fragments.adresse')
            @slot('livraisonOuFacturation') facturation @endslot
            @slot('id') @if($facturation !== null) {{$facturation->getId()}} @endif @endslot
            @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
            @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceId()}} @endif @endslot
            @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
        @endcomponent
        <button id="continuerAdresseFacturation" type="button" class="bouton action boutonActive">Confirmer mon adressse de facturation</button>
    </section>
    <section id="sectionRecapPaiement" class="sectionFormulaire__sectionForm sectionAnciennesAdressesLivraisons">
        <h6>Mode de paiement</h6>
        <p id="paiement_titulaire">@if($paiement !== null){{$paiement->getTitulaire()}}@endif</p>
        <p id="paiement_numeroCarte">@if($paiement !== null){{$paiement->getNumeroCarte()}}@endif</p>
        <p id="paiement_moisExpiration">@if($paiement !== null){{$paiement->getMoisExpiration()}}@endif</p>
        <p id="paiement_anneeExpiration">@if($paiement !== null){{$paiement->getAnneeExpiration()}}@endif</p>
        <p id="paiement_cvv">@if($paiement !== null){{$paiement->getCvv()}}@endif</p>
        <a id="modifierPaiementFacturation" class="stepleft__lien">Modifier le mode de paiement</a>
    </section>
    <section id="sectionPaiementFacturation" class="sectionFormulaire__sectionForm">
        <h3 class="sectionFormulaire__sectionFormH3">Mode de paiement</h3>
        <!-- Ajouter les logos des cartes -->
        <input id="paiement_id" name="paiement_id" type="hidden"
               value="@if($paiement !== null){{$paiement->getId()}}@endif"/>
        <div id="champNomTitulaire" class="champ champ--4c">
            <div class="champ__boite">
                <label for="facturation_nomTitulaire" class="champ__etiquette">Nom du titulaire</label>
                <input class="champ__input" id="facturation_nomTitulaire" name="facturation_nomTitulaire" type="text"
                       autocomplete="nomTitulaire" aria-labelledby="messagesNomTitulaire"
                       pattern="^[a-zA-Z-_]{2,}$" min="2"
                       value="@if($paiement !== null){{$paiement->getTitulaire()}}@endif"/>
            </div>
            <div id="messagesNomTitulaire" class="champ__messages">
                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
            </div>
        </div>
        <div id="champNumeroCarte" class="champ champ--4c">
            <div class="champ__boite">
                <label for="facturation_numeroCarte" class="champ__etiquette">Numéro de la carte</label>
                <input class="champ__input" id="facturation_numeroCarte" name="facturation_numeroCarte" type="number"
                       autocomplete="numeroCarte" aria-labelledby="messagesNumeroCarte"
                       pattern="^[a-zA-Z-_]{2,}$" min="2"
                       value="@if($paiement !== null){{$paiement->getNumeroCarte()}}@endif"/>
            </div>
            <div id="messagesNumeroCarte" class="champ__messages">
                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
            </div>
        </div>
        <div class="champ champ--1c">
            <div class="champ__boite">
                <label for="facturation_cvv" class="champ__etiquette">Code de sécurité</label>
                <input class="champ__input" id="facturation_cvv" name="facturation_cvv" placeholder="352" type="number"
                       value="@if($paiement !== null){{$paiement->getCvv()}}@endif"/>
            </div>
            <span>Ce code à trois chiffres se trouve à l’endos de votre carte.</span>
        </div>
        <div class="champ champ--4c">
            <label>Date d'expiration: *</label>
            <div class="stepleft__champFlex">
                <div class="stepleft__champFlex--item">
                    <label class="screen-reader-only champ__etiquette" for="facturation_moisExpiration">Mois
                        d'expiration : </label>
                    <select class=" formulaire__champInputExp" id="facturation_moisExpiration"
                            name="facturation_moisExpiration">
                        <option value="">Selectionner le mois</option>
                        <option value="1"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 1) selected @endif>01
                        </option>
                        <option value="2"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 2) selected @endif>02
                        </option>
                        <option value="3"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 3) selected @endif>03
                        </option>
                        <option value="4"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 4) selected @endif>04
                        </option>
                        <option value="5"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 5) selected @endif>05
                        </option>
                        <option value="6"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 6) selected @endif>06
                        </option>
                        <option value="7"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 7) selected @endif>07
                        </option>
                        <option value="8"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 8) selected @endif>08
                        </option>
                        <option value="9"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 9) selected @endif>09
                        </option>
                        <option value="10"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 10) selected @endif>10
                        </option>
                        <option value="11"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 11) selected @endif>11
                        </option>
                        <option value="12"
                                @if($paiement !== null && $paiement->getMoisExpiration() === 12) selected @endif>12
                        </option>
                    </select>
                </div>
                <div class="stepleft__champFlex--item">
                    <label class="screen-reader-only champ__etiquette" for="facturation_anneeExpiration">Annee
                        d'expiration : </label>
                    <select class="formulaire__champInput formulaire__champInputExp" id="facturation_anneeExpiration"
                            name="facturation_anneeExpiration"
                            value="@if($paiement !== null){{$paiement->getAnneeExpiration()}}@endif">
                        <option value="">Selectionner l'année</option>
                        <option value="2021"
                                @if($paiement !== null && $paiement->getAnneeExpiration() === 2021) selected @endif>2021
                        </option>
                        <option value="2022"
                                @if($paiement !== null && $paiement->getAnneeExpiration() === 2022) selected @endif>2022
                        </option>
                        <option value="2023"
                                @if($paiement !== null && $paiement->getAnneeExpiration() === 2023) selected @endif>2023
                        </option>
                        <option value="2024"
                                @if($paiement !== null && $paiement->getAnneeExpiration() === 2024) selected @endif>2024
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    <button id="continuerFacturation" type="button" class="btnCommander">Valider la commande</button>
</section>
