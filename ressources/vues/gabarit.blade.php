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
        <link rel="icon" type="image/svg+xml" href="./liaisons/images/favicon.svg">
        <link rel="icon" type="image/png" href="./liaisons/images/favicon.png">
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
        <script src="liaisons/js/barreRecherche.js" type="text/javascript"></script>
        <script>
            document.body.classList.add('js');
        </script>
    </body>
</html>




