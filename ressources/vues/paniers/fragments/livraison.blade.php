<h2 id="titreLivraison" class="form__titre-etape">
    1. Livraison
</h2>
<section class="identification">
    @include('paniers.fragments.identification')
</section>
<section id="sectionAncienneAdresseLivraison" style="display: none">
    <input id="nombreAnciennesAdresses" type="hidden" value="@if($livraisonToutesLesAdresses !== null){{count($livraisonToutesLesAdresses)}}@endif">
    @if($livraisonToutesLesAdresses !== null)
        @for($i = 0; $i < count($livraisonToutesLesAdresses); $i++)
            <div>
                <p id="{{$i}}_livraisonAncienneAdresse_recapAdresse">{{$livraisonToutesLesAdresses[$i]->getAdresse()}}</p>
                <p id="{{$i}}_livraisonAncienneAdresse_recapVille">{{$livraisonToutesLesAdresses[$i]->getVille()}}</p>
                <p id="{{$i}}_livraisonAncienneAdresse_recapProvince">{{$livraisonToutesLesAdresses[$i]->getProvinceAssocie()->getNom()}}</p>
                <p id="{{$i}}_livraisonAncienneAdresse_recapCodePostal">{{$livraisonToutesLesAdresses[$i]->getCodePostal()}}</p>
            </div>
        @endfor
        <button id="ajouterNouvelleAdresseLivraison" type="button" class="button">Ajouter une adresse nouvelle adresse</button>
    @endif
</section>
<section id="sectionAdresseLivraison" style="display: none">
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

