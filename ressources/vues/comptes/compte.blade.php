@extends('gabarit')
@section('classeBody')
    creation
@endsection
@section('contenu')
    <section class="compte">
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
                        <form id="connexionForm" name="inscription" class="form" method="POST" action="index.php?controleur=site&action=accueil" novalidate onsubmit="return formulaire.validerConnexion()">
                            <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1"
                                 role="alert"></div>
                            <section class="compte__flex">
                            <div id="champConnexionEmail" class="champ champ--lg">
                                <div class="champ__boite">
                                    <label for="connexionEmail" class="champ__etiquette">Entrez votre courriel *</label>
                                    <input class="champ__input" id="connexionEmail" name="email" type="email"
                                           autocomplete="email"
                                           required="required" aria-labelledby="messagesEmail"
                                           pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}$"
                                    />
                                </div>
                                <div id="messagesConnexionEmail" class="champ__messages">
                                    <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                </div>
                            </div>
                            <div id="champPasswordConnexion" class="champ champ--lg">
                                <div class="champ__boite">
                                    <label for="connexionPassword" class="champ__etiquette">Entrez votre mot de passe *</label>
                                    <input class="champ__input" id="connexionPassword" name="password" type="password"
                                           autocomplete="current-password"
                                           required="required" aria-labelledby="messagesPassword"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_#!@$%?&*]).{8,}" min="8"/>
                                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer; margin-top: 10px"></i>
                                </div>
                                <div id="messagesConnexionPassword" class="champ__messages">
                                    <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
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
                                <button id="btnConnecter" type="submit" class="btnConnecter">Se connecter</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="tabSection__barContent" id="second">
                    <div class="tabSection__texts">
                        <form id="inscriptionForm" name="inscription" class="form" action="index.php?controleur=compte&action=inserer" method="POST" novalidate onsubmit="return formulaire.validerFormulaire()">

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
                                               required="required" aria-labelledby="messagesPrenom"/>
                                    </div>
                                    <div id="messagesPrenom" class="champ__messages">
                                        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                    </div>
                                </div>
                                <div id="champNom" class="champ champ--lg">
                                    <div class="champ__boite">
                                        <label for="nom" class="champ__etiquette">Nom *</label>
                                        <input class="champ__input" id="nom" name="nom" type="text"
                                               autocomplete="family-name"
                                               required="required" aria-labelledby="messagesNom"/>
                                    </div>
                                    <div id="messagesNom" class="champ__messages">
                                        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
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
                                                   pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}$"
                                            />
                                        </div>
                                        <div id="messagesEmail" class="champ__messages">
                                            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
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
                                                   min="8"/>
                                            <i class="far fa-eye" id="togglePasswordCreation" style="margin-left: -30px; cursor: pointer; margin-top: 10px"></i>
                                        </div>
                                        <div id="messagesPassword" class="champ__messages">
                                            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
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
                                <button id="btnInscrire" type="submit" value="Submit">S'inscrire</button>
                                <button id="btnReset" type="reset">Réinitialiser</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

