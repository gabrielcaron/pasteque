
<section class="identification">
    @include('paniers.fragments.identification')
</section>
<section id="validationAdresseLivraison" class="validationAdresseLivraison">
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
        <button id="modifierAdresseLivraisonValidation" type="button">Modifier les informations de livraison</button>
    </section>
</section>
<section id="sectionAncienneAdresseLivraison" >
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
                            <p id="{{$i}}_livraisonAncienneAdresse_recapAdresse">{{$livraisonToutesLesAdresses[$i]->getAdresse()}}</p>
                            <p id="{{$i}}_livraisonAncienneAdresse_recapVille">{{$livraisonToutesLesAdresses[$i]->getVille()}}</p>
                            <p id="{{$i}}_livraisonAncienneAdresse_recapProvince">{{$livraisonToutesLesAdresses[$i]->getProvinceAssocie()->getNom()}}</p>
                            <p id="{{$i}}_livraisonAncienneAdresse_recapCodePostal">{{$livraisonToutesLesAdresses[$i]->getCodePostal()}}</p>
                        </address>
                    </label>
                </li>
            @endfor
        </ul>
        <button id="ajouterNouvelleAdresseLivraison" type="button" class="button">Ajouter une adresse nouvelle adresse</button>
    @endif
</section>
<section id="sectionAdresseLivraison">
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

<div class="form_wrap">
    <button id="continuerLivraison" type="button" class="button">Continuer</button>
</div>

