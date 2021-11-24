<?php
declare(strict_types=1);

namespace App\Controleurs;
use App\App;
use App\Modeles\Compte;
use App\Modeles\Panier;

class ControleurCompte
{

    public function __construct()
    {
        //vide
    }

    //Creation de compte
    public function creation(): void
    {
        $exist = '';
        if ($_GET['erreur']){
            $exist = $_GET['erreur'];
        }
        $tDonnees = array("titrePage"=>"creation", "classeBody"=>"creation", "action"=>"creation", "erreur"=>"$exist");
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
        // 1) Recevoir les donnees d'un formulaire de creation
        // $_GET super global donnant acces a la query string
        // $_POST donne accees aux donnees envoyé par un formulaire en post
        // $_COOKIE super global qui permet de recevoir les donnees client
        var_dump($_POST);
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
        $_SESSION['prenom'] = $_POST['prenom'];

        // Rediriger
        header('Location: index.php?controleur=site&action=accueil');
    }
}
