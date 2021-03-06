<?php
/**
 * @file Classe qui sert à démarrer la session, initialiser PDO, Blades One, et de router requete
 * @author @Nicolas Thibault <1635157@csfoy.ca>
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
 */
declare(strict_types=1);
namespace App;
use App\Controleurs\ControleurArticle;
use App\Controleurs\ControleurAuteur;
use App\Controleurs\ControleurCompte;
use App\Controleurs\ControleurInscription;
use App\Controleurs\ControleurLivre;
use App\Controleurs\ControleurPanier;
use App\Controleurs\ControleurRequete;
use App\Controleurs\ControleurSite;
use App\Controleurs\ControleurStepLeft;
use App\Controleurs\ControleurValiderCourriel;
use App\Modeles\Panier;
use eftec\bladeone\BladeOne;
use \PDO;

class App
{

    private static ?PDO $pdo = null;
    private static ?BladeOne $refBlade = null;

    public function __construct()
    {
        error_reporting(E_ALL | E_STRICT);
        date_default_timezone_set('America/Montreal');
        $this->demarrerSession();
        $this->routerRequete();
    }

    /**
     * Méthode pour faire démarrer la session et le panier
     * @return void
     */
    private function demarrerSession() : void
    {
        session_start();
        $nouveauProduit =  Panier::trouverParIdSession(session_id()) === null ? new Panier : Panier::trouverParIdSession(session_id());
        if (Panier::trouverParIdSession(session_id())===null) $nouveauProduit->setIdSession(session_id());
        $nouveauProduit->setDateUnix(time());
        Panier::trouverParIdSession(session_id()) === null ? $nouveauProduit->inserer() : $nouveauProduit->mettreAJour();
    }

    /**
     * Méthode pour faire l'utilisation de PDO
     * @return PDO|null - Ref de pdo
     */
    public static function getPDO(): ?PDO
    {
        if (App::$pdo === null) {
            $serveur = 'localhost';
            $utilisateur = 'root';
            $motDePasse = 'root';
            $nomBd = 'pasteque';
            $chaineDSN ="mysql:dbname=$nomBd;host=$serveur"; // Data Source Name
            // Tentative de connexion
            App::$pdo = new PDO($chaineDSN, $utilisateur, $motDePasse);
            // Changement d'encodage des caractères UTF-8
            App::$pdo->exec("SET NAMES utf8");
            // Affectation des attributs de la connexion : Obtenir des rapports d'erreurs et d'exception avec errorInfo()
            App::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return App::$pdo;
    }

    /**
     * Méthode pour faire l'utilisation de BladeOne
     * @return BladeOne - Ref de BladeOne
     */
    public static function getBlade():BladeOne
    {
        if(App::$refBlade === null){
            $cheminDossierVues = '../ressources/vues';
            $cheminDossierCache = '../ressources/cache';
            App::$refBlade = new BladeOne($cheminDossierVues,$cheminDossierCache,BladeOne::MODE_AUTO);
        }
        return App::$refBlade;
    }

    /**
     * Méthode pour faire le router dans l'app mono-page
     */
    public function routerRequete():void
    {
        $controleur = null;
        $action = null;
        $id = null;
        $classe = null;

        // Déterminer le controleur responsable de traiter la requête
        $controleur = $_GET['controleur'] ?? 'site';

        // Déterminer l'action du controleur
        $action = $_GET['action'] ?? 'accueil';

        // Déterminer l'id
        if (isset($_GET['id'])){
            $id = (int)$_GET['id'];
        }

        // Déterminer la classe si requete
        if (isset($_GET['classe'])){
            $classe = $_GET['classe'];
        }

        // Instantier le bon controleur selon la page demandée
        if ($controleur === 'livre'){
            $this->monControleur = new ControleurLivre();
            switch ($action) {
                case 'index':
                    $this->monControleur->index();
                    break;
                case 'fiche':
                    $this->monControleur->fiche($id);
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        } else if ($controleur === 'article') {
            $this->monControleur = new ControleurArticle();
            switch ($action) {
                case 'inserer':
                    $this->monControleur->inserer();
                    break;
                case 'insererJS':
                    $this->monControleur->insererEnJavaScript();
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        } else if ($controleur === 'panier') {
            $this->monControleur = new ControleurPanier();
            switch ($action) {
                case 'panier':
                    $this->monControleur->panier();
                    break;
                case 'modifier':
                    $this->monControleur->modifier();
                    break;
                case 'supprimer':
                    $this->monControleur->supprimer();
                    break;
                case 'confirmation':
                    $this->monControleur->confirmation();
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }

        }
        /*else if($controleur === 'inscription') {
            $this->monControleur = new ControleurInscription();
            switch ($action) {
                case 'creer':
                    $this->monControleur->creer();
                    break;
                case 'inserer':
                    $this->monControleur->inserer();
                    break;
                default:
                    echo 'Erreur 404';
            }
        }*/ else if ($controleur === 'auteur'){
            $this->monControleur = new ControleurAuteur();
            switch ($action) {
                case 'index':
                    $this->monControleur->index();
                    break;
                case 'fiche':
                    $this->monControleur->fiche($id);
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        }
        else if ($controleur === 'validercourriel'){
            $this->monControleur = new ControleurValiderCourriel();
            switch ($action) {
                case 'index':
                    $this->monControleur->index();
                    break;
                case 'connexion':
                    $this->monControleur->connexion();
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        }
        else if ($controleur === 'requete'){
            $this->monControleur = new ControleurRequete();
            switch ($classe) {
                case 'livre':
                    if ($action === 'trouverTout') {
                        $this->monControleur->trouverToutLivre();
                    }
                    if ($action === 'insererLivre') {
                        $this->monControleur->insererLivre();
                    }
                    break;
                case 'stepleft':
                    if ($action === 'trouverParChamp') {
                        $this->monControleur->trouverAdresseParTousLesChamps();
                    }
                    if ($action === 'insererAdresse') {
                        $this->monControleur->insererAdresse();
                    }
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        }
        else if ($controleur === 'compte'){
            $this->monControleur = new ControleurCompte();
            switch ($action) {
                case 'creation':
                    $this->monControleur->creation();
                    break;
                case 'connexion':
                    $this->monControleur->connexion();
                    break;
                case 'inserer':
                    $this->monControleur->inserer();
                    break;
                case 'deconnecter':
                    $this->monControleur->deconnecter();
                    break;
                case 'connecter':
                    $this->monControleur->connecter();
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        } else if ($controleur === 'stepLeft'){
            $this->monControleur = new ControleurStepLeft();
            switch ($action) {
                case 'debuterStepLeft':
                    $this->monControleur->debuterStepLeft();
                    break;
                case 'inserer':
                    $this->monControleur->inserer();
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        } else if ($controleur === 'site'){
            $this->monControleur = new ControleurSite();
            switch ($action) {
                case 'accueil':
                    $this->monControleur->accueil();
                    break;
                case 'apropos':
                    $this->monControleur->apropos();
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        } else {
            $this->monControleur=new ControleurSite();
            $this->monControleur->erreur();
        }
    }

}
