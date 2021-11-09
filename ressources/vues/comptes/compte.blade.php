@extends('gabarit')
@section('classeMain')
    class="creation"
@endsection
@section('contenu')
    <div class="tabSection">
        <div class="tabSection__menu">
            <button class="tabSection__menuLink active" data-content="first">
                <span data-title="first">Connexion au compte</span>
            </button>
                <button class="tabSection__menuLink" data-content="second">
                    <span data-title="second">Création d'un compte</span>
                </button>
        </div>
        <div class="tabSection__bar">
            <div class="tabSection__barContent active" id="first">
                <div class="tabSection__texts">
                    <p class="tabSection__paragraph">
                    </p>
                </div>
            </div>

                <div class="tabSection__barContent" id="second">
                    <div class="tabSection__texts">
                    </div>
                </div>
        </div>
    </div>
@endsection

