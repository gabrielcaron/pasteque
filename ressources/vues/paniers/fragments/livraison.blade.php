<h2 id="titreLivraison" class="form__titre-etape">
    1. Livraison
</h2>
<section class="identification">
    @include('paniers.fragments.identification')
</section>
<section id="sectionAncienneAdresseLivraison">
    <input id="nombreAnciennesAdresses" type="hidden" value="@if($livraisonToutesLesAdresses !== null){{count($livraisonToutesLesAdresses)}}@endif">
    @if($livraisonToutesLesAdresses !== null)
        @for($i = 0; $i < count($livraisonToutesLesAdresses); $i++)
            @component('paniers.fragments.adresseRecap')
                @slot('titre')  @endslot
                @slot('sousTitre')  @endslot
                @slot('idUnique') {{$i}}_livraisonAncienneAdresse @endslot
                @slot('adresse')  {{$livraisonToutesLesAdresses[$i]->getAdresse()}} @endslot
                @slot('ville') {{$livraisonToutesLesAdresses[$i]->getVille()}} @endslot
                @slot('provinceChoisi') {{$livraisonToutesLesAdresses[$i]->getProvinceId()}} @endslot
                @slot('codePostal') {{$livraisonToutesLesAdresses[$i]->getCodePostal()}} @endslot
            @endcomponent
        @endfor
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
</section>

<div class="form_wrap">
    <button id="continuerLivraison" type="button" class="button">Continuer</button>
</div>

