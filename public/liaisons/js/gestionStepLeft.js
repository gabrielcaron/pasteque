/**
 * TODO - Valider les champs
 */
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (_) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
/** Formulaire : Élément pouvant être en display none pour l'affichage du step-left **/
var refEtapeLivraison = document.getElementById('etapeLivraison');
var refEtapeFacturation = document.getElementById('etapeFacturation');
var refEtapeValidation = document.getElementById('etapeValidation');
var refSectionRecapAdresseLivraison = document.getElementById('sectionRecapAdresseLivraison');
var refSectionRecapAdresseFacturation = document.getElementById('sectionRecapAdresseFacturation');
var refSectionRecapPaiement = document.getElementById('sectionRecapPaiement');
var refSectionRecapPanier = document.getElementById('sectionRecapPanier');
var refSectionAdresseLivraison = document.getElementById('sectionAdresseLivraison');
var refSectionAdresseFacturation = document.getElementById('sectionAdresseFacturation');
var refSectionPaiementFacturation = document.getElementById('sectionPaiementFacturation');
var refSectionAnciennesAdressesLivraison = document.getElementById('sectionAncienneAdresseLivraison');
var refSectionRadioAnciennesAdressesLivraison = document.getElementById('sectionRadioAnciennesAdresses');
/** Livraison : Champs input de la section adresse **/
var refLivraisonInputAdresse = document.getElementById('livraison_adresse');
var refLivraisonInputVille = document.getElementById('livraison_ville');
var refLivraisonInputProvince = document.getElementById('livraison_province');
var refLivraisonInputCodePostal = document.getElementById('livraison_codePostal');
var refLivraisonMemeAdresse = document.getElementById('memeAdresse');
/** Facturation : Champs input de la section adresse **/
var refFacturationInputAdresse = document.getElementById('facturation_adresse');
var refFacturationInputVille = document.getElementById('facturation_ville');
var refFacturationInputProvince = document.getElementById('facturation_province');
var refFacturationInputCodePostal = document.getElementById('facturation_codePostal');
/** Facturation : Champs input de la section paiement **/
var refFacturationInputTitulaire = document.getElementById('facturation_nomTitulaire');
var refFacturationInputNumeroCarte = document.getElementById('facturation_numeroCarte');
var refFacturationInputMoisExpiration = document.getElementById('facturation_moisExpiration');
var refFacturationInputAnneeExpiration = document.getElementById('facturation_anneeExpiration');
var refFacturationInputCvv = document.getElementById('facturation_cvv');
/** Facturation : Paragraphes du recap de l'adresse de facturation **/
var refFacturationAdresseFacturationRecap = document.getElementById('facturationAdresseFacturation_recapAdresse');
var refFacturationVilleFacturationRecap = document.getElementById('facturationAdresseFacturation_recapVille');
var refFacturationProvinceFacturationRecap = document.getElementById('facturationAdresseFacturation_recapProvince');
var refFacturationCodePostalFacturationRecap = document.getElementById('facturationAdresseFacturation_recapCodePostal');
/** Validation : Paragraphes du recap de l'adresse de livraison **/
var refLivraisonAdresseValidationRecap = document.getElementById('livraisonAdresseLivraison_recapAdresse');
var refLivraisonVilleValidationRecap = document.getElementById('livraisonAdresseLivraison_recapVille');
var refLivraisonProvinceValidationRecap = document.getElementById('livraisonAdresseLivraison_recapProvince');
var refLivraisonCodePostalValidationRecap = document.getElementById('livraisonAdresseLivraison_recapCodePostal');
/** Validation : Paragraphes du recap du paiement facturation **/
var refFacturationTitulaireValidationRecap = document.getElementById('paiement_titulaire');
var refFacturationNumeroCarteValidationRecap = document.getElementById('paiement_numeroCarte');
var refFacturationMoisExpirationValidationRecap = document.getElementById('paiement_moisExpiration');
var refFacturationAnneeExpirationValidationRecap = document.getElementById('paiement_anneeExpiration');
var refFacturationCvvValidationRecap = document.getElementById('paiement_cvv');
/** Différents input caché du formulaire **/
var refNombresLivraisonsCompte = document.getElementById('nombreAnciennesAdresses');
var refLivraisonId = document.getElementById('livraison_id');
var refFacturationId = document.getElementById('facturation_id');
var refRadiosLivraisons = document.getElementsByName('ancienAdresses');
/** Gestion du step-left **/
var gestionStepLeft = {
    livraisonCompleted: false,
    facturationCompleted: false,
    tableauChampAdresseId: ['_champAdresse', '_champVille', '_champProvince', '_champCodePostal'],
    tableauInputAdresseId: ['adresse', 'ville', 'province', 'code postal'],
    tableauChampPaiementId: ['_champNomTitulaire', '_champNumeroCarte', '_champCvv'],
    tableauInputPaiementId: ['nom titulaire', 'numero de carte', 'cvv'],
    /** Initialisation du step-left **/
    initialiser: function () {
        gestionStepLeft.remettreAZero();
        if (refLivraisonInputAdresse.value === '') {
            refSectionAdresseLivraison.removeAttribute("style");
            document.getElementById('continuerLivraison').removeAttribute('style');
        }
        else if (refFacturationInputAdresse.value === '') {
            this.livraisonCompleted = true;
            refSectionAdresseFacturation.removeAttribute("style");
            document.getElementById('continuerFacturation').removeAttribute('style');
        }
        else {
            refSectionRecapAdresseLivraison.removeAttribute("style");
            refSectionRecapAdresseFacturation.removeAttribute("style");
            refSectionRecapPaiement.removeAttribute("style");
            refSectionRecapPanier.removeAttribute("style");
            this.livraisonCompleted = true;
            this.facturationCompleted = true;
        }
    },
    /** Continuer de la livraison vers facturation / validation **/
    continuerLivraison: function () {
        var _this = this;
        if (this.validerChampSectionAdresse('livraison') === true) {
            gestionStepLeft.remettreAZero();
            //this.options[this.selectedIndex].text
            //Validation : Mettre à jour recap adresse Livraison
            document.getElementById('continuerLivraison').style.display = 'none';
            refLivraisonAdresseValidationRecap.innerHTML = refLivraisonInputAdresse.value;
            refLivraisonVilleValidationRecap.innerHTML = refLivraisonInputVille.value;
            refLivraisonProvinceValidationRecap.innerHTML = refLivraisonInputProvince[refLivraisonInputProvince.value].text;
            refLivraisonCodePostalValidationRecap.innerHTML = refLivraisonInputCodePostal.value;
            this.ajouterLivraisonAncienAdresse();
            if (refLivraisonMemeAdresse.checked === true) {
                //Adresse identique
                refFacturationInputAdresse.value = refLivraisonInputAdresse.value;
                refFacturationInputVille.value = refLivraisonInputVille.value;
                refFacturationInputProvince.value = refLivraisonInputProvince.value;
                refFacturationInputCodePostal.value = refLivraisonInputCodePostal.value;
                //Facturation Mettre à jour recap adresse Facturation
                refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
                refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
                refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince[refFacturationInputProvince.value].text;
                refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;
            }
            if (this.livraisonCompleted === false) {
                this.livraisonCompleted = true;
                refSectionRecapAdresseLivraison.removeAttribute("style");
                if (refLivraisonMemeAdresse.checked === true) {
                    refSectionRecapAdresseFacturation.removeAttribute("style");
                    refSectionPaiementFacturation.removeAttribute("style");
                }
                else {
                    refSectionAdresseFacturation.removeAttribute("style");
                    refSectionPaiementFacturation.removeAttribute("style");
                }
            }
            else {
                refSectionRecapAdresseLivraison.removeAttribute("style");
                refSectionRecapAdresseFacturation.removeAttribute("style");
                refSectionRecapPaiement.removeAttribute("style");
                refSectionRecapPanier.removeAttribute("style");
            }
            this.ajouterAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                .then(function (response) {
                _this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                    .then(function (response) {
                    console.log(response);
                    refLivraisonId.value = response;
                });
            });
        }
    },
    /** Continuer de adresse Facturation vers paiement Facturation **/
    continuerAdresseFacturation: function () {
        var _this = this;
        if (this.validerChampSectionAdresse('facturation') === true) {
            gestionStepLeft.remettreAZero();
            //Facturation Mettre à jour recap adresse Facturation
            refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
            refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
            refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince[refFacturationInputProvince.value].text;
            refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;
            if (this.facturationCompleted === false) {
                refSectionRecapAdresseLivraison.removeAttribute("style");
                refSectionRecapAdresseFacturation.removeAttribute("style");
                refSectionPaiementFacturation.removeAttribute("style");
            }
            else {
                refSectionRecapAdresseLivraison.removeAttribute("style");
                refSectionRecapAdresseFacturation.removeAttribute("style");
                refSectionRecapPaiement.removeAttribute("style");
                refSectionRecapPanier.removeAttribute("style");
            }
            this.ajouterAdresse(refFacturationInputAdresse.value, refFacturationInputVille.value, parseInt(refFacturationInputProvince.value), refFacturationInputCodePostal.value)
                .then(function (response) {
                _this.trouverIdAdresse(refFacturationInputAdresse.value, refFacturationInputVille.value, parseInt(refFacturationInputProvince.value), refFacturationInputCodePostal.value)
                    .then(function (response) {
                    console.log(response);
                    refFacturationId.value = response;
                });
            });
        }
    },
    /** Continuer de facturation vers validation **/
    continuerFacturation: function () {
        if (this.validerChampSectionAdresse('paiement') === true) {
            gestionStepLeft.remettreAZero();
            //Validation : Mettre à jour recap paiement Facturation
            refFacturationTitulaireValidationRecap.innerHTML = refFacturationInputTitulaire.value;
            refFacturationNumeroCarteValidationRecap.innerHTML = refFacturationInputNumeroCarte.value;
            refFacturationMoisExpirationValidationRecap.innerHTML = refFacturationInputMoisExpiration.value;
            refFacturationAnneeExpirationValidationRecap.innerHTML = refFacturationInputAnneeExpiration.value;
            refFacturationCvvValidationRecap.innerHTML = refFacturationInputCvv.value;
            this.facturationCompleted = true;
            refSectionRecapAdresseLivraison.removeAttribute("style");
            refSectionRecapAdresseFacturation.removeAttribute("style");
            refSectionRecapPaiement.removeAttribute("style");
            refSectionRecapPanier.removeAttribute("style");
        }
    },
    /** Ajouter une adresse de Livraison **/
    ajouterLivraison: function () {
        gestionStepLeft.remettreAZero();
        refLivraisonInputAdresse.value = '';
        refLivraisonInputVille.value = '';
        refLivraisonInputProvince.value = '';
        refLivraisonInputCodePostal.value = '';
        refSectionAdresseLivraison.removeAttribute("style");
        document.getElementById('ajouterLivraison').removeAttribute("style");
        document.getElementById('annulerAjouterLivraison').removeAttribute("style");
        document.getElementById('continuerLivraison').style.display = 'none';
    },
    /** Confirmer ajouter une adresse de Livraison **/
    confirmerAjouterLivraison: function () {
        var _this = this;
        if (gestionStepLeft.validerChampSectionAdresse('livraison') === true) {
            gestionStepLeft.remettreAZero();
            document.getElementById('continuerLivraison').removeAttribute("style");
            refSectionAnciennesAdressesLivraison.removeAttribute("style");
            //Validation : Mettre à jour recap adresse Livraison
            refLivraisonAdresseValidationRecap.innerHTML = refLivraisonInputAdresse.value;
            refLivraisonVilleValidationRecap.innerHTML = refLivraisonInputVille.value;
            refLivraisonProvinceValidationRecap.innerHTML = refLivraisonInputProvince[refLivraisonInputProvince.value].text;
            refLivraisonCodePostalValidationRecap.innerHTML = refLivraisonInputCodePostal.value;
            //console.log(refLivraisonInputProvince[parseInt(refFacturationInputProvince.value)-4].innerHTML);
            if (refLivraisonMemeAdresse.checked === true) {
                //Adresse identique
                refFacturationInputAdresse.value = refLivraisonInputAdresse.value;
                refFacturationInputVille.value = refLivraisonInputVille.value;
                refFacturationInputProvince.value = refLivraisonInputProvince.value;
                refFacturationInputCodePostal.value = refLivraisonInputCodePostal.value;
                //Facturation Mettre à jour recap adresse Facturation
                refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
                refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
                refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince[parseInt(refFacturationInputProvince.value) - 4].text;
                refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;
            }
            this.ajouterLivraisonAncienAdresse();
            this.ajouterAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                .then(function (response) {
                _this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                    .then(function (response) {
                    console.log(response);
                    refLivraisonId.value = response;
                });
            });
        }
    },
    annulerAjouterLivraison: function () {
        refRadiosLivraisons.forEach(function (radio) {
            console.log(radio.querySelector("input"));
        });
    },
    ajouterLivraisonAncienAdresse: function () {
        var refLi = document.createElement('li');
        var refInput = document.createElement('input');
        var refLabel = document.createElement('label');
        var refAdress = document.createElement('address');
        var refPId = document.createElement('p');
        var refPRue = document.createElement('p');
        var refPInfo = document.createElement('p');
        var refRue = document.createElement('span');
        var refVille = document.createElement('span');
        var refProvince = document.createElement('span');
        var refCodePostal = document.createElement('span');
        refInput.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_inputAdresse");
        refInput.setAttribute('type', 'radio');
        refInput.setAttribute('name', 'ancienAdresses');
        refInput.checked = true;
        refInput.addEventListener('click', function () { gestionStepLeft.changerSelected(event); });
        refInput.setAttribute('value', parseInt(refNombresLivraisonsCompte.value).toString());
        refLabel.setAttribute('for', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_inputAdresse");
        refAdress.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_radioAdresse");
        refRue.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_recapAdresse");
        refRue.setAttribute('data-rue', refLivraisonInputAdresse.value);
        refVille.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_recapVille");
        refVille.setAttribute('data-ville', refLivraisonInputVille.value);
        refProvince.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_recapProvince");
        refProvince.setAttribute('data-province', refLivraisonInputProvince.value);
        refCodePostal.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_recapCodePostal");
        refCodePostal.setAttribute('data-codePostal', refLivraisonInputCodePostal.value);
        refPId.innerHTML = 'NA';
        refRue.innerHTML = refLivraisonInputAdresse.value;
        refVille.innerHTML = refLivraisonInputVille.value + ', ';
        refProvince.innerHTML = refLivraisonInputProvince[refLivraisonInputProvince.value].text + ', ';
        refCodePostal.innerHTML = refLivraisonInputCodePostal.value;
        refPRue.prepend(refRue);
        refPInfo.prepend(refVille, refProvince, refCodePostal);
        refAdress.prepend(refPId, refPRue, refPInfo);
        refLabel.prepend(refAdress);
        refLi.prepend(refInput, refLabel);
        refSectionRadioAnciennesAdressesLivraison.prepend(refLi);
        refNombresLivraisonsCompte.value = (parseInt(refNombresLivraisonsCompte.value) + 1).toString();
    },
    /** Modifier une adresse de Livraison **/
    modifierLivraison: function () {
        gestionStepLeft.remettreAZero();
        refSectionAnciennesAdressesLivraison.removeAttribute("style");
    },
    /** Modifier une adresse de Facturation **/
    modifierAdresseFacturation: function () {
        gestionStepLeft.remettreAZero();
        refSectionAdresseFacturation.removeAttribute("style");
    },
    /** Modifier un paiement de Facturation **/
    modifierPaiementFacturation: function () {
        gestionStepLeft.remettreAZero();
        refSectionRecapAdresseFacturation.removeAttribute("style");
        refSectionPaiementFacturation.removeAttribute("style");
    },
    /** Changer le selected **/
    changerSelected: function (event) {
        var index = event.target.id.charAt(0);
        console.log(document.getElementById(index + '_livraisonAncienneAdresse_recapAdresse').innerHTML);
        refLivraisonInputAdresse.value = document.getElementById(index + '_livraisonAncienneAdresse_recapAdresse').getAttribute('data-rue');
        refLivraisonInputVille.value = document.getElementById(index + '_livraisonAncienneAdresse_recapVille').getAttribute('data-ville');
        refLivraisonInputProvince.value = document.getElementById(index + '_livraisonAncienneAdresse_recapProvince').getAttribute('data-province');
        refLivraisonInputCodePostal.value = document.getElementById(index + '_livraisonAncienneAdresse_recapCodePostal').getAttribute('data-codePostal');
        ;
        console.log(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value);
        this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
            .then(function (response) {
            console.log(response);
            refLivraisonId.value = response;
        });
    },
    validerChampSectionAdresse: function (livraisoFacturationOuPaiement) {
        var _this = this;
        var tableauErreur = [];
        var tableauValider = livraisoFacturationOuPaiement === 'paiement' ? this.tableauChampPaiementId : this.tableauChampAdresseId;
        var tableauRefNom = livraisoFacturationOuPaiement === 'paiement' ? this.tableauInputPaiementId : this.tableauInputAdresseId;
        var prefixe = livraisoFacturationOuPaiement === 'paiement' ? 'facturation' : livraisoFacturationOuPaiement;
        tableauValider.forEach(function (id, index) {
            _this.refInput = document.getElementById(prefixe + id).querySelector('input') === null ? document.getElementById(prefixe + id).querySelector('select') : document.getElementById(prefixe + id).querySelector('input');
            _this.refChampErreur = document.getElementById(prefixe + id).querySelector('.champ__message-erreur');
            _this.refInput.classList.remove('erreurInput');
            _this.refChampErreur.style = 'display:none;';
            document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.remove('erreur');
            document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = '';
            if (_this.refInput.hasAttribute('required') && _this.refInput.value === '') {
                _this.refInput.classList.add('erreurInput');
                _this.refErreur = "Le champ " + tableauRefNom[index] + " est obligatoire.";
                _this.refChampErreur.style = 'display:block;';
                document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.add('erreur');
                document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = _this.refErreur;
                tableauErreur.push(true);
            }
            else if (_this.refInput.hasAttribute('pattern') && _this.validerAttributPattern(_this.refInput.pattern, _this.refInput.value) === false) {
                var bool = _this.validerAttributPattern(_this.refInput.pattern, _this.refInput.value);
                if (bool === false) {
                    _this.refInput.classList.add('erreurInput');
                    _this.refErreur = "Veuillez verifier que la valeur du champ " + tableauRefNom[index] + " correspond aux crit\u00E8res demand\u00E9s.";
                    _this.refChampErreur.style = 'display:block;';
                    document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.add('erreur');
                    document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = _this.refErreur;
                    tableauErreur.push(true);
                }
            }
        });
        console.log(tableauErreur);
        return tableauErreur.length === 0;
    },
    validerAttributPattern: function (pattern, value) {
        return new RegExp(pattern).test(value);
    },
    ajouterAdresse: function (adresse, ville, province, codePostal) {
        var response = fetch("index.php?controleur=requete&classe=stepleft&action=insererAdresse&adresse=" + adresse + "&ville=" + ville + "&province_id=" + province + "&code_postal=" + codePostal);
        return response;
    },
    trouverIdAdresse: function (adresse, ville, province, codePostal) {
        return __awaiter(this, void 0, void 0, function () {
            var response;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0: return [4 /*yield*/, fetch("index.php?controleur=requete&classe=stepleft&action=trouverParChamp&adresse=" + adresse + "&ville=" + ville + "&province_id=" + province + "&code_postal=" + codePostal)
                            .then(function (response) { return response.json(); })];
                    case 1:
                        response = _a.sent();
                        console.log(response);
                        return [2 /*return*/, response];
                }
            });
        });
    },
    /** Remet à display none toutes les étapes et section d'étapes nécessaires **/
    remettreAZero: function () {
        refSectionRecapAdresseFacturation.style.display = 'none';
        refSectionRecapPaiement.style.display = 'none';
        refSectionRecapPanier.style.display = 'none';
        refSectionAdresseFacturation.style.display = 'none';
        refSectionPaiementFacturation.style.display = 'none';
        refSectionAnciennesAdressesLivraison.style.display = 'none';
        refSectionAdresseLivraison.style.display = 'none';
        refSectionRecapAdresseLivraison.style.display = 'none';
        document.getElementById('ajouterLivraison').style.display = 'none';
        document.getElementById('annulerAjouterLivraison').style.display = 'none';
        document.getElementById('continuerLivraison').style.display = 'none';
        document.getElementById('continuerFacturation').style.display = 'none';
    },
};
/*************************************************************************************
************************ Écouteurs d'événements du step-left *************************
**************************************************************************************/
//Load
window.addEventListener('load', function () { gestionStepLeft.initialiser(); });
//Livraison : Écouteurs d'événements
document.getElementById('continuerLivraison').addEventListener('click', function () { gestionStepLeft.continuerLivraison(); });
document.getElementById('ajouterNouvelleAdresseLivraison').addEventListener('click', function () { gestionStepLeft.ajouterLivraison(); });
document.getElementById('ajouterLivraison').addEventListener('click', function () { gestionStepLeft.confirmerAjouterLivraison(); });
document.getElementById('annulerAjouterLivraison').addEventListener('click', function () { gestionStepLeft.annulerAjouterLivraison(); });
//Facturation : Écouteurs d'événements
document.getElementById('continuerAdresseFacturation').addEventListener('click', function () { gestionStepLeft.continuerAdresseFacturation(); });
document.getElementById('continuerFacturation').addEventListener('click', function () { gestionStepLeft.continuerFacturation(); });
//Validation : Écouteurs d'événements
document.getElementById('modifierAdresseLivraison').addEventListener('click', function () { gestionStepLeft.modifierLivraison(); });
document.getElementById('modifierAdresseFacturation').addEventListener('click', function () { gestionStepLeft.modifierAdresseFacturation(); });
document.getElementById('modifierPaiementFacturation').addEventListener('click', function () { gestionStepLeft.modifierPaiementFacturation(); });
//Radios
console.log(refRadiosLivraisons);
for (var i = 0; i < refRadiosLivraisons.length; i++) {
    refRadiosLivraisons[i].addEventListener('click', function () { gestionStepLeft.changerSelected(event); });
}
