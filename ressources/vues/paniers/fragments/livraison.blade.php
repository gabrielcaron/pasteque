<h2 id="titreLivraison" class="form__titre-etape">
    1. Livraison
</h2>
<section class="identification">
    @include('paniers.fragments.identification')
</section>
<section id="sectionAdresseLivraison">
    @component('paniers.fragments.adresse')
        @slot('livraisonOuFacturation') livraison @endslot
        @slot('adresse') @if($commande !== null) {{$commande->getAdresse()}} @endif @endslot
        @slot('ville') @if($commande !== null) {{$commande->getVille()}} @endif @endslot
        @slot('provinceChoisi') @if($commande !== null) {{$commande->getProvinceId()}} @endif @endslot
        @slot('codePostal') @if($commande !== null) {{$commande->getCodePostal()}} @endif @endslot
    @endcomponent
        <div id="{{$livraisonOuFacturation}}_champCodePostal" class="champ champ--lg">
            <div class="champ__boite">
                <label for="{{$livraisonOuFacturation}}_codePostal" class="champ__etiquette">Code Postal</label>
                <input class="champ__input" id="memeAdresse" name="memeAdresse" type="checkbox"
                       @if($commande !== null && $facturation !== null && $commande === $facturation) checked @endif/>
            </div>
        </div>
</section>

<div class="form_wrap">
    <button id="continuerLivraison" type="button" class="button">Continuer</button>
</div>

