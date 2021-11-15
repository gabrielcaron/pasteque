<?php
declare(strict_types=1);
require_once('../vendor/autoload.php');
use App\Modeles\Livre;

$controleur = null;
$action = null;
$retournerContenu = null;

// Déterminer le controleur responsable de traiter la requête
$controleur = $_GET['controleur'] ?? 'livre';

// Déterminer l'action du controleur
$action = $_GET['action'] ?? 'trouverTout';

// Déterminer l'id
if (isset($_GET['id'])){
    $id = (int)$_GET['id'] ?? null;
}


// Instantier le bon controleur selon la page demandée
if ($controleur === 'livre'){
    if ($action === 'trouverTout') {
        $model = new Livre();
        $retournerContenu = $model->trouverTout();
    }
}



echo json_encode($retournerContenu);