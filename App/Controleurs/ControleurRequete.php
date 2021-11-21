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

}