@extends('gabarit')
@section('classeMain')
    class="panier"
@endsection
@section('contenu')
    <h1>Panier</h1>
    <div>
        <p>Sous-total ({{count($panier->getArticlesAssocies())}} articles) : </p>
    </div>
    <hr>
    @foreach($panier->getArticlesAssocies() as $article)
        <img>
        <h2>{{$article->getLivreAssocie()->getTitre()}}</h2>
        @foreach($article->getLivreAssocie()->getAuteurAssocie() as $auteur)
        <h3>{{$auteur->getPrenom()}} {{$auteur->getNom()}}</h3>
        @endforeach
        <ul>
            <li>Id : {{$article->getLivreAssocie()->getId()}}</li>
            <li>Titre : {{$article->getLivreAssocie()->getTitre()}}</li>
            <li>Prix (can) : {{$article->getLivreAssocie()->getPrixCan()}}</li>
            <li>Quantite : {{$article->getQuantite()}}</li>
            <li>Prix total pour l'article : {{$article->getLivreAssocie()->getPrixCan() * $article->getQuantite()}}</li>
        </ul>
        <form action="index.php?controleur=panier&action=modifier" method="POST">
            <fieldset>
                <legend>Formulaire de mise a jour de la quantité :</legend>
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
            </fieldset>
        </form>
        <form action="index.php?controleur=panier&action=supprimer" method="POST">
            <label for="id" style="display: none">Id</label>
            <input id="id" type="hidden" name="id" value="{{$article->getId()}}">
            <input type="submit" value="Retirer l'article du panier!">
        </form>
        <hr>
    @endforeach

@endsection