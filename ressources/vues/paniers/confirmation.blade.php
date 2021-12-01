@extends('gabarit--transaction')
@section('classeBody')
    confirmation
@endsection
@section('classeMain')
    class="contenu confirmation"
@endsection
@section('contenu')
    <h1>Confirmation de votre commande</h1>
    <p>Votre numéro de commande est le <strong>(Numéro de la commande)</strong></p>
    <section class="merci">
        <p>Bonjour (Nom de la personne),</p>
        <p>Merci d’avoir magasiné chez La Pastèque Éditeur.<br>
            Sachez que vous pouvez toujours commander nos livres chez votre libraire favori.</p>
        <p>La commande vous sera expédiée selon les modalités choisies. N’hésitez pas à consulter notre service à la
            clientèle pour plus d’informations relatives à votre commande ou votre compte.</p>
        <p>Vous recevrez une confirmation de votre commande par courriel.</p>
    </section>
    <section id="validationAdresseLivraison" class="validationAdresseLivraison">
        <section id="sectionRecapAdresseLivraison">
            {{--        @component('paniers.fragments.adresseRecap')--}}
            {{--            @slot('titre') Adresse de Livraison @endslot--}}
            {{--            @slot('sousTitre')  @endslot--}}
            {{--            @slot('idUnique') livraisonAdresseValidation @endslot--}}
            {{--            @slot('adresse') @if($livraison !== null) {{$livraison->getAdresse()}} @endif @endslot--}}
            {{--            @slot('ville') @if($livraison !== null) {{$livraison->getVille()}} @endif @endslot--}}
            {{--            @slot('provinceChoisi') @if($livraison !== null) {{$livraison->getProvinceAssocie()->getNom()}} @endif @endslot--}}
            {{--            @slot('codePostal') @if($livraison !== null) {{$livraison->getCodePostal()}} @endif @endslot--}}
            {{--        @endcomponent--}}
        </section>
    </section>
    <section id="validationAdressePaiement" class="validationAdressePaiement">
        <section id="sectionRecapAdresseFacturation">
            {{--        @component('paniers.fragments.adresseRecap')--}}
            {{--            @slot('titre') Informations de facturation @endslot--}}
            {{--            @slot('sousTitre') Adresse de facturation @endslot--}}
            {{--            @slot('idUnique') facturationAdresseValidation @endslot--}}
            {{--            @slot('adresse') @if($facturation !== null) {{$facturation->getAdresse()}} @endif @endslot--}}
            {{--            @slot('ville') @if($facturation !== null) {{$facturation->getVille()}} @endif @endslot--}}
            {{--            @slot('provinceChoisi') @if($facturation !== null) {{$facturation->getProvinceAssocie()->getNom()}} @endif @endslot--}}
            {{--            @slot('codePostal') @if($facturation !== null) {{$facturation->getCodePostal()}} @endif @endslot--}}
            {{--        @endcomponent--}}
        </section>
    </section>
    <section class="validationPanier">
        <h2>Détails de la commande</h2>
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
                <section class="panier__articleQuantite">
                    <h4 class="screen-reader-only">Quantité</h4>

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
        <a class="panier__continuerAchats bouton action" href="index.php?controleur=livre&action=index" onclick="window.print();">Imprimer le reçu</a>
        <a class="panier__continuerAchats bouton texte" href="index.php">Retourner à La Pastèque</a>
    </section>
@endsection
