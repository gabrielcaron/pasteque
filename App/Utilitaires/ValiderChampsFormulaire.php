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
    public static function validerFormulaire(array $tMessagesJson):array{
        $tDonnes = [];
        // À compléter...
        foreach (array_keys($tMessagesJson) as $champValide){
            if(isset($_POST[$champValide])){
                if($tMessagesJson[$champValide]['vide'] !== '' && ValiderChampsFormulaire::verifierSiChampVide($_POST[$champValide]) === false){
                    $tDonnes[$champValide] = ['valeur' => $_POST[$champValide], 'validation'=>false, 'message'=>$tMessagesJson[$champValide]['vide']];
                }
                elseif($tMessagesJson[$champValide]['pattern'] !== '' && ValiderChampsFormulaire::verifierSiRegexCorrect($champValide, $_POST[$champValide]) === false){
                    $tDonnes[$champValide] = ['valeur' => $_POST[$champValide], 'validation'=>false, 'message'=>$tMessagesJson[$champValide]['pattern']];
                }
                else{
                    $tDonnes[$champValide] = ['valeur' => $_POST[$champValide], 'validation'=>true, 'message'=>''];
                }
            }
            else{
                $tDonnes[$champValide] = ['valeur' => $_POST[$champValide], 'validation'=>false, 'message'=>$tMessagesJson[$champValide]['vide']];
            }
        }
        return $tDonnes;
    }

    public static function verifierErreurFormulaire(array $tDonnes):array{
        $tableauErreur = [];
        foreach ($tDonnes as $champ){
            if($champ['validation'] === false){
                array_push($tableauErreur, false);

            }
            else{
                array_push($tableauErreur, true);
            }
        }
        return $tableauErreur;
    }
}