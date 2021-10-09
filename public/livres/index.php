<?php
?>
<html>
<head>

</head>
<body>
<header>

</header>
<main>
    <div class="conteneur">
        <section class="enveloppe">
            <h1 class="enveloppe__">Livres</h1>
            <p class="enveloppe__"><a  class="enveloppe__" href="#">Accueil</a> / <strong>Livres</strong></p>
            <bouton class="enveloppe__">Filtres</bouton>
            <ul class="enveloppe__">
                <li class="enveloppe__"><a class="enveloppe__">Tous</a></li>
                <!-- Foreach categorie categorie->nom -->
                <li class="enveloppe__"><a class="enveloppe__">categorie->nom</a></li>
            </ul>
            <!-- Vérification quel est actif -->
            <p class="enveloppe__">Changer pour une vue en liste : <a><img src="https://via.placeholder.com/40"></a></p>
            <p class="enveloppe__">Changer pour une vue en vignette : <a><img src="https://via.placeholder.com/40"></a></p>
            <form class="enveloppe__">
                <p class="formulaire__champEnveloppe">
                    <label class="" for="">Trier par : </label>
                    <select id="" class="">
                        <option class="">Categories A-Z</option>
                        <option class="">Categories Z-A</option>
                        <option class="">Livres A-Z</option>
                        <option class="">Livres Z-A</option>
                        <option class="">Auteurs A-Z</option>
                        <option class="">Auteurs Z-A</option>
                    </select>
                </p>
            </form>
            <p><strong>X résultats affichés</strong> de X résultats</p>

        </section>
        <section class="livres">
            <!-- Foreach livres -->
            <article class="livres__article">
                <h2 class="livres__titre">livre->titre</h2>
                <h3 class="livres__nouveaute">Nouveauté</h3>
                <img src="https://via.placeholder.com/150">
                <h3 class="livres__auteur">livres->auteurNom</h3>
                <h4 class="livres__prix">livres->prix_can</h4>
                <h4 class="livres__categorie">livres->categorieNom</h4>
            </article>
        </section>
    </div>
</main>
<footer>

</footer>
</body>
</html>
