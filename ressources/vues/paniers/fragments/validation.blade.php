<section class="stepleft__section">
    <section class="stepleft__sectionForm">
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
                    <h2 class="panier__articleInfosTitre">{{$article->getLivreAssocie()->getTitre()}}</h2>
                    <ul class="livre__listeInfos">
                        @foreach($article->getLivreAssocie()->getAuteurAssocie() as $auteur)
                            <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                        @endforeach
                    </ul>
                </section>
                <section class="panier__articleQuantite">
                    <h4 class="screen-reader-only">Quantité</h4>
                        <input id="livre_id" type="hidden" name="livre_id" value="{{$article->getProduitId()}}">
                        <input id="panier_id" type="hidden" name="panier_id" value="{{$article->getPanierId()}}">
                        <input type="hidden" id="quantite" name="quantite" value="{{$article->getQuantite()}}">
                    <span>{{$article->getQuantite()}}</span>
                    <p aria-label="Sous-total de l'article {{$article->getLivreAssocie()->getTitre()}}">{{number_format($article->getLivreAssocie()->getPrixCan() * $article->getQuantite(), 2)}}$</p>
                </section>
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
    </section>
    <section class="stepleft__sectionForm">
        <button id="envoyerFormulaireStepLeft" type="submit">Passer la commande</button>
    </section>
</section>
