<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>La Pastèque</title>
        <link href="liaisons/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="liaisons/images/faviconPasteque.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    </head>
    <body class="@yield('classeBody') js">
        <header class="entete">
            @include('fragments.entete')
        </header>

        <main @yield('classeMain')>
            @yield('contenu')
        </main>

        <footer class="footer">
            @include('fragments.infolettre')
            @include('fragments.pieddepage')
        </footer>
        @yield('scripts')
        <script src="liaisons/js/_menu.js"></script>
        <script src="liaisons/js/_tabsection.js"></script>
        <script src="liaisons/js/livres.ts"></script>
        <script src="liaisons/js/barreRecherche.js" type="text/javascript"></script>
        <script src="liaisons/js/productPage.js" type="text/javascript"></script>
        <script src="liaisons/js/validationFormulaire.js" type="text/javascript"></script>
        <script src="liaisons/js/fetchRequest.js" ></script>
        <script src="liaisons/js/compte.js" ></script>
        <script src="liaisons/js/password.js" ></script>
        <script src="liaisons/js/loader.js" ></script>
        <script src="liaisons/js/gestionStepLeft.js" type="text/javascript"></script>
        <script>
            document.body.classList.add('js');
        </script>
    </body>
</html>




