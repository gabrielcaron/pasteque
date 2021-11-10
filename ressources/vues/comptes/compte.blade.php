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

                </div>
            </div>

                <div class="tabSection__barContent" id="second">
                    <div class="tabSection__texts">
                        <div id="champPseudonyme" class="champ champ--lg">
                            <div class="champ__boite">
                                <label for="pseudonyme" class="champ__etiquette">Pseudonyme</label>
                                <input class="champ__input" id="pseudonyme" name="pseudonyme" type="text"
                                       autocomplete="pseudonyme" required="required" aria-labelledby="messagesPseudonyme"
                                       pattern="^[a-zA-Z-_]{2,}$" min="2" />

                            </div>
                            <div id="messagesPseudonyme" class="champ__messages">
                                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                <p class="champ__message-aide">
                                    Le&nbsp;pseudonyme&nbsp;doit&nbsp;être&nbsp;composé&nbsp;<strong>d'au&nbsp;moins&nbsp;deux&nbsp;lettres.</strong>
                                    Utiliser&nbsp;des&nbsp;lettres,&nbsp;des&nbsp;traits&nbsp;d'union&nbsp;ou&nbsp;le&nbsp;tiret&nbsp;bas&nbsp;pour&nbsp; composer&nbsp;votre&nbsp;pseudonyme.
                                </p>
                            </div>
                        </div>

                        <div id="champPrenom" class="champ champ--lg">
                            <div class="champ__boite">
                                <label for="prenom" class="champ__etiquette">Prénom</label>
                                <input class="champ__input" id="prenom" name="prenom" type="text" autocomplete="prenom"
                                       required="required" aria-labelledby="messagesPrenom" />
                            </div>
                            <div id="messagesPrenom" class="champ__messages">
                                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                            </div>
                        </div>

                        <div id="champNom" class="champ champ--lg">
                            <div class="champ__boite">
                                <label for="nom" class="champ__etiquette">Nom de famille</label>
                                <input class="champ__input" id="nom" name="nom" type="text" autocomplete="family-name"
                                       required="required" aria-labelledby="messagesNom" />
                            </div>
                            <div id="messagesNom" class="champ__messages">
                                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                            </div>
                        </div>

                        <div id="champDate" class="champ champ--md">
                            <div class="champ__boite">
                                <label for="date" class="champ__etiquette">Date de naissance</label>
                                <input class="champ__input" type="date" id="date" name="date" min="1900-01-01"
                                       required="required" aria-labelledby="messagesDate" />
                            </div>
                            <div id="messagesDate" class="champ__messages">
                                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                <p class="champ__message-aide">
                                    L'âge&nbsp;requis pour&nbsp;s'inscrire est&nbsp;de&nbsp;18&nbsp;ans et&nbsp;plus.
                                </p>
                            </div>
                        </div>
                        <div id="champTelephone" class="champ champ--lg">
                            <div class="champ__boite">
                                <label for="telephone" class="champ__etiquette">Numéro de téléphone</label>
                                <input class="champ__input" id="telephone" name="telephone" type="text" autocomplete="telephone"
                                       required="required" aria-labelledby="messagesTelephone" pattern="^\d{3} \d{3}-\d{4}$"
                                />
                            </div>
                            <div id="messagesTelephone" class="champ__messages">
                                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                <p class="champ__message-aide">
                                    Exemple&nbsp;:&nbsp;123 456-7890
                                </p>
                            </div>
                        </div>
                        <div class="emailflex">
                            <div id="champEmail" class="champ champ--lg">
                                <div class="champ__boite">
                                    <label for="email" class="champ__etiquette">Courriel</label>
                                    <input class="champ__input" id="email" name="email" type="email" autocomplete="email"
                                           required="required" aria-labelledby="messagesEmail" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}$"
                                    />
                                </div>
                                <div id="messagesEmail" class="champ__messages">
                                    <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                </div>
                            </div>

                            <div id="champEmailConfirmation" class="champ champ--lg">
                                <div class="champ__boite">
                                    <label for="emailConfirmation" class="champ__etiquette">Confirmation du courriel</label>
                                    <input class="champ__input" id="emailConfirmation" name="emailConfirmation" type="email" autocomplete="email"
                                           required="required" aria-labelledby="messagesEmail"
                                           à />
                                </div>
                                <div id="messagesEmailConfirmation" class="champ__messages">
                                    <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                </div>
                            </div>
                        </div>


                        <div id="champPassword" class="champ champ--lg">
                            <div class="champ__boite">
                                <label for="password" class="champ__etiquette">Créer un mot de passe</label>
                                <input class="champ__input" id="password" name="password" type="password" autocomplete="current-password"
                                       required="required" aria-labelledby="messagesPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_#!@$%?&*]).{8,}" min="8"/>
                            </div>
                            <div id="messagesPassword" class="champ__messages">
                                <p class="champ__message-erreur" aria-live="polite" aria-atomic="false"></p>
                                <p class="champ__message-aide">
                                    Le&nbsp;mot&nbsp;de&nbsp;passe&nbsp;doit&nbsp;contenir&nbsp;au&nbsp;moins&nbsp;huit&nbsp;caractères, dont&nbsp;au&nbsp;moins&nbsp;un&nbsp;chiffre&nbsp;et&nbsp;comprend&nbsp;les&nbsp;lettres majuscules&nbsp;et&nbsp;minuscules&nbsp;et&nbsp;des&nbsp;caractères&nbsp;spéciaux, par&nbsp;exemple&nbsp;#,&nbsp;?,&nbsp;!.
                                </p>
                            </div>
                        </div>
                        <section class="form__etape" data-etape="confirmation" style="display: none" tabindex="-1"
                                 aria-labelledby="titreConfirmation">
                            <h2 id="titreConfirmation" class="form__titre-etape">
                                Confirmation
                            </h2>
                            <p>Votre compte à bien été créé.</p>
                        </section>
                        <div class="form-wrap">
                            <button type="submit">S'inscrire</button>
                            <button type="reset">Réinitialiser</button>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection

