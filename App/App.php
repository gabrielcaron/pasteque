<?php
declare(strict_types=1);
namespace App;
use App\Controleurs\ControleurAuteur;
use App\Controleurs\ControleurCompte;
use App\Controleurs\ControleurLivre;
use App\Controleurs\ControleurSite;
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
        $this->routerRequete();
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

        // Déterminer le controleur responsable de traiter la requête
        $controleur = $_GET['controleur'] ?? 'site';

        // Déterminer l'action du controleur
        $action = $_GET['action'] ?? 'accueil';

        // Déterminer l'id
        if (isset($_GET['id'])){
            $id = (int)$_GET['id'];
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
        } else if ($controleur === 'auteur'){
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

        else if ($controleur === 'compte'){
            $this->monControleur = new ControleurCompte();
            switch ($action) {
                case 'creation':
                    $this->monControleur->creation();
                    break;
                case 'connexion':
                    $this->monControleur->connexion();
                    break;
                default:
                    $this->monControleur=new ControleurSite();
                    $this->monControleur->erreur();
            }
        }

        else if ($controleur === 'site'){
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
