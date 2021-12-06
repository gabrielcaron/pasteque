@if($titre !== '') <h3 class="sectionFormulaire__sectionFormH3">{{$titre}}</h3> @endif
@if($sousTitre !== '') <h6>{{$sousTitre}}</h6> @endif
<p><span id="{{$idUnique}}_recapAdresse">{{$adresse}}</span></p>
<p><span id="{{$idUnique}}_recapVille">{{$ville}}</span>,
<span id="{{$idUnique}}_recapProvince">{{$provinceChoisi}}</span>,
<span id="{{$idUnique}}_recapCodePostal">{{$codePostal}}</span></p>
