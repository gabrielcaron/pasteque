<h2 id="titreLivraison" class="form__titre-etape">
    1. Livraison
</h2>
    <h3>Identification</h3>
    <p>{{$compte->getPrenom()}} {{$compte->getNom()}}</p>
    <p>{{$compte->getCourriel()}}</p>
<p>Ces informations seront utilisées uniquement pour confirmer votre commande ou vous joindre en cas de besoin pour le suivi de votre commande.</p>

<div id="champLivraisonAdresse" class="champ champ--lg">
    <div class="champ__boite">
        <label for="livraison_adresse" class="champ__etiquette">Adresse</label>
        <input class="champ__input" id="livraison_adresse" name="livraison_adresse" type="text"
               autocomplete="adresse" required="required" aria-labelledby="messagesAdresse"
               pattern="^[a-zA-Z-_]{2,}$" min="2" @if($commande !== null) value="{{$commande->getAdresse()}}" @else value="" @endif/>
    </div>
    <div id="messagesAdresse" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="champLivraisonVille" class="champ champ--lg">
    <div class="champ__boite">
        <label for="livraison_ville" class="champ__etiquette">Ville</label>
        <input class="champ__input" id="livraison_ville" name="livraison_ville" type="text"
               autocomplete="ville" required="required" aria-labelledby="messagesVille"
               pattern="^[a-zA-Z-_]{2,}$" min="2" @if($commande !== null) value="{{$commande->getVille()}}" @else value="" @endif />
    </div>
    <div id="messagesVille" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="champLivraisonProvince" class="champ champ--lg">
    <div class="champ__boite">
        <label for="livraison_province" class="champ__etiquette">Province</label>
        <select class="champ__input" id="livraison_province" name="livraison_province" required="required" aria-labelledby="messagesProvince">
                <option value="" @if($commande === null) selected @endif>Veuillez choisir une province</option>
            @foreach($provinces as $province)
                <option value="{{$province->getId()}}" @if($commande !== null && $commande->getProvinceId() === $province->getId()) selected @endif>{{$province->getNom()}}</option>
            @endforeach
        </select>
    </div>
    <div id="messagesProvince" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="champLivraisonCodePostal" class="champ champ--lg">
    <div class="champ__boite">
        <label for="livraison_codePostal" class="champ__etiquette">Code Postal</label>
        <input class="champ__input" id="livraison_codePostal" name="livraison_codePostal" type="text"
               autocomplete="codePostal" required="required" aria-labelledby="messagesCodePostal"
               pattern="^[a-zA-Z-_]{2,}$" min="2" placeholder="Ex: G1W 4S2" @if($commande !== null) value="{{$commande->getCodePostal()}}" @else value="" @endif/>
    </div>
    <div id="messagesCodePostal" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
