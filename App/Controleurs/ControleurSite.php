<?php
declare(strict_types=1);

namespace App\Controleurs;

class ControleurSite
{

    public function __construct()
    {
    }

    public function entete(): void
    {
        echo "<h1>Page d'accueil</h1>";
        echo '<a href="index.php?controleur=site&action=accueil">Accueil</a></br>';
        echo '<a href="index.php?controleur=livre&action=index">Livres</a></br>';
        echo '<a href="index.php?controleur=auteur&action=index">Auteurs</a></br>';
        echo '<a href="index.php?controleur=site&action=apropos">À propos</a></br>';
    }


}

