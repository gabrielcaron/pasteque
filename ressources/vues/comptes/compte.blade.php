@extends('gabarit')
@section('classeBody')
    creation
@endsection
@section('contenu')

    <section class="compte">
        <input type="hidden" value="{{$action}}" id="connexionOuCreation">
        <div class="tabSection">
            <div class="tabSection__menu">
                <button class="tabSection__menuLink @if($action === 'connexion') active @endif" data-content="first">
                    <span data-title="first">Connexion au compte</span>
                </button>
                <button class="tabSection__menuLink @if($action === 'creation') active @endif" data-content="second">
                    <span data-title="second">Création d'un compte</span>
                </button>
            </div>
            <div class="tabSection__bar">
                <div class="tabSection__barContent @if($action === 'connexion') active @endif" id="first">
                    <div class="tabSection__texts">
                        <form id="connexionForm" name="inscription" class="form" method="POST" action="index.php?controleur=compte&action=connecter" novalidate onsubmit="return formulaire.validerConnexion()">
                            <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1"
                                 role="alert"></div>
                            <section class="compte__flex">
                            <div id="champConnexionEmail" class="champ champ--lg">
                                <div class="champ__boite">
                                    <label for="connexionEmail" class="champ__etiquette">Entrez votre courriel *</label>
                                    <input class="champ__input" id="connexionEmail" name="connexionEmail" type="email"
                                           autocomplete="email"
                                           required="required" aria-labelledby="messagesEmail"
                                           pattern="^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$"
                                           @if($tValidation !== null) value="{{$tValidation['connexionEmail']['valeur']}}" @endif
                                    />
                                </div>
                                <div id="messagesConnexionEmail" class="champ__messages">
                                    <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation['connexionEmail']['message'] !== '') style="display: block;" @endif>@if($tValidation !== null && $tValidation['connexionEmail']['message'] !== '') {{$tValidation['connexionEmail']['message']}} @endif</p>
                                </div>
                            </div>
                            <div id="champPasswordConnexion" class="champ champ--lg">
                                <div class="champ__boite">
                                    <label for="connexionPassword" class="champ__etiquette">Entrez votre mot de passe *</label>
                                    <input class="champ__input" id="connexionPassword" name="connexionPassword" type="password"
                                           autocomplete="current-password"
                                           required="required" aria-labelledby="messagesPassword"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_#!@$%?&*]).{8,}" min="8"
                                           @if($tValidation !== null) value="{{$tValidation['connexionPassword']['valeur']}}" @endif/>
                                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer; margin-top: 10px"></i>
                                </div>
                                <div id="messagesConnexionPassword" class="champ__messages">
                                    <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation['connexionPassword']['message'] !== '') style="display: block;" @endif>@if($tValidation !== null && $tValidation['connexionPassword']['message'] !== ''){{$tValidation['connexionPassword']['message']}}@endif</p>
                                </div>
                            </div>
                            </section>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                    Se souvenir de moi
                                </label>
                            </div>
                            <a id="mdpOublie" href="#">Mot de passe oublié?</a>
                            <div class="form-wrap">
                                <button id="btnConnecter" type="submit" class="bouton action">Se connecter</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="tabSection__barContent @if($action === 'creation') active @endif" id="second">
                    <div class="tabSection__texts">
                        <form id="inscriptionForm" name="inscription" class="form" action="index.php?controleur=compte&action=inserer" method="POST" novalidate >

                                <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1"
                                 role="alert">
                                    @if($erreur === 'exist')
                                        Désolé, ce courriel est déjà associer à un compte!
                                    @endif
                                </div>

                            <section class="compte__prenomNom  compte__flex">
                                <div id="champPrenom" class="champ champ--lg">
                                    <div class="champ__boite">
                                        <label for="prenom" class="champ__etiquette">Prénom *</label>
                                        <input  class="champ__input" id="prenom" name="prenom" type="text"
                                               autocomplete="prenom"
                                               required="required" aria-labelledby="messagesPrenom"
                                                pattern="^[ a-zA-ZÀ-ÿ\-‘]+$"
                                                @if($tValidation !== null) value="{{$tValidation['prenom']['valeur']}}" @endif/>
                                    </div>
                                    <div id="messagesPrenom" class="champ__messages">
                                        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"@if($tValidation !== null && $tValidation['prenom']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation['prenom']['message'] !== ''){{$tValidation['prenom']['message']}}@endif</p>
                                    </div>
                                </div>
                                <div id="champNom" class="champ champ--lg">
                                    <div class="champ__boite">
                                        <label for="nom" class="champ__etiquette">Nom *</label>
                                        <input class="champ__input" id="nom" name="nom" type="text"
                                               autocomplete="family-name"
                                               required="required" aria-labelledby="messagesNom"
                                               pattern="^[ a-zA-ZÀ-ÿ\-‘]+$"
                                               @if($tValidation !== null) value="{{$tValidation['nom']['valeur']}}" @endif/>
                                    </div>
                                    <div id="messagesNom" class="champ__messages">
                                        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation['nom']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation['nom']['message'] !== ''){{$tValidation['nom']['message']}}@endif</p>
                                    </div>
                                </div>
                            </section>
                            <section class="compte__telEmail compte__flex">
                                    <div id="champEmail" class="champ champ--lg">
                                        <div class="champ__boite">
                                            <label for="courriel" class="champ__etiquette">Courriel *</label>
                                            <input class="champ__input" id="courriel" name="courriel" type="email"
                                                   autocomplete="email"
                                                   required="required" aria-labelledby="messagesEmail"
                                                   pattern="^[a-zA-Z0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[.][a-zA-Z]{2,}$"
                                                   @if($tValidation !== null) value="{{$tValidation['courriel']['valeur']}}" @endif
                                            />
                                        </div>
                                        <div id="messagesEmail" class="champ__messages">
                                            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation['courriel']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation['courriel']['message'] !== ''){{$tValidation['courriel']['message']}}@endif</p>
                                        </div>
                                    </div>
                            </section>
                            <section class="compte__mdp compte__flex">
                                    <div id="champPassword" class="champ champ--lg">
                                        <div class="champ__boite">
                                            <label for="mot_de_passe" class="champ__etiquette">Créer un mot de passe *</label>
                                            <input class="champ__input" id="mot_de_passe" name="mot_de_passe" type="password"
                                                   autocomplete="current-password"
                                                   required="required" aria-labelledby="messagesPassword"
                                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_#!@$%?&*]).{8,}"
                                                   min="8"
                                                   @if($tValidation !== null) value="{{$tValidation['mot_de_passe']['valeur']}}" @endif/>
                                            <i class="far fa-eye" id="togglePasswordCreation" style="margin-left: -30px; cursor: pointer; margin-top: 10px"></i>
                                        </div>
                                        <div id="messagesPassword" class="champ__messages">
                                            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false" @if($tValidation !== null && $tValidation['mot_de_passe']['message'] !== '')style="display: block;"@endif>@if($tValidation !== null && $tValidation['mot_de_passe']['message'] !== ''){{$tValidation['mot_de_passe']['message']}}@endif</p>
                                            <p class="champ__message-aide">
                                                Le&nbsp;mot&nbsp;de&nbsp;passe&nbsp;doit&nbsp;contenir&nbsp;au&nbsp;moins&nbsp;huit&nbsp;caractères,
                                                dont&nbsp;au&nbsp;moins&nbsp;un&nbsp;chiffre&nbsp;et&nbsp;comprend&nbsp;les&nbsp;lettres
                                                majuscules&nbsp;et&nbsp;minuscules&nbsp;et&nbsp;des&nbsp;caractères&nbsp;spéciaux,
                                                par&nbsp;exemple&nbsp;#,&nbsp;?,&nbsp;!.
                                            </p>
                                        </div>
                                    </div>
                            </section>
                            <section class="form__etape" data-etape="confirmation" style="display: none" tabindex="-1"
                                     aria-labelledby="titreConfirmation">
                                <h2 id="titreConfirmation" class="form__titre-etape">
                                    Confirmation
                                </h2>
                                <p>Votre compte à bien été créé.</p>
                            </section>
                            <div class="form-wrap">
                                <button id="btnInscrire" class="bouton action" type="submit" value="Submit">S'inscrire</button>
                                <button id="btnReset" class="bouton" type="reset">Réinitialiser</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

