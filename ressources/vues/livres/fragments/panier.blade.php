<div id="panier" class="modale">
    <div class="modale__conteneurBleed">
        <div class="modale__conteneurBleedTitre">
            <div class="modale__conteneurGrille">
                <h2 class="modale__titreH2">Livre ajouté au panier</h2>
                <a id="fermerModale" href="#" class="modale__fermer" aria-label="Masquer le panier">
                    <svg class="icone-fermer" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M45 4.53214L40.4679 0L22.5 17.9679L4.53214 0L0 4.53214L17.9679 22.5L0 40.4679L4.53214 45L22.5 27.0321L40.4679 45L45 40.4679L27.0321 22.5L45 4.53214Z"
                              fill="white"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="modale__conteneurBleed">
            <div class="modale__conteneurGrille infos">
                <div class="modale__conteneurRangee">
                    <picture class="livre__picture">
                        <!-- Image pour mobile, tablette et poste de table -->
                        <img class="livre__image etiquette"
                             src="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg"
                             srcset="../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-470.jpg 1x, ../public/liaisons/images/livres/{{$livre->getIsbnPapier()}}-940.jpg 2x"
                             alt="{{$livre->getTitre()}}">
                    </picture>
                    <section class="modale__infos">
                        <h3 class="modale__titreLivre">{{$livre->getTitre()}}</h3>
                        <ul class="livre__listeInfos">
                            @foreach($livre->getAuteurAssocie() as $auteur)
                                <li class="livre__item livre__auteur">{{$auteur->getPrenom()}} {{$auteur->getNom()}}</li>
                            @endforeach
                            <li class="livre__item livre__categorie">{{$livre->getPrixCan()}} $</li>
                            <li class="livre__item livre__categorie quantite"></li>
                        </ul>

                    </section>
                    <div class="modale__rangeeBoutons">
                        <a class="modale__boutonContinuer bouton texte" href="index.php?controleur=livre&action=index">Continuer à magasiner</a>
                        <a class="modale__bouton bouton" href="../public/index.php?controleur=panier&action=panier">Voir le panier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
