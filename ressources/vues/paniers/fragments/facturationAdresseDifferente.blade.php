<h2 id="titreFacturation" class="form__titre-etape">
    2. Facturation
</h2>

<div id="champAdresse" class="champ champ--lg">
    <div class="champ__boite">
        <label for="adresse" class="champ__etiquette">Adresse</label>
        <input class="champ__input" id="adresse" name="adresse" type="text"
               autocomplete="adresse" required="required" aria-labelledby="messagesAdresse"
               pattern="^[a-zA-Z-_]{2,}$" min="2" />
    </div>
    <div id="messagesAdresse" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="champVille" class="champ champ--lg">
    <div class="champ__boite">
        <label for="ville" class="champ__etiquette">Ville</label>
        <input class="champ__input" id="ville" name="ville" type="text"
               autocomplete="ville" required="required" aria-labelledby="messagesVille"
               pattern="^[a-zA-Z-_]{2,}$" min="2" />
    </div>
    <div id="messagesVille" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="champProvince" class="champ champ--lg">
    <div class="champ__boite">
        <label for="province" class="champ__etiquette">Province</label>
        <select class="champ__input" id="province" name="province" type="text" required="required" aria-labelledby="messagesProvince">
            <option value=””>option1</option>
            <option value=””>option2</option>
            <option value=””>option3</option>
            <option value=””>option3</option>
        </select>
    </div>
    <div id="messagesProvince" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
<div id="champCodePostal" class="champ champ--lg">
    <div class="champ__boite">
        <label for="codePostal" class="champ__etiquette">Code Postal</label>
        <input class="champ__input" id="codePostal" name="ville" type="text"
               autocomplete="codePostal" required="required" aria-labelledby="messagesCodePostal"
               pattern="^[a-zA-Z-_]{2,}$" min="2" placeholder="Ex: G1W 4S2" />
    </div>
    <div id="messagesCodePostal" class="champ__messages">
        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
    </div>
</div>
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