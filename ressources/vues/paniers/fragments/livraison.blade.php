<h2 id="titreLivraison" class="form__titre-etape">
    1. Livraison
</h2>
<section class="identification">
    @include('paniers.fragments.identification')
</section>
@component('paniers.fragments.adresse')
    @slot('livraisonOuFacturation') livraison @endslot
    @slot('adresse') @if($commande !== null) {{$commande->getAdresse()}} @endif @endslot
    @slot('ville') @if($commande !== null) {{$commande->getVille()}} @endif @endslot
    @slot('provinceChoisi') @if($commande !== null) {{$commande->getProvinceId()}} @endif @endslot
    @slot('codePostal') @if($commande !== null) {{$commande->getCodePostal()}} @endif @endslot
@endcomponent
