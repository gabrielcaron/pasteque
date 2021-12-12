<section class="sectionFormulaire confirmation">
    <section id="sectionRecapPanier" class="stepleft__sectionForm">
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
                    <h3 class="panier__articleInfosTitre">{{$article->getLivreAssocie()->getTitre()}}</h3>
                    <ul class="livre__listeInfos">
                        @foreach($article->getLivreAssocie()->getAuteurAssocie() as $auteur)
                            <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                        @endforeach
                    </ul>
                    <p>{{number_format($article->getLivreAssocie()->getPrixCan(), 2)}}&nbsp;$</p>
                    <p>Quantité&nbsp;: {{$article->getQuantite()}}</p>
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
                <td>{{number_format($prixLivraison, 2)}}$</td>
            </tr>
            <tr>
                <td>Date de livraison estimée</td>
                <td>4 décembre 2021</td>
            </tr>
            <tr>
                <td>Total estimé</td>
                <td><p>{{number_format(($prixTotal + $prixLivraison) * 1.05, 2)}}$</p>
                    <p>Une taxe fédérale de 5% s’appliquera à l’achat des livres</p></td>
            </tr>
        </table>
    </section>
    <section class="stepleft__sectionForm">
        <button id="envoyerFormulaireStepLeft" type="submit" class="bouton action">Passer la commande</button>
    </section>
</section>
