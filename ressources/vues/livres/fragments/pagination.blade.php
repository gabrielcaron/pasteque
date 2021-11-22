

    <!-- Si on est pas sur la première page et s'il y a plus d'une page -->
    @if ($numeroPage > 0)
        <a style="cursor: pointer;" onclick="document.getElementById('id_page').value = 0;document.getElementById('formTri').submit() ">1</a>
    @else
        <span style="color:#999">1</span> <!-- Bouton premier inactif -->
    @endif

    &nbsp;|&nbsp;

    @if ($numeroPage > 0)
        <a style="cursor: pointer;" onclick="document.getElementById('id_page').value = {{$numeroPage - 1}};document.getElementById('formTri').submit() ">Précédent</a>
    @else
        <span style="color:#999">Précédent</span><!-- Bouton précédent inactif -->
    @endif

    &nbsp;|&nbsp;

    <!-- Statut de progression: page 9 de 99 -->
    {{"Page " . ($numeroPage + 1) . " de " . ($nombreTotalPages + 1)}}

    &nbsp;|&nbsp;

    <!-- Si on est pas sur la dernière page et s'il y a plus d'une page -->
    @if ($numeroPage < $nombreTotalPages)
        <a style="cursor: pointer;" onclick="document.getElementById('id_page').value = {{$numeroPage +1}};document.getElementById('formTri').submit() " >Suivant</a>
    @else
        <span style="color:#999" >Suivant</span><!-- Bouton suivant inactif -->
    @endif

    &nbsp;|&nbsp;

    @if ($numeroPage < $nombreTotalPages)
        <a style="cursor: pointer;" onclick="document.getElementById('id_page').value = {{$nombreTotalPages}};document.getElementById('formTri').submit() ">{{$nombreTotalPages + 1}}</a>
    @else
        <span style="color:#999;">{{$nombreTotalPages + 1}}</span><!-- Bouton dernier inactif -->
    @endif



