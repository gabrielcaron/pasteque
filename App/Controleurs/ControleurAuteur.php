<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Categorie;
use App\Modeles\Auteur;

class ControleurAuteur
{
    public function __construct()
    {
        //vide
    }

    public function index(): void
    {
        $auteurs = Auteur::trouverTout();
        $tDonnees = array("titrePage"=>"Les auteurs", "action"=>"index", "auteurs"=>$auteurs);
        echo App::getBlade()->run("auteurs.index",$tDonnees);

    }

    public function fiche($auteurChoisi):void
    {
        $auteur = Auteur::trouverParId($auteurChoisi);
        $tDonnees = array("titrePage"=>"Auteur", "action"=>"fiche", "auteur"=>$auteur);
        echo App::getBlade()->run("auteurs.fiche",$tDonnees);
    }

}

