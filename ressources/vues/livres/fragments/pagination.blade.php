

    <!-- Si on est pas sur la première page et s'il y a plus d'une page -->
    @if ($numeroPage > 0)
        <a class="bouton" onclick="document.getElementById('id_page').value = 0;document.getElementById('formTri').submit() ">1</a>
    @else
        <span class="bouton inactif">1</span> <!-- Bouton premier inactif -->
    @endif

    @if ($numeroPage > 0)
        <a class="bouton" onclick="document.getElementById('id_page').value = {{$numeroPage - 1}};document.getElementById('formTri').submit() ">Précédent</a>
    @else
        <span class="bouton inactif">Précédent</span><!-- Bouton précédent inactif -->
    @endif

    <!-- Statut de progression: page 9 de 99 -->
    <span>{{"Page " . ($numeroPage + 1) . " de " . ($nombreTotalPages + 1)}}</span>

    <!-- Si on est pas sur la dernière page et s'il y a plus d'une page -->
    @if ($numeroPage < $nombreTotalPages)
        <a class="bouton" onclick="document.getElementById('id_page').value = {{$numeroPage +1}};document.getElementById('formTri').submit() " >Suivant</a>
    @else
        <span class="bouton inactif">Suivant</span><!-- Bouton suivant inactif -->
    @endif

    @if ($numeroPage < $nombreTotalPages)
        <a class="bouton" onclick="document.getElementById('id_page').value = {{$nombreTotalPages}};document.getElementById('formTri').submit() ">{{$nombreTotalPages + 1}}</a>
    @else
        <span class="bouton inactif">{{$nombreTotalPages + 1}}</span><!-- Bouton dernier inactif -->
    @endif



