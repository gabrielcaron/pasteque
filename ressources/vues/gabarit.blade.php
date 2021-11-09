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

    </head>
    <body class="js">
        <header class="entete">
            @include('fragments.entete')
        </header>

        <main @yield('classeMain')>
            @yield('contenu')
            <section class="socialMedia">
            @include('fragments.infolettre')
            </section>
        </main>

        <footer class="footer">
            @include('fragments.pieddepage')
        </footer>
        <script src="liaisons/js/_menu.js"></script>
        <script src="liaisons/js/_tabsection.js"></script>
        <script src="liaisons/js/livres.ts"></script>
        <script src="liaisons/js/barreRecherche.js" type="text/javascript"></script>
        <script src="liaisons/js/productPage.js" type="text/javascript"></script>
        <script>
            document.body.classList.add('js');
        </script>
    </body>
</html>




