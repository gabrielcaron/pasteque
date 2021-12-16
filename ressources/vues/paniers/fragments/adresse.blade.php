<input id="{{$livraisonOuFacturation}}_id" name="{{$livraisonOuFacturation}}_id" type="hidden" value="{{$id}}"/>
<div id="{{$livraisonOuFacturation}}_champAdresse" class="champ champ--4c">
    <div class="champ__boite">
        <label for="{{$livraisonOuFacturation}}_adresse" class="champ__etiquette">Adresse</label>
        <input class="champ__input @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_adresse']['message'] !== '') erreurInput @endif" id="{{$livraisonOuFacturation}}_adresse" name="{{$livraisonOuFacturation}}_adresse" type="text"
               autocomplete="adresse" aria-labelledby="{{$livraisonOuFacturation}}_messagesAdresse"
               pattern="^[0-9]{1,}[a-zA-ZÀ-ÿ0-9 \-]{3,}$" min="2" @if($tValidation !== null) value="{{$tValidation[$livraisonOuFacturation . '_adresse']['valeur']}}" @else value="{{$adresse}}" @endif required/>
    </div>
    <div id="{{$livraisonOuFacturation}}_messagesAdresse" class="champ__messages @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_adresse']['message'] !== '') erreur @endif">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_adresse']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_adresse']['message'] !== '') {{$tValidation[$livraisonOuFacturation . '_adresse']['message']}} @endif</p>
    </div>
</div>
<div id="{{$livraisonOuFacturation}}_champVille" class="champ champ--4c">
    <div class="champ__boite">
        <label for="{{$livraisonOuFacturation}}_ville" class="champ__etiquette">Ville</label>
        <input class="champ__input @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_ville']['message'] !== '') erreurInput @endif" id="{{$livraisonOuFacturation}}_ville" name="{{$livraisonOuFacturation}}_ville" type="text"
               autocomplete="ville" aria-labelledby="{{$livraisonOuFacturation}}_messagesVille"
               pattern="^[a-zA-ZÀ-ÿ0-9 \-]+$" min="2" @if($tValidation !== null) value="{{$tValidation[$livraisonOuFacturation . '_ville']['valeur']}}" @else value="{{$ville}}" @endif required/>
    </div>
    <div id="{{$livraisonOuFacturation}}_messagesVille" class="champ__messages @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_ville']['message'] !== '') erreur @endif">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_ville']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_ville']['message'] !== '') {{$tValidation[$livraisonOuFacturation . '_ville']['message']}} @endif</p>
    </div>
</div>
<div id="{{$livraisonOuFacturation}}_champProvince" class="champ champ--4c">
    <div class="champ__boite">
        <label for="{{$livraisonOuFacturation}}_province" class="champ__etiquette">Province</label>
        <select class="champ__input @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_province']['message'] !== '') erreurInput @endif" id="{{$livraisonOuFacturation}}_province" name="{{$livraisonOuFacturation}}_province" required="required" aria-labelledby="{{$livraisonOuFacturation}}_messagesProvince">
            <option value="" @if($provinceChoisi === '') selected @endif>Veuillez choisir une province</option>
            @foreach($provinces as $province)
                <option id="{{$livraisonOuFacturation}}_province_{{$province->getId()}}" value="{{$province->getId()}}" @if($tValidation !== null && intval($tValidation[$livraisonOuFacturation . '_province']['valeur']) === $province->getId()) selected @elseif(intval($provinceChoisi) === $province->getId()) selected @endif>{{$province->getNom()}}</option>
            @endforeach
        </select>
    </div>
    <div id="{{$livraisonOuFacturation}}_messagesProvince" class="champ__messages @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_province']['message'] !== '') erreur @endif">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_province']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_province']['message'] !== '') {{$tValidation[$livraisonOuFacturation . '_province']['message']}} @endif</p>
    </div>
</div>
<div id="{{$livraisonOuFacturation}}_champCodePostal" class="champ champ--4c">
    <div class="champ__boite">
        <label for="{{$livraisonOuFacturation}}_codePostal" class="champ__etiquette">Code Postal</label>
        <input class="champ__input @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_codePostal']['message'] !== '') erreurInput @endif" id="{{$livraisonOuFacturation}}_codePostal" name="{{$livraisonOuFacturation}}_codePostal" type="text"
               autocomplete="codePostal" required="required" pattern="^[A-Za-z]{1}[0-9]{1}[A-Za-z]{1} [0-9]{1}[A-Za-z]{1}[0-9]{1}$" aria-labelledby="{{$livraisonOuFacturation}}_messagesCodePostal" min="2"
               @if($tValidation !== null) value="{{$tValidation[$livraisonOuFacturation . '_codePostal']['valeur']}}" @else value="{{$codePostal}}" @endif/>
    </div>
    <div id="{{$livraisonOuFacturation}}_messagesCodePostal" class="champ__messages @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_codePostal']['message'] !== '') erreur @endif">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_codePostal']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation[$livraisonOuFacturation . '_codePostal']['message'] !== '') {{$tValidation[$livraisonOuFacturation . '_codePostal']['message']}} @endif</p>
        <p class="champ__message-aide">
            Ex: G1W 4S2
        </p>
    </div>
</div>
