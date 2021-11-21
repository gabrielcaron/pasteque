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

}