@if($titre !== '') <h5>{{$titre}}</h5> @endif
@if($sousTitre !== '') <h6>{{$sousTitre}}</h6> @endif
<p><span id="{{$idUnique}}_recapAdresse">{{$adresse}}</span></p>
<p><span id="{{$idUnique}}_recapVille">{{$ville}}</span>
<span id="{{$idUnique}}_recapProvince">{{$provinceChoisi}}</span>
<span id="{{$idUnique}}_recapCodePostal">{{$codePostal}}</span></p>
