<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Compte;

class ControleurValiderCourriel
{
    public function __construct()
    {
        //vide
    }

    public function index(){

        $email = $_GET['courriel'];
        $isValid = Compte::courrielValide($email);

        header('Content-Type: application/json');

        echo json_encode(array('isValidEmail' => $isValid  ));
        exit;
    }

    public function connexion(){

        $email = $_GET['courriel'];
        $compte = Compte::trouverParCourriel($email);
        $courrielEnvoyer = [];
        $element = array('courriel'=>$compte->getCourriel(), 'motDePasse'=>$compte->getMotDePasse());
        array_push($courrielEnvoyer, $element);


        header('Content-Type: application/json');

        echo json_encode($courrielEnvoyer);
    }

}