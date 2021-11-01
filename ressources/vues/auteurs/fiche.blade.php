@extends('gabarit')

@section('contenu')
    <section class="filAriane">
        <span>Accueil / Artistes / {{$auteur->getPrenom()}} {{$auteur->getNom()}}</span>
    </section>
    <h1 class="auteur__titreFiche">Artiste</h1>
    <section class="auteur">
        <div class="auteur__conteneur1">

            <img class="auteur__conteneurImg" src="liaisons/images/genevieveGodbout.png" width="20%">
        </div>
        <div class="auteur__conteneur2">
            <h2 class="auteur__nom">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</h2>
            <p class="auteur__site">Visiter son <a href="{{$auteur->getSiteWeb()}}" class="auteur__siteLien" target="_blank">site internet</a></p>
            <br>
            <h3 class="auteur__noticeTitre">Notice</h3>
            <p class="auteur__notice">{{$auteur->getNotice()}}</p>
        </div>
    </section>

    <section class="auteur__decouvrirLivre">
        <h2 class="auteur__decouvrirTitre">Découvrez ces livres</h2>
        <div class="auteur__decouvrirLivreConteneur">
        @foreach($auteur->getLivresAssocies() as $livres)
            <div class="auteur__decouvrirLivreCon">
                <div class="auteur__decouvrirLivreCard">
                    <a href="index.php?controleur=livre&action=fiche&id={{$livres->getId()}}"> <img class="auteur__decouvrirLivreImg" src="https://via.placeholder.com/350{{--{{$livres->getIsbnPapier()}}.jpg--}}" alt="{{$livres->getTitre()}}"></a>
                </div>
            </div>
        @endforeach
        </div>
    </section>
@endsection

