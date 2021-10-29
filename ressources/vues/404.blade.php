@extends('gabarit')

@section('contenu')
    <section class="erreur">
        <h2 class="erreur__sousTitre">OUPS !</h2>
        <h1 class="erreur__titre">ERREUR 404</h1>
        <p>Il semblerait que vous soyez perdu !</p>
        <a href="index.php?controleur=site&action=accueil">Retourner à l'accueil</a>
    </section>

@endsection

