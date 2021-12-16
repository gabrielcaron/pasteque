<?php
/**
 * @file Controleur qui sert à gérer les inscriptions
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 *
 */
declare(strict_types=1);

namespace App\Controleurs;

use App\App;
use App\Utilitaires\ValiderChampsFormulaire;

class ControleurInscription
{
    public function __construct()
    {

    }

    public function creer(): void
    {
        // À compléter...

        $tValidation = $_SESSION['tValidation'] ?? null;

        $_SESSION['tValidation'] = null;
        // <-modifier... juste pour que la démo fonctionne
        $tDonnees = ["tValidation" => $tValidation];
        var_dump($tValidation);
        echo App::getBlade()->run("inscriptions.creer",$tDonnees);
    }

    public function inserer(): void
    {
        // Récupérer le contenu des messages en format JSON
        $contenuBruteFichierJson = file_get_contents("../ressources/lang/fr_CA.UTF-8/messagesInscriptionValidation.json");
        // Convertir en tableau associatif
        $tMessagesJson = json_decode($contenuBruteFichierJson, true);
        $tDonnes = [];
        // À compléter...
        foreach (array_keys($tMessagesJson) as $champValide){
            if(isset($_POST[$champValide])){
                if($tMessagesJson[$champValide]['vide'] !== '' && ValiderChampsFormulaire::verifierSiChampVide($_POST[$champValide]) === false){
                    $tDonnes[$champValide] = ['valeur' => '', 'validation'=>false, 'message'=>$tMessagesJson[$champValide]['vide']];
                }
                elseif($tMessagesJson[$champValide]['pattern'] !== '' && ValiderChampsFormulaire::verifierSiRegexCorrect($champValide, $_POST[$champValide]) === false){
                    $tDonnes[$champValide] = ['valeur' => '', 'validation'=>false, 'message'=>$tMessagesJson[$champValide]['pattern']];
                }
                else{
                    $tDonnes[$champValide] = ['valeur' => '', 'validation'=>false, 'message'=>''];
                }
            }
            else{
                $tDonnes[$champValide] = ['valeur' => '', 'validation'=>false, 'message'=>$tMessagesJson[$champValide]['vide']];
            }
        }
        $_SESSION['tValidation'] = $tDonnes;
        header('Location: index.php?controleur=compte&action=creation');
    }
}