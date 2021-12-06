<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Adresse;
use App\Modeles\Compte;
use App\Modeles\Livre;
use App\Modeles\Paiement;

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
        $adresse = Adresse::trouverParTousLesChamps($_GET['adresse'], $_GET['ville'], intval($_GET['province_id']), $_GET['code_postal']);
        header('Content-Type: application/json');
        echo json_encode($adresse);
    }

    public function insererAdresse() {
        if (Adresse::trouverParTousLesChamps($_GET['adresse'], $_GET['ville'], intval($_GET['province_id']), $_GET['code_postal']) === null) {
            $adresse = new Adresse();
            $adresse->setAdresse($_GET['adresse']);
            $adresse->setVille($_GET['ville']);
            $adresse->setProvinceId(intval($_GET['province_id']));
            $adresse->setCodePostal($_GET['code_postal']);
            $adresse->inserer();
        }
    }

}