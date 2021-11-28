@if($titre !== '') <h2>{{$titre}}</h2> @endif
@if($sousTitre !== '') <h3>{{$sousTitre}}</h3> @endif
<p id="{{$idUnique}}_recapAdresse">{{$adresse}}</p>
<p id="{{$idUnique}}_recapVille">{{$ville}}</p>
<p id="{{$idUnique}}_recapProvince">{{$provinceChoisi}}</p>
<p id="{{$idUnique}}_recapCodePostal">{{$codePostal}}</p>
