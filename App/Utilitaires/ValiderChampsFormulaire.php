<?php
declare(strict_types=1);

namespace App\Utilitaires;

use App\App;

class ValiderChampsFormulaire
{
    public function __construct()
    {
        // Constructeur vide
    }
    public static function verifierSiChampVide(string $strChamp):bool{
        if($strChamp === ''){

            return false;
        }
        return true;

    }
    public static function verifierSiRegexCorrect(string $strChamp, string $strChampPost):bool{
        $rgx = [
            'prenom'=>'#^[ a-zA-ZÀ-ÿ\-‘]+$#',
            'nom'=>'#^[ a-zA-ZÀ-ÿ\-‘]+$#',
            'adresse'=>'#^[0-9]+[a-zA-ZÀ-ÿ0-9 \-]+$#',
            'ville'=>'#^[a-zA-ZÀ-ÿ0-9 \-]+$#',
            'pays'=>'',
            'code_postal'=>'#^[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]$#',
            'courriel'=>'#^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$#',
            'connexionEmail'=>'#^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$#',
            'connexionPassword'=>'#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_#!@$%?&*]).{8,}$#',
            'mot_de_passe'=>'#^[ a-zA-ZÀ-ÿ\-‘]+$#'
        ];
        return preg_match($rgx[$strChamp],$strChampPost) === 1;
    }
}