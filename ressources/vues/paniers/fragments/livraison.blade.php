<section class="stepleft__section">
    <section class="stepleft__sectionForm stepleft__sectionIdentification">
        @include('paniers.fragments.identification')
    </section>
    <section id="validationAdresseLivraison" class="stepleft__sectionForm stepleft__sectionRecapAdresseLivraison">
        <section id="sectionRecapAdresseLivraison">
            @component('paniers.fragments.adresseRecap')
                @slot('titre') Adresse de Livraison @endslot
                @slot('sousTitre')  @endslot
                @slot('idUnique') livraisonAdresseLivraison @endslot
                @slot('adresse') @if($livraison !== null) {{$livraison->getAdresse()}} @endif @endslot
                @slot('ville') @if($livraison !== null) {{$livraison->getVille()}} @endif @endslot
                @slot('provinceChoisi') @if($livraison !== null) {{$livraison->getProvinceAssocie()->getNom()}} @endif @endslot
                @slot('codePostal') @if($livraison !== null) {{$livraison->getCodePostal()}} @endif @endslot
            @endcomponent
            <a id="modifierAdresseLivraisonValidation" class="stepleft__lien">Modifier les informations de livraison</a>
        </section>
    </section>
    <section id="sectionAncienneAdresseLivraison"  class="stepleft__sectionForm stepleft__sectionAnciennesAdressesLivraisons">
        <input id="nombreAnciennesAdresses" type="hidden" value="@if($livraisonToutesLesAdresses !== null){{count($livraisonToutesLesAdresses)}}@endif">
        @if($livraisonToutesLesAdresses !== null)
            <h3 id="legend">Anciennes Adresses</h3>
            <ul id="sectionRadioAnciennesAdresses">
                @for($i = 0; $i < count($livraisonToutesLesAdresses); $i++)
                    <li>
                        <input id="{{$i}}_livraisonAncienneAdresse_radioAdresse" type="radio" name="ancienAdresses" value="{{$i}}" @if($livraisonToutesLesAdresses[$i]->getAdresse() === $livraison->getAdresse()) checked @endif>
                        <label for="{{$i}}_livraisonAncienneAdresse_radioAdresse">
                            <address id="{{$i}}_livraisonAncienneAdresse_radioAdress">
                                <p id="{{$i}}_livraisonAncienneAdresse_recapAdresse">{{$livraisonToutesLesAdresses[$i]->getId()}}</p>
                                <p><span id="{{$i}}_livraisonAncienneAdresse_recapAdresse">{{$livraisonToutesLesAdresses[$i]->getAdresse()}}</span></p>
                                <p>
                                    <span id="{{$i}}_livraisonAncienneAdresse_recapVille">{{$livraisonToutesLesAdresses[$i]->getVille()}}</span>
                                    <span id="{{$i}}_livraisonAncienneAdresse_recapProvince">{{$livraisonToutesLesAdresses[$i]->getProvinceAssocie()->getNom()}}</span>
                                    <span id="{{$i}}_livraisonAncienneAdresse_recapCodePostal">{{$livraisonToutesLesAdresses[$i]->getCodePostal()}}</span>
                                </p>
                            </address>
                        </label>
                    </li>
                @endfor
            </ul>
            <a id="ajouterNouvelleAdresseLivraison" class="stepleft__lien">Ajouter une adresse nouvelle adresse</a>
        @endif
    </section>
    <section id="sectionAdresseLivraison" class="stepleft__sectionForm">
        @component('paniers.fragments.adresse')
            @slot('livraisonOuFacturation') livraison @endslot
            @slot('id') @if($livraison !== null) {{$livraison->getId()}} @endif @endslot
            @slot('adresse') @if($livraison !== null) {{$livraison->getAdresse()}} @endif @endslot
            @slot('ville') @if($livraison !== null) {{$livraison->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($livraison !== null) {{$livraison->getProvinceId()}} @endif @endslot
            @slot('codePostal') @if($livraison !== null) {{$livraison->getCodePostal()}} @endif @endslot
        @endcomponent
        <div id="champ__memeAdresse" class="">
            <div class="">
                <input class="" id="memeAdresse" name="memeAdresse" type="checkbox"
                       @if($livraison !== null && $facturation !== null && $livraison === $facturation) checked @endif/>
                <label for="memeAdresse" class="">L'adresse de Facturation est la même que l'adresse de livraison</label>
            </div>
        </div>
        <button id="ajouterLivraison" type="button" class="button">Confirmer</button>
        <button id="annulerAjouterAdresse" type="button" class="button">Annuler</button>
    </section>
    <section class="">
        <button id="continuerLivraison" type="button" class="button">Continuer vers les informations de facturation</button>
    </section>
</section>


