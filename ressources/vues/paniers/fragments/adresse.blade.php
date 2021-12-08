<input id="{{$livraisonOuFacturation}}_id" name="{{$livraisonOuFacturation}}_id" type="hidden" value="{{$id}}"/>
<div id="{{$livraisonOuFacturation}}_champAdresse" class="champ champ--4c">
    <div class="champ__boite">
        <label for="{{$livraisonOuFacturation}}_adresse" class="champ__etiquette">Adresse</label>
        <input class="champ__input" id="{{$livraisonOuFacturation}}_adresse" name="{{$livraisonOuFacturation}}_adresse" type="text"
               autocomplete="adresse" aria-labelledby="{{$livraisonOuFacturation}}_messagesAdresse"
               pattern="#^[0-9]+[a-zA-ZÀ-ÿ0-9 \-]+$#" min="2" value="{{$adresse}}" required/>
    </div>
    <div id="{{$livraisonOuFacturation}}_messagesAdresse" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="{{$livraisonOuFacturation}}_champVille" class="champ champ--4c">
    <div class="champ__boite">
        <label for="{{$livraisonOuFacturation}}_ville" class="champ__etiquette">Ville</label>
        <input class="champ__input" id="{{$livraisonOuFacturation}}_ville" name="{{$livraisonOuFacturation}}_ville" type="text"
               autocomplete="ville" aria-labelledby="{{$livraisonOuFacturation}}_messagesVille"
               pattern="#^[a-zA-ZÀ-ÿ0-9 \-]+$#" min="2" value="{{$ville}}" required/>
    </div>
    <div id="{{$livraisonOuFacturation}}_messagesVille" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="{{$livraisonOuFacturation}}_champProvince" class="champ champ--4c">
    <div class="champ__boite">
        <label for="{{$livraisonOuFacturation}}_province" class="champ__etiquette">Province</label>
        <select class="champ__input" id="{{$livraisonOuFacturation}}_province" name="{{$livraisonOuFacturation}}_province" required="required" aria-labelledby="{{$livraisonOuFacturation}}_messagesProvince">
            <option value="" @if($provinceChoisi === '') selected @endif>Veuillez choisir une province</option>
            @foreach($provinces as $province)
                <option value="{{$province->getId()}}" @if(intval($provinceChoisi) === $province->getId()) selected @endif>{{$province->getNom()}}</option>
            @endforeach
        </select>
    </div>
    <div id="{{$livraisonOuFacturation}}_messagesProvince" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="{{$livraisonOuFacturation}}_champCodePostal" class="champ champ--4c">
    <div class="champ__boite">
        <label for="{{$livraisonOuFacturation}}_codePostal" class="champ__etiquette">Code Postal</label>
        <input class="champ__input" id="{{$livraisonOuFacturation}}_codePostal" name="{{$livraisonOuFacturation}}_codePostal" type="text"
               autocomplete="codePostal" required="required" pattern="#^[A-Za-z]{1}[0-9]{1}[A-Za-z]{1} [0-9]{1}[A-Za-z]{1}[0-9]{1}$#" aria-labelledby="{{$livraisonOuFacturation}}_messagesCodePostal" min="2" placeholder="Ex: G1W 4S2" value="{{$codePostal}}"/>
    </div>
    <div id="{{$livraisonOuFacturation}}_messagesCodePostal" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
