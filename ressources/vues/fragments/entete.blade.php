<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1_Nike</title>
    <link href="liaisons/css/styles.css" rel="stylesheet" >
</head>
<body class="js">
<header class="menu__entete">
<nav class="menu menu--ferme">
    <ul class="menu__liste">
        <div class="menu__recherche">
            <input type="text" placeholder="Recherche" id="name" name="name" required minlength="4"
                   maxlength="50" size="10">
        </div>
        <li class="menu__listeItem">
            <a href="index.php?controleur=site&action=accueil" class="menu__lien">Accueil</a>
        </li>
        <li class="menu__listeItem">
            <a href="index.php?controleur=livre&action=index" class="menu__lien">Livre</a>
        </li>
        <li class="menu__listeItem">
            <a href="" class="menu__lien">Auteurs</a>
        </li>
        <li class="menu__listeItem">
            <a href="index.php?controleur=site&action=apropos" class="menu__lien">À propos</a>
        </li>
        <li class="menu__listeItem">
            <a href="" class="menu__lien">Galerie-boutique</a>
        </li>
        <li class="menu__listeItem">
            <a href="" class="menu__lien">Production La Pasteque</a>
        </li>
        <li class="menu__listeItem">
            <a href="" class="menu__lien">Personnaliser</a>
        </li>
        <li class="menu__listeItem">
            <a href="" class="menu__lien">Contact</a>
        </li>
    </ul>
</nav>
</header>