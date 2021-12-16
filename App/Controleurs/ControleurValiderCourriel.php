<?php
/**
 * @file Controleur qui sert à gérer la validation courriel
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
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

    //Valider courriel
    public function index(){

        $email = $_GET['courriel'];
        $isValid = Compte::courrielValide($email);

        header('Content-Type: application/json');

        echo json_encode(array('isValidEmail' => $isValid  ));
        exit;
    }

    //Valider Mot de passe
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