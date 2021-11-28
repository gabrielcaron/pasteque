<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Compte;
use App\Modeles\Livre;

class ControleurRequete
{
    public function __construct()
    {
        //vide
    }

    //Trouver Tout livre
    public function trouverToutLivre(){

        $livres = Livre::trouverTout();
        $livreEnvoyer = [];
        foreach ($livres as $livre) {
            $range = array('id'=>$livre->getId(), 'titre'=>$livre->getTitre());
            array_push($livreEnvoyer, $range);
        }
        header('Content-Type: application/json');
        echo json_encode($livreEnvoyer);
    }

    //Trouver adresse par tous les champs
    public function trouverAdresseParTousLesChamps(){

        $arrInfo = [$_GET['adresse'] ?? false, $_GET['ville'] ?? false, $_GET['province_id'] ?? false, $_GET['code_postal'] ?? false];

        $livres = Livre::trouverTout();
        $livreEnvoyer = [];
        foreach ($livres as $livre) {
            $range = array('id'=>$livre->getId(), 'titre'=>$livre->getTitre());
            array_push($livreEnvoyer, $range);
        }
        header('Content-Type: application/json');
        echo json_encode($livreEnvoyer);
    }

}