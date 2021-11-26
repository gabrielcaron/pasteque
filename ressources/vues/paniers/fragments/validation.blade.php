<h2 id="titreFacturation" class="form__titre-etape">
    3. Validation
</h2>
<section class="identification">
    @include('paniers.fragments.identification')
</section>
<h2>Récapitulatif des informations</h2>
<section id="validationAdresseLivraison" class="validationAdresseLivraison">
    <h3>Adresse de Livraison</h3>
    <section id="sectionRecapAdresseLivraison">
        @component('paniers.fragments.adresseRecap')
            @slot('adresse') @if($commande !== null) {{$commande->getAdresse()}} @endif @endslot
            @slot('ville') @if($commande !== null) {{$commande->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($commande !== null) {{$commande->getProvinceId()}} @endif @endslot
            @slot('codePostal') @if($commande !== null) {{$commande->getCodePostal()}} @endif @endslot
        @endcomponent
        <button id="modifierAdresseLivraisonValidation">Modifier l'adresse de livraison</button>
    </section>
</section>
<section id="validationAdressePaiement" class="validationAdressePaiement">
    <h3>Adresse de Facturation</h3>
    <section id="sectionRecapAdresseFacturation">
        @component('paniers.fragments.adresseRecap')
            @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot
            @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot
            @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceId()}} @endif @endslot
            @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot
        @endcomponent
        <button id="modifierAdresseFacturationValidation">Modifier l'adresse de livraison</button>

    </section>
</section>
<section class="validationPanier">
    <h2>Recap panier</h2>
    @foreach($panier->getArticlesAssocies() as $article)
        <article class="panier__article">
            <picture class="livre__picture">
                <!-- Image pour mobile, tablette et poste de table -->
                <img class="livre__image etiquette"
                     src="../public/liaisons/images/livres/{{$article->getLivreAssocie()->getIsbnPapier()}}-470.jpg"
                     srcset="../public/liaisons/images/livres/{{$article->getLivreAssocie()->getIsbnPapier()}}-470.jpg 1x, ../public/liaisons/images/livres/{{$article->getLivreAssocie()->getIsbnPapier()}}-940.jpg 2x"
                     alt="{{$article->getLivreAssocie()->getTitre()}}">
            </picture>
            <section class="panier__articleInfos">
                <a href="index.php?controleur=livre&action=fiche&id={{$article->getProduitId()}}">
                    <h2 class="panier__articleInfosTitre">{{$article->getLivreAssocie()->getTitre()}}</h2>
                </a>
                <ul class="livre__listeInfos">
                    @foreach($article->getLivreAssocie()->getAuteurAssocie() as $auteur)
                        <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                    @endforeach
                </ul>
            </section>
            <section class="panier__articleQuantite">
                <h4 class="screen-reader-only">Quantité</h4>
                <form id="modifierQuantite{{$article->getId()}}" action="index.php?controleur=panier&action=modifier" method="POST">
                    <legend class="visually-hidden">Formulaire de mise a jour de la quantité</legend>
                    <label for="livre_id" style="display: none">Id</label>
                    <input id="livre_id" type="hidden" name="livre_id" value="{{$article->getProduitId()}}">
                    <label for="panier_id" style="display: none">Id</label>
                    <input id="panier_id" type="hidden" name="panier_id" value="{{$article->getPanierId()}}">
                    <label for="quantite">Quantité :</label>
                    <select id="quantite" name="quantite" onchange="document.getElementById('modifierQuantite{{$article->getId()}}').submit()">
                        @for($i=0;$i <=10;$i++)
                            <option value="{{$i}}"
                                    @if($article->getQuantite() === $i) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                    {{--
                                            <input  class="bouton texte" type="submit" value="Mettre à jour le panier">
                    --}}
                </form>
                <p aria-label="Sous-total de l'article {{$article->getLivreAssocie()->getTitre()}}">{{number_format($article->getLivreAssocie()->getPrixCan() * $article->getQuantite(), 2)}}$</p>
            </section>
            <form class="panier__articleRetirer" action="index.php?controleur=panier&action=supprimer" method="POST">
                <label for="id" style="display: none">Id</label>
                <input id="id" type="hidden" name="id" value="{{$article->getId()}}">
                <input class="bouton texte destructif" type="submit" value="Retirer l'article du panier">
            </form>
        </article>
    @endforeach
    <table class="panier__tableauSousTotal">
        <tr>
            <td>Sous-total ({{$nombreArticles}} articles)</td>
            <td>{{number_format($prixTotal, 2)}}$</td>
        </tr>
        <tr>
            <td>Frais de livraison estimé</td>
            <td>0.00$</td>
        </tr>
        <tr>
            <td>Date de livraison estimée</td>
            <td>4 décembre 2021</td>
        </tr>
        <tr>
            <td>Total estimé</td>
            <td><p>{{number_format($prixTotal * 1.05, 2)}}$</p>
                <p>Une taxe fédérale de 5% s’appliquera à l’achat des livres</p></td>
        </tr>
    </table>
    <a class="panier__continuerAchats bouton texte" href="index.php?controleur=livre&action=index">Continuer à magasiner</a>
    <a class="panier__continuerAchats bouton texte" href="index.php?controleur=stepLeft&action=debuterStepLeft"><button class="panier__passerCommande bouton" type="button">Passer la commande</button></a>
</section>

<div class="form-wrap">
    <button id="btnContinuerEtape1" type="button" class="btnCommander">Continuer</button>
</div>