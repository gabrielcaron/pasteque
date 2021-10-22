@extends('gabarit')

@section('contenu')
    <section class="filAriane">
        <span>Accueil / Artistes / {{$auteur->getPrenom()}} {{$auteur->getNom()}}</span>
    </section>
    <section class="auteur">
        <div class="auteur__conteneur1">
            <h1 class="auteur__titreFiche">Fiche auteur</h1>
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
        @foreach($auteur->getLivresAssocies() as $livres)
            <div class="livre__reconnaissance">
                <p class="livre__reconnaissanceTexte">
                    {{$livres->getTitre()}}
                    <?php var_dump($livres);?>
                </p>
            </div>
        @endforeach
    </section>
@endsection

