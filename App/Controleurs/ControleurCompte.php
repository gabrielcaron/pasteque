<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Compte;
use App\Modeles\Panier;
use App\Utilitaires\ValiderChampsFormulaire;

class ControleurCompte
{

    public function __construct()
    {
        //vide
    }

    //Creation de compte
    public function creation(): void
    {
        $tValidation = $_SESSION['tValidation'] ?? null;

        $_SESSION['tValidation'] = null;

        $exist = '';
        if ($_GET['erreur']){
            $exist = $_GET['erreur'];
        }
        $tDonnees = array("titrePage"=>"creation", "classeBody"=>"creation", "action"=>"creation", "erreur"=>"$exist", "tValidation" => $tValidation);
var_dump($tValidation);
        echo App::getBlade()->run("comptes.compte",$tDonnees);
    }

    //Connexion au compte
    public function connexion():void
    {
        $tDonnees = array("titrePage"=>"connexion", "classeBody"=>"connexion", "action"=>"connexion");
        echo App::getBlade()->run("comptes.compte",$tDonnees);
    }

    //Connection réussi
    public function connecter():void{
        $compte = Compte::trouverParCourriel($_POST['email']);
        $_SESSION['connected'] = true;
        $_SESSION['prenom'] = $compte->getPrenom();
        $_SESSION['email'] = $compte->getCourriel();
        header('Location: index.php?controleur=site&action=accueil');
    }

    //Deconnexion
    public function deconnecter():void{
        $_SESSION['connected'] = false;
        $_SESSION['prenom'] = '';
        header('Location: index.php?controleur=site&action=accueil');
    }

    //Inserer un compte
    public function inserer():void
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



        $tableauErreur = [];
        foreach ($tDonnes as $champ){
            if($champ['validation'] === false){
                array_push($tableauErreur, false);

            }
            else{
                array_push($tableauErreur, true);
            }

        }

        if(in_array(false, $tableauErreur)){
            $_SESSION['tValidation'] = $tDonnes;
            header('Location: index.php?controleur=compte&action=creation');
        }
        else{
            // 1) Recevoir les donnees d'un formulaire de creation
            // $_GET super global donnant acces a la query string
            // $_POST donne accees aux donnees envoyé par un formulaire en post
            // $_COOKIE super global qui permet de recevoir les donnees client
            // 2) Recevoir les infos
            // Très important pour la sécurité
            // NE JAMAIS FAIRE CONFIANCE AUX DONNEES PROVENANT DU CLIENT
            // PAS LE TEMPS DE FAIRE LA VALIDATION DANS LE COURS MAIS IMPORTANT!!!!!!!!
            $panier = Panier::trouverParIdSession(session_id());
            //$compte = Compte::trouverParIdSession(session_id());
            //if($compte === false){
            $monNouveauCompte = new Compte();
            // 3) Creer un objet de region a partir du model
            $monNouveauCompte->setNom($_POST['nom']);
            $monNouveauCompte->setPrenom($_POST['prenom']);
            $monNouveauCompte->setCourriel($_POST['courriel']);
            $monNouveauCompte->setMotDePasse($_POST['mot_de_passe']);
            $monNouveauCompte->setPanierId($panier->getId());
            // 4) Inserer cet objet dans la table region
            $monNouveauCompte->inserer();

            $_SESSION['connected'] = true;
            $_SESSION['prenom'] = $monNouveauCompte->getPrenom();
            $_SESSION['email'] = $monNouveauCompte->getCourriel();

            // Rediriger

            header('Location: index.php?controleur=site&action=accueil');
        }



    }
}
