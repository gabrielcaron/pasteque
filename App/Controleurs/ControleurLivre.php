<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\Modeles\Categorie;
use App\Modeles\Livre;
use App\Modeles\Reconnaissance;

class ControleurLivre
{
    public function __construct()
    {
        //vide
    }

    public function index(): void
    {
        $livres = Livre::trouverTout();
        $categories = Categorie::trouverTout();
        $nombreLivre = Livre::trouverNombreLivres();?>
            <main>
                <div class="conteneur">
                    <section class="enveloppe">
                        <h1 class="enveloppe__">Livres</h1>
                        <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Livres</strong></p>
                        <bouton class="enveloppe__">Filtres</bouton>
                        <ul class="enveloppe__">
                            <li class="enveloppe__"><a class="enveloppe__">Tous</a></li>
                            <!-- Foreach categorie categorie->nom -->
                            <?php foreach ($categories as $categorie) {?>
                                <li class="enveloppe__"><a class="enveloppe__"><?php echo $categorie->getNom() ?></a></li>
                            <?php }?>
                        </ul>
                        <!-- Vérification quel est actif -->
                        <p class="enveloppe__">Changer pour une vue en liste : <a><img src="https://via.placeholder.com/40"></a></p>
                        <p class="enveloppe__">Changer pour une vue en vignette : <a><img src="https://via.placeholder.com/40"></a></p>
                        <form class="enveloppe__">
                            <p class="formulaire__champEnveloppe">
                                <label class="" for="">Trier par : </label>
                                <select id="" class="">
                                    <option class="">Categories A-Z</option>
                                    <option class="">Categories Z-A</option>
                                    <option class="">Livres A-Z</option>
                                    <option class="">Livres Z-A</option>
                                    <option class="">Auteurs A-Z</option>
                                    <option class="">Auteurs Z-A</option>
                                </select>
                            </p>
                        </form>
                        <p><strong>X résultats affichés</strong> de <?php echo $nombreLivre ?> résultats</p>

                    </section>
                    <section class="livres">
                        <!-- Foreach livres -->
                        <?php foreach ($livres as $livre) {?>
                            <a href="index.php?controleur=livre&action=fiche&id=<?php echo $livre->getId() ?>">
                                <article class="livres__article">
                                    <h2 class="livres__titre"><?php echo $livre->getTitre()?></h2>
                                    <p class="livres__nouveaute">Nouveauté</p>
                                    <p class="livres__nouveaute">A parraitre</p>
                                    <img src="https://via.placeholder.com/150">
                                    <ul class="">
                                        <li class="livres__auteur"><?php echo $livre->getAuteurAssocie()->getPrenom() . ' ' . $livre->getAuteurAssocie()->getNom()?></li>
                                        <li class="livres__prix"><?php echo $livre->getPrixCan()?></li>
                                        <li class="livres__categorie"><?php echo $livre->getCategorieAssocie()->getNom()?></li>
                                    </ul>
                                </article>
                            </a>
                        <?php }?>
                    </section>
                </div>
            </main>

    <?php }

