<section class="menu__entete">
    <div class="menu__listeLogo">
        <a href="index.php?controleur=site&action=accueil"><img class="menu__logo" src="liaisons/images/logotype-pasteque.png" width="200px"></a>
    </div>
    <section class="menu__topNavEntete topNavTable">
        <ul class="nav topNavLink">
            <li id="search">
                <ul class="liste">
                    <li id="options">
                        <a href="#">Tout</a>
                        <ul class="subnav">
                            <li><a href="#">Bandes dessinés</a></li>
                            <li><a href="#">Bd jeunesse</a></li>
                            <li><a href="#">Livres illustrés</a></li>
                            <li><a href="#">Albums jeunesse</a></li>
                            <li><a href="#">Documentaires</a></li>
                            <li><a href="#">Divers</a></li>
                        </ul>
                    </li>
                    <form action="" method="get">
                        <input type="text" name="search_text" id="search_text" placeholder="Recherche"/>
                        <input type="button" name="search_button" id="search_button"></a>
                    </form>
                </ul>

            </li>

            <li class="menu__listeItem">
                <a href="index.php?controleur=livre&action=index" class="menu__lien">Livre</a>
            </li>
            <li class="menu__listeItem">
                <a href="index.php?controleur=site&action=accueil" class="menu__lien">Mon compte</a>
            </li>
        </ul>

    </section>
    <nav class="menu menu--ferme ">
        <ul class="menu__liste" id="menu__liste">
            <li class="menu__listeItem" id="accueil">
                <a href="index.php?controleur=site&action=accueil" class="menu__lien">Accueil</a>
            </li>
            <li class="menu__listeItem" id="livre">
                <a href="index.php?controleur=livre&action=index" class="menu__lien">Livre</a>
            </li>
            <li class="menu__listeItem" id="auteur">
                <a href="index.php?controleur=auteur&action=index" class="menu__lien">Artistes</a>
            </li>
            <li class="menu__listeItem">
                <a href="index.php?controleur=site&action=apropos" class="menu__lien" id="apropos">À propos</a>
            </li>
            <li class="menu__listeItem" id="galerie">
                <a href="" class="menu__lien">Galerie-boutique</a>
            </li>
            <li class="menu__listeItem" id="production">
                <a href="" class="menu__lien">Production La Pasteque</a>
            </li>
            <li class="menu__listeItem" id="personnaliser">
                <a href="" class="menu__lien">Personnaliser</a>
            </li>
            <li class="menu__listeItem" id="contact">
                <a href="" class="menu__lien">Contact</a>
            </li>
        </ul>
    </nav>
</section>
