<section class="sectionFormulaire">
    <section class="sectionFormulaire__sectionForm sectionFormulaire__sectionIdentification">
        @include('paniers.fragments.identification')
    </section>
    <section id="validationAdresseLivraison"
             class="sectionFormulaire__sectionForm sectionFormulaire__sectionRecapAdresseLivraison">
        <section id="sectionRecapAdresseLivraison" class="sectionAnciennesAdressesLivraisons">
            @component('paniers.fragments.adresseRecap')
                @slot('titre') Adresse de Livraison @endslot
                @slot('sousTitre')  @endslot
                @slot('idUnique') livraisonAdresseLivraison @endslot
                @slot('adresse') @if($livraison !== null) {{$livraison->getAdresse()}} @endif @endslot
                @slot('ville') @if($livraison !== null) {{$livraison->getVille()}} @endif @endslot
                @slot('provinceChoisi') @if($livraison !== null) {{$livraison->getProvinceAssocie()->getNom()}} @endif @endslot
                @slot('codePostal') @if($livraison !== null) {{$livraison->getCodePostal()}} @endif @endslot
            @endcomponent
            <a id="modifierAdresseLivraison" class="stepleft__lien bouton texte">Modifier les informations de livraison</a>
        </section>
    </section>
    <section id="sectionAncienneAdresseLivraison"
             class="sectionFormulaire__sectionForm sectionAnciennesAdressesLivraisons">
        <input id="nombreAnciennesAdresses" type="hidden" @if($livraisonToutesLesAdresses !== null)value="{{count($livraisonToutesLesAdresses)}}" @else value="0" @endif>
        <h3 id="legend" class="sectionFormulaire__sectionFormH3">Anciennes adresses</h3>
        <ul id="sectionRadioAnciennesAdresses">
            @if($livraisonToutesLesAdresses !== null)
                @for($i = 0; $i < count($livraisonToutesLesAdresses); $i++)
                    <li class="listeAnciennesAdresses">
                        <input id="{{$i}}_livraisonAncienneAdresse_inputAdresse" type="radio" name="ancienAdresses"
                               value="{{$i}}"
                               @if($livraisonToutesLesAdresses[$i]->getAdresse() === $livraison->getAdresse()) checked @endif>
                        <label for="{{$i}}_livraisonAncienneAdresse_inputAdresse">
                            <address id="{{$i}}_livraisonAncienneAdresse_radioAdress">
                                {{--<p id="{{$i}}_livraisonAncienneAdresse_recapId">{{$livraisonToutesLesAdresses[$i]->getId()}}</p>--}}
                                <p>
                                    <span id="{{$i}}_livraisonAncienneAdresse_recapAdresse" data-rue="{{$livraisonToutesLesAdresses[$i]->getAdresse()}}">{{$livraisonToutesLesAdresses[$i]->getAdresse()}}</span>
                                </p>
                                <p>
                                    <span id="{{$i}}_livraisonAncienneAdresse_recapVille" data-ville="{{$livraisonToutesLesAdresses[$i]->getVille()}}">{{$livraisonToutesLesAdresses[$i]->getVille()}}</span>
                                    <span id="{{$i}}_livraisonAncienneAdresse_recapProvince" data-province="{{$livraisonToutesLesAdresses[$i]->getProvinceAssocie()->getId()}}">{{$livraisonToutesLesAdresses[$i]->getProvinceAssocie()->getNom()}}</span>
                                    <span id="{{$i}}_livraisonAncienneAdresse_recapCodePostal" data-codePostal="{{$livraisonToutesLesAdresses[$i]->getCodePostal()}}">{{$livraisonToutesLesAdresses[$i]->getCodePostal()}}</span>
                                </p>
                            </address>
                        </label>
                    </li>
                @endfor
            @endif
        </ul>
        <a id="ajouterNouvelleAdresseLivraison" class="stepleft__lien bouton texte">Ajouter une adresse nouvelle adresse</a>
    </section>
    <section id="sectionAdresseLivraison" class="sectionFormulaire__sectionForm">
        @component('paniers.fragments.adresse')
            @slot('livraisonOuFacturation') livraison @endslot
            @slot('id') @if($livraison !== null) {{$livraison->getId()}} @endif @endslot
            @slot('adresse') @if($livraison !== null) {{$livraison->getAdresse()}} @endif @endslot
            @slot('ville') @if($livraison !== null) {{$livraison->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($livraison !== null) {{$livraison->getProvinceId()}} @endif @endslot
            @slot('codePostal') @if($livraison !== null) {{$livraison->getCodePostal()}} @endif @endslot
        @endcomponent
        <div id="champ__memeAdresse" class="champ--6c">
                <input class="" id="memeAdresse" name="memeAdresse" type="checkbox"
                       @if($livraison !== null && $facturation !== null && $livraison === $facturation) checked @endif/>
                <label for="memeAdresse" class="">L'adresse de Facturation est la même que l'adresse de
                    livraison</label>
        </div>
        <button id="ajouterLivraison" type="button" class="bouton action">Confirmer</button>
        <button id="annulerAjouterLivraison" type="button" class="bouton texte">Annuler</button>
    </section>
    <button id="continuerModifierAdresseLivraison" type="button" class="bouton action">Continuer</button>
    <button id="continuerLivraison" type="button" class="bouton action">Continuer</button>
</section>