    public function fiche($livreChoisi):void
    {
        $livre = Livre::trouverParId($livreChoisi);
        $reconnaissance = Reconnaissance::trouverTout()?>

        <h1>Page fiche de l'activite</h1>
        <main>
            <section class="filAriane">
                <span>Accueil / Livre / Lartigues et Prévert</span>
            </section>
            <section class="livre">
                <div class="livre__conteneur1">
                    <img class="livre__conteneurImg" src="liaisons/images/9782897770013.jpg" width="50%">
                </div>
                <div class="livre__conteneur2">
                    <h1 class="livre__title"><?php echo $livre->getTitre() ?></h1>
                    <p class="livre__auteur"><?php echo $livre->getAuteurAssocie()->getNom() . ' ' . $livre->getAuteurAssocie()->getPrenom() ?></p>
                    <h2 class="livre__prixCan"><?php echo $livre->getPrixCan() ?></h2>
                    <span class="livre__prixEuro"><?php echo $livre->getPrixEuro() ?></span>

                    <div class="livre__ajout">
                        <div class="livre__ajoutQuantite">
                            <button class="plus-btn" type="button" name="button">+</button>
                            <input type="text" name="name" value="1">
                            <button class="minus-btn" type="button" name="button">-</button>
                        </div>
                        <div class="livers__ajoutPanier">
                            <button class="livre__ajoutPanierBtn">
                                AJOUTER AU PANIER
                            </button>
                        </div>
                    </div>
                    <nav class="livre__details">
                        <ul class="livre__detailsListe">
                            <li class="livre__detailsListeItem">Résumé</li>
                            <li class="livre__detailsListeItem">Critiques</li>
                            <li class="livre__detailsListeItem">Reconnaissance</li>
                        </ul>
                    </nav>
                    <div class="livre__resume">
                        <p class="livre__resumeTexte">
                            <?php echo $livre->getLeLivre() ?>
                        </p>
                    </div>
                    <div class="livre__critiques">
                        <p class="livre__critiquesTexte">
                            Nicolas Thibault<br>
                            Très bon livre! Super intéressant.
                            <br><br>
                            Gabriel Caron<br>
                            Ce livre est bon, mais sans plus.
                        </p>
                    </div>
                    <?php foreach ($livre -> getReconnaissanceAssocie() as $reconnaissanceLivre){ ?>
                            <div class="livre__reconnaissance">
                                <p class="livre__reconnaissanceTexte">
                                    <?php echo $reconnaissanceLivre->getReconnaissance() ?>
                                </p>
                            </div>
                        <?php } ?>
                </div>
            </section>
            <section class="informations">
                <h2 class="informations__titre">Informations</h2>
                <table class="informations__table">
                    <tr class="informations__tableRow">
                        <th class="informations__tableColumn">Titre</th>
                        <th class="informations__tableColumn"><?php echo $livre->getTitre() ?></th>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Auteur</td>
                        <td class="informations__tableColumn"><?php echo $livre->getAuteurAssocie()->getPrenom() . ' ' . $livre->getAuteurAssocie()->getNom() ?></td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Éditeur</td>
                        <td class="informations__tableColumn"><?php echo 'La Pastèque' ?></td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Prix canadien</td>
                        <td class="informations__tableColumn"><?php echo $livre->getPrixCan() ?></td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Prix européen</td>
                        <td class="informations__tableColumn"><?php echo $livre->getPrixEuro() ?></td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Catégorie</td>
                        <td class="informations__tableColumn"><?php echo $livre->getCategorieAssocie()->getNom() ?></td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Date de parution au Québec</td>
                        <td class="informations__tableColumn"><?php echo $livre->getDateParutionQuebec() ?></td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Format</td>
                        <td class="informations__tableColumn"><?php echo $livre->getFormat() ?></td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Langue</td>
                        <td class="informations__tableColumn">Français</td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">Nombre de page</td>
                        <td class="informations__tableColumn"><?php echo $livre->getPagination() ?></td>
                    </tr>
                    <tr class="informations__tableRow">
                        <td class="informations__tableColumn">ISBN</td>
                        <td class="informations__tableColumn"><?php echo $livre->getIsbnPapier() ?></td>
                    </tr>
                </table>
            </section>
            <section class="aDecouvrir">
                <h2 class="aDecouvrir__title">
                    Découvrir des livres similaires
                </h2>
                <div class="slide-container" style="width:80%;overflow: auto; white-space: nowrap;">
                    <img src="liaisons/images/9782897770013.jpg" width="25%" />
                    <img src="liaisons/images/9782897770013.jpg" width="25%" />
                    <img src="liaisons/images/9782897770013.jpg" width="25%" />
                    <img src="liaisons/images/9782897770013.jpg" width="25%" />
                    <img src="liaisons/images/9782897770013.jpg" width="25%" />
                    <img src="liaisons/images/9782897770013.jpg" width="25%" />
                    <img src="liaisons/images/9782897770013.jpg" width="25%" />
                    <img src="liaisons/images/9782897770013.jpg" width="25%" />
                </div>
            </section>
        </main><?php
    }

}

