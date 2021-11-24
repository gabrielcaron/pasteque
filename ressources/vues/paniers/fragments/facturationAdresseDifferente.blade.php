<h2 id="titreFacturation" class="form__titre-etape">
    2. Facturation
</h2>

@component('paniers.fragments.adresse')
    @slot('adresse') @if($commande !== null) {{$commande->getAdresse()}} @endif @endslot
    @slot('ville') @if($commande !== null) {{$commande->getVille()}} @endif @endslot
    @slot('provinceChoisi') @if($commande !== null) {{$commande->getProvinceId()}} @endif @endslot
    @slot('codePostal') @if($commande !== null) {{$commande->getCodePostal()}} @endif @endslot
@endcomponent
<div class="checkbox">
    <label>
        <input type="checkbox">
        Se souvenir de moi
    </label>
</div>
<div class="form-wrap">
    <button id="btnContinuerEtape1" type="button" class="btnCommander">Continuer</button>
</div>

<section class="modePaiement">

</section>