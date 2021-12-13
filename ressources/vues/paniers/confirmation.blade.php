@extends('gabarit--transaction')
@section('classeBody')
    confirmation
@endsection
@section('classeMain')
    class="contenu confirmation"
@endsection
@section('contenu')
    <div class="confirmation__conteneurGrille">
        <h1 class="confirmation__titreH1">Confirmation de votre commande</h1>
        <p>Votre numéro de commande est le <strong>(Numéro de la commande)</strong></p>
        <section class="merci">
            <p>Bonjour {{$compte->getPrenom()}},</p>
            <p>Merci d’avoir magasiné chez La Pastèque Éditeur.<br>
                Sachez que vous pouvez toujours commander nos livres chez votre libraire favori.</p>
            <p>La commande vous sera expédiée selon les modalités choisies. N’hésitez pas à consulter notre service à la
                clientèle pour plus d’informations relatives à votre commande ou votre compte.</p>
            <p>Vous recevrez une confirmation de votre commande par courriel.</p>
        </section>
        <section id="validationAdresseLivraison" class="validationAdresseLivraison">
            <section id="sectionRecapAdresseLivraison">
                <h2 class="confirmation__titreH2">Date de livraison estimée</h2>
                <p>Dimanche 19 décembre 2021</p>
                <h2 class="confirmation__titreH2">Mode de livraison</h2>
                <p>Régulière @if($prixLivraison === 0) gratuite @else au coût de 7.00$ @endif</p>
                <h2 class="confirmation__titreH2">Adresse de livraison de la commande</h2>
                <p><strong>{{$compte->getPrenom()}} {{$compte->getNom()}}</strong></p>
                <p>{{$livraison->getAdresse()}}</p>
                <p>{{$livraison->getVille()}}, {{$livraison->getProvinceAssocie()->getNom()}}</p>
                <p>{{$livraison->getCodePostal()}}</p>
            </section>
        </section>
        <section class="validationPanier">
            <h2 class="confirmation__titreH2">Détails de la commande</h2>
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
                            <h3 class="panier__articleInfosTitre">{{$article->getLivreAssocie()->getTitre()}}</h3>
                        </a>
                        <ul class="livre__listeInfos">
                            @foreach($article->getLivreAssocie()->getAuteurAssocie() as $auteur)
                                <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                            @endforeach
                        </ul>
                        <p>{{$article->getLivreAssocie()->getPrixCan()}}&nbsp;$</p>
                        <p>Quantité&nbsp;: {{$article->getQuantite()}}</p>
                    </section>
                </article>
            @endforeach
            <table class="panier__tableauSousTotal">
                <thead>
                <tr>
                    <th class="screen-reader-only">Récapitulatif de la commande</th>
                </tr>
                </thead>
                <tbody>
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
                    <td>19 décembre 2021</td>
                </tr>
                <tr>
                    <td>Total estimé</td>
                    <td><p>{{number_format(($prixTotal+$prixLivraison) * 1.05, 2)}}$</p></td>
                </tr>
                </tbody>
            </table>
            <a class="panier__continuerAchats bouton action" href="index.php?controleur=livre&action=index"
               onclick="window.print();">Imprimer le reçu</a>
            <a class="panier__continuerAchats bouton texte" href="index.php">Retourner à La Pastèque</a>
        </section>
    </div>
@endsection
