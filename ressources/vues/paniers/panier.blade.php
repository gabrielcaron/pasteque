@extends('gabarit')
@section('classeMain')
    class="panier"
@endsection
@section('contenu')
    <h1>Mon Panier</h1>
    <div>
        <p>Sous-total ({{$nombreArticles}} articles) : {{number_format($prixTotal, 2)}}$</p>
        <p>Admissible à la livraison gratuite standard partout au Canada pour un achat de 60$ CDN et plus. </p>
    </div>
    <hr>
    <section>
        @foreach($panier->getArticlesAssocies() as $article)
            <article>
                <img>
                <h2>{{$article->getLivreAssocie()->getTitre()}}</h2>
                @foreach($article->getLivreAssocie()->getAuteurAssocie() as $auteur)
                    <h3>{{$auteur->getPrenom()}} {{$auteur->getNom()}}</h3>
                @endforeach
                <h4>Prix (can) : {{number_format($article->getLivreAssocie()->getPrixCan(), 2)}}$</h4>
                <h4>Quantite :</h4>
                <form action="index.php?controleur=panier&action=modifier" method="POST">
                    <legend class="visually-hidden">Formulaire de mise a jour de la quantité :</legend>
                    <label for="livre_id" style="display: none">Id</label>
                    <input id="livre_id" type="hidden" name="livre_id" value="{{$article->getLivreId()}}">
                    <label for="panier_id" style="display: none">Id</label>
                    <input id="panier_id" type="hidden" name="panier_id" value="{{$article->getPanierId()}}">
                    <label for="quantite">Quantité :</label>
                    <select id="quantite" name="quantite">
                        @for($i=0;$i <=10;$i++)
                            <option value="{{$i}}" @if($article->getQuantite() === $i) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                    <input type="submit" value="Mettre a jour le panier!">
                </form>
                <h4>Prix total pour l'article : {{number_format($article->getLivreAssocie()->getPrixCan() * $article->getQuantite(), 2)}}$</h4>
                <form action="index.php?controleur=panier&action=supprimer" method="POST">
                    <label for="id" style="display: none">Id</label>
                    <input id="id" type="hidden" name="id" value="{{$article->getId()}}">
                    <input type="submit" value="Retirer l'article du panier!">
                </form>
                <hr>
            </article>
        @endforeach
    </section>
    <section>
        <table>
            <tr>
                <td>Sous-total ({{$nombreArticles}} articles) :</td>
                <td>{{number_format($prixTotal, 2)}}$</td>
            </tr>
            <tr>
                <td>Frais de livraison estimé :</td>
                <td>0.00$</td>
            </tr>
            <tr>
                <td>Frais de taxes estimés :</td>
                <td>{{number_format($prixTotal * 0.05, 2)}}$</td>
            </tr>
            <tr>
                <td>Total estimé :</td>
                <td>{{number_format($prixTotal * 1.05, 2)}}$</td>
            </tr>
        </table>
        <p>Une taxe fédérale de 5% s’appliquera à l’achat des livres</p>
        <p>Date de livraison estimée: 25 novembre 2021</p>
    </section>
    <p><a href="index.php?controleur=livre&action=index">Continuer à magasiner</a></p>
    <button type="button">Passer la commande</button>

@endsection