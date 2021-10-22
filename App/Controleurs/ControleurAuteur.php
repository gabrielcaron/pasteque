<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Auteur;
use App\Modeles\Livre;

class ControleurAuteur
{
    public function __construct()
    {
        //vide
    }

    public function index(): void
    {
        $intIdAuteur=1;
        if (isset($_GET['id_auteur'])!=0) $intIdAuteur=$_GET['id_auteur'];
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

