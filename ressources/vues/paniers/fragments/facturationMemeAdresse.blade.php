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
        <button id="continuerAdresseFacturation" type="button" class="bouton action boutonActive">Continuer</button>
    </section>
    <section id="sectionRecapPaiement" class="sectionFormulaire__sectionForm sectionAnciennesAdressesLivraisons">
        <h6>Mode de paiement</h6>
        <p id="paiement_titulaire">@if($paiement !== null){{$paiement->getTitulaire()}}@endif</p>
        <p id="paiement_numeroCarte">@if($paiement !== null){{$paiement->getNumeroCarte()}}@endif</p>
        <p><span id="paiement_moisExpiration">@if($paiement !== null){{$paiement->getMoisExpiration()}}@endif</span> / <span id="paiement_anneeExpiration">@if($paiement !== null){{$paiement->getAnneeExpiration()}}@endif</span> <br><span id="paiement_cvv">@if($paiement !== null){{$paiement->getCvv()}}@endif</span></p>
        <a id="modifierPaiementFacturation" class="stepleft__lien bouton texte">Modifier le mode de paiement</a>
    </section>
    <section id="sectionPaiementFacturation" class="sectionFormulaire__sectionForm">
        <h3 class="sectionFormulaire__sectionFormH3 champ--4c">Mode de paiement</h3>
        <a  style="margin-top: 1rem; margin-bottom: 1rem;" class="champ--4c"><img alt="Credit Card Logos" title="Credit Card Logos" src="http://www.credit-card-logos.com/images/visa_credit-card-logos/visa_mastercard_2.gif" width="116" height="35" border="0" /></a>
            <!-- Ajouter les logos des cartes -->
        <input id="paiement_id" name="paiement_id" type="hidden"
               value="@if($paiement !== null){{$paiement->getId()}}@endif"/>
        <div id="facturation_champNomTitulaire" class="champ champ--4c">
            <div class="champ__boite">
                <label for="facturation_nomTitulaire" class="champ__etiquette">Nom du titulaire</label>
                <input class="champ__input @if($tValidation !== null && $tValidation['facturation_nomTitulaire']['message'] !== '') erreurInput @endif" id="facturation_nomTitulaire" name="facturation_nomTitulaire" type="text"
                       autocomplete="nomTitulaire" aria-labelledby="messagesNomTitulaire"
                       pattern="^[ a-zA-ZÀ-ÿ\-‘]+$" min="2" required
                       @if($tValidation !== null) value="{{$tValidation['facturation_nomTitulaire']['valeur']}}" @else value="@if($paiement !== null){{$paiement->getTitulaire()}}@endif" @endif/>
            </div>
            <div id="messagesNomTitulaire" class="champ__messages @if($tValidation !== null && $tValidation['facturation_nomTitulaire']['message'] !== '') erreur @endif">
                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation['facturation_nomTitulaire']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation['facturation_nomTitulaire']['message'] !== '') {{$tValidation['facturation_nomTitulaire']['message']}} @endif</p>
            </div>
        </div>
        <div id="facturation_champNumeroCarte" class="champ champ--4c">
            <div class="champ__boite">
                <label for="facturation_numeroCarte" class="champ__etiquette">Numéro de la carte</label>
                <input class="champ__input @if($tValidation !== null && $tValidation['facturation_numeroCarte']['message'] !== '') erreurInput @endif" id="facturation_numeroCarte" name="facturation_numeroCarte" type="text"
                       autocomplete="numeroCarte" aria-labelledby="messagesNumeroCarte" min="2" pattern="^([0-9]{4}( |\-){0,1}){3}[0-4]{4}$"
                       @if($tValidation !== null) value="{{$tValidation['facturation_numeroCarte']['valeur']}}" @else value="@if($paiement !== null){{$paiement->getNumeroCarte()}}@endif" @endif required/>
            </div>
            <div id="messagesNumeroCarte" class="champ__messages">
                <p class="champ__message-erreur @if($tValidation !== null && $tValidation['facturation_numeroCarte']['message'] !== '') erreur @endif" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation['facturation_numeroCarte']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation['facturation_numeroCarte']['message'] !== '') {{$tValidation['facturation_numeroCarte']['message']}} @endif</p>
                <p class="champ__message-aide">
                    Ex: 1234 1234 1234 1234
                </p>
            </div>
        </div>
        <div id="facturation_champCvv" class="champ champ--1c">
            <div class="champ__boite">
                <label for="facturation_cvv" class="champ__etiquette">Cvv</label>
                <input class="champ__input @if($tValidation !== null && $tValidation['facturation_cvv']['message'] !== '') erreurInput @endif" id="facturation_cvv" name="facturation_cvv" pattern="^\d{1,3}$" type="number" aria-labelledby="messagesCvv"
                       @if($tValidation !== null) value="{{$tValidation['facturation_cvv']['valeur']}}" @else value="@if($paiement !== null){{$paiement->getCvv()}}@endif" @endif required/>
            </div>
            <div id="messagesCvv" class="champ__messages">
                <p class="champ__message-erreur @if($tValidation !== null && $tValidation['facturation_cvv']['message'] !== '') erreur @endif" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation['facturation_cvv']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation['facturation_cvv']['message'] !== '') {{$tValidation['facturation_cvv']['message']}} @endif</p>
                <p class="champ__message-aide">
                    Ex: 352
                </p>
            </div>
        </div>
        <div class="champ champ--span2">
            <div class="champ__boite">
                <label class="champ__etiquette">Date d'expiration</label>
                <div class="champ__flex champ__input @if($tValidation !== null && ($tValidation['facturation_moisExpiration']['message'] !== '' || $tValidation['facturation_anneeExpiration']['message'] !== '')) erreurInput @endif">
                    <div class="">
                        <label class="screen-reader-only champ__etiquette" for="facturation_moisExpiration">Mois</label>
                        <select class=" formulaire__champInputExp" id="facturation_moisExpiration"
                                name="facturation_moisExpiration">
                            <option value="1"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 1) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 1) selected @endif>01
                            </option>
                            <option value="2"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 2) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 2) selected @endif>02
                            </option>
                            <option value="3"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 3) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 3) selected @endif>03
                            </option>
                            <option value="4"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 4) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 4) selected @endif>04
                            </option>
                            <option value="5"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 5) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 5) selected @endif>05
                            </option>
                            <option value="6"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 6) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 6) selected @endif>06
                            </option>
                            <option value="7"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 7) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 7) selected @endif>07
                            </option>
                            <option value="8"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 8) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 8) selected @endif>08
                            </option>
                            <option value="9"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 9) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 9) selected @endif>09
                            </option>
                            <option value="10"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 10) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 10) selected @endif>10
                            </option>
                            <option value="11"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 11) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 11) selected @endif>11
                            </option>
                            <option value="12"
                                    @if($tValidation !== null && intval($tValidation['facturation_moisExpiration']['valeur']) === 12) selected @elseif($paiement !== null && $paiement->getMoisExpiration() === 12) selected @endif>12
                            </option>
                        </select>
                    </div>
                    <p class="separateur"> / </p>
                    <div class="">
                        <label class="screen-reader-only champ__etiquette" for="facturation_anneeExpiration">Annee</label>
                        <select class=" formulaire__champInputExp" id="facturation_anneeExpiration"
                                name="facturation_anneeExpiration">
                            <option value="2021"
                                    @if($tValidation !== null && intval($tValidation['facturation_anneeExpiration']['valeur']) === 2021) selected @elseif($paiement !== null && $paiement->getAnneeExpiration() === 2021) selected @endif>2021
                            </option>
                            <option value="2022"
                                    @if($tValidation !== null && intval($tValidation['facturation_anneeExpiration']['valeur']) === 2022) selected @elseif($paiement !== null && $paiement->getAnneeExpiration() === 2022) selected @endif>2022
                            </option>
                            <option value="2023"
                                    @if($tValidation !== null && intval($tValidation['facturation_anneeExpiration']['valeur']) === 2023) selected @elseif($paiement !== null && $paiement->getAnneeExpiration() === 2023) selected @endif>2023
                            </option>
                            <option value="2024"
                                    @if($tValidation !== null && intval($tValidation['facturation_anneeExpiration']['valeur']) === 2024) selected @elseif($paiement !== null && $paiement->getAnneeExpiration() === 2024) selected @endif>2024
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="messagesExpirations" class="champ__messages">
                <p class="champ__message-erreur @if($tValidation !== null && ($tValidation['facturation_moisExpiration']['message'] !== '' || $tValidation['facturation_anneeExpiration']['message'] !== '')) erreur @endif" aria-live="polite" aria-atomic="false" @if($tValidation !== null && ($tValidation['facturation_moisExpiration']['message'] !== '' || $tValidation['facturation_anneeExpiration']['message'] !== ''))style="display: block;"@endif>@if($tValidation !== null && $tValidation['facturation_moisExpiration']['message'] !== '') {{$tValidation['facturation_moisExpiration']['message']}} @elseif($tValidation !== null && $tValidation['facturation_anneeExpiration']['message']) {{$tValidation['facturation_anneeExpiration']['message']}} @endif</p>
            </div>
        </div>
    </section>
    <button id="continuerFacturation" type="button" class="bouton action boutonActive">Continuer</button>
</section>
