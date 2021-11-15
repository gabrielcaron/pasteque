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
                        <form id="form" name="inscription" class="form" method="POST" action="#">
                            <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1"
                                 role="alert"></div>
                            <section class="compte__flex">
                            <div id="champEmail" class="champ champ--lg">
                                <div class="champ__boite">
                                    <label for="email" class="champ__etiquette">Entrez votre courriel</label>
                                    <input class="champ__input" id="email" name="email" type="email"
                                           autocomplete="email"
                                           required="required" aria-labelledby="messagesEmail"
                                           pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}$"
                                    />
                                </div>
                                <div id="messagesEmail" class="champ__messages">
                                    <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                </div>
                            </div>
                            <div id="champPassword" class="champ champ--lg">
                                <div class="champ__boite">
                                    <label for="password" class="champ__etiquette">Entrez votre mot de passe</label>
                                    <input class="champ__input" id="password" name="password" type="password"
                                           autocomplete="current-password"
                                           required="required" aria-labelledby="messagesPassword"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_#!@$%?&*]).{8,}" min="8"/>
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
                            <div class="infosSupplementaire">
                                <a href="#">Modalité d'utilisation du site</a>
                                <a href="#">Politique de confidentalité</a>
                            </div>
                            <div class="form-wrap">
                                <button type="submit">Se connecter</button>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="tabSection__barContent" id="second">
                    <div class="tabSection__texts">
                        <form id="form" name="inscription" class="form" method="POST" action="#">
                            <div id="messageErreurGeneral" class="form__message-erreur-general" tabindex="-1"
                                 role="alert"></div>
                            <div class="choixAvatar">
                                <label class="libelle" for="vignette">Choisir mon avatar</label>
                                <ul class="choixAvatar__liste">

                                    @for ($i = 1; $i <= 4; $i++)
                                        <li class="bloc">
                                            <input class="radio screen-reader-only" id="avatar{{$i}}" value="vignette"
                                                   name="choixAvatar" type="radio">
                                            <label class="libelle" for="vignette"><img class="choixAvatarImg"
                                                                                       src="liaisons/images/avatars/avatar{{$i}}.png"></label>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <section class="compte__prenomNom  compte__flex">
                                <div id="champPrenom" class="champ champ--lg">
                                    <div class="champ__boite">
                                        <label for="prenom" class="champ__etiquette">Prénom</label>
                                        <input class="champ__input" id="prenom" name="prenom" type="text"
                                               autocomplete="prenom"
                                               required="required" aria-labelledby="messagesPrenom"/>
                                    </div>
                                    <div id="messagesPrenom" class="champ__messages">
                                        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                    </div>
                                </div>

                                <div id="champNom" class="champ champ--lg">
                                    <div class="champ__boite">
                                        <label for="nom" class="champ__etiquette">Nom</label>
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
                                            <label for="email" class="champ__etiquette">Courriel</label>
                                            <input class="champ__input" id="email" name="email" type="email"
                                                   autocomplete="email"
                                                   required="required" aria-labelledby="messagesEmail"
                                                   pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}$"
                                            />
                                        </div>
                                        <div id="messagesEmail" class="champ__messages">
                                            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                        </div>
                                    </div>
                                <div id="champTelephone" class="champ champ--lg">
                                    <div class="champ__boite">
                                        <label for="telephone" class="champ__etiquette">Téléphone</label>
                                        <input class="champ__input" id="telephone" name="telephone" type="text"
                                               autocomplete="telephone"
                                               required="required" aria-labelledby="messagesTelephone"
                                               pattern="^\d{3} \d{3}-\d{4}$"
                                        />
                                    </div>
                                    <div id="messagesTelephone" class="champ__messages">
                                        <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                        <p class="champ__message-aide">
                                            Exemple&nbsp;:&nbsp;123 456-7890
                                        </p>
                                    </div>
                                </div>
                            </section>
                            <section class="compte__mdp">
                                <div class="compte__flex">
                                    <div id="champPassword" class="champ champ--lg">
                                        <div class="champ__boite">
                                            <label for="password" class="champ__etiquette">Créer un mot de passe</label>
                                            <input class="champ__input" id="password" name="password" type="password"
                                                   autocomplete="current-password"
                                                   required="required" aria-labelledby="messagesPassword"
                                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_#!@$%?&*]).{8,}"
                                                   min="8"/>
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
                                    <div id="champMdpConfirmation" class="champ champ--lg">
                                        <div class="champ__boite">
                                            <label for="mdpConfirmation" class="champ__etiquette">Veuillez confirmer
                                                votre
                                                mot de passe</label>
                                            <input class="champ__input" id="mdpConfirmation" name="mdpConfirmation"
                                                   type="password" autocomplete="current-password"
                                                   required="required" aria-labelledby="messagesPassword"
                                                   à/>
                                        </div>
                                        <div id="messagesEmailConfirmation" class="champ__messages">
                                            <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                        </div>
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
                                <button id="btnInscrire" type="submit">S'inscrire</button>
                                <button id="btnReset" type="reset">Réinitialiser</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

