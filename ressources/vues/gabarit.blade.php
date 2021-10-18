<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>La Pastèque</title>
        <link href="liaisons/css/styles.css" rel="stylesheet" />
    </head>
    <body class="js">
        <header class="menu__entete">
            @include('fragments.entete')
        </header>

        <main>
            @yield('contenu')
        </main>

        <footer>
            @include('fragments.pieddepage')
        </footer>
    </body>
</html>




