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
/**
 * @file Fichier js servant à la gestion des validations de formulaires
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @author @Nicolas Thibault <1635751@csfoy.ca>
 * @version 1.2.3
 *
 */
var formulaire = {
    refInput: null,
    refErreur: '',
    refChampErreur: null,
    refTableauChamp: ['prenom', 'nom', 'courriel'],
    refTableauChampGlobal: ['champPrenom', 'champNom', 'champEmail'],
    courrielValid: false,
    nombreErreur: 0,
    formulaireConnexionValide: false,
    validerCourriel: function (courriel) {
        return __awaiter(this, void 0, void 0, function () {
            var response;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0: return [4 /*yield*/, fetch("index.php?controleur=validercourriel&action=index&courriel=".concat(courriel))
                            .then(function (response) { return response.json(); })];
                    case 1:
                        response = _a.sent();
                        console.log(response);
                        if (response.isValidEmail === false) {
                            this.refChampErreur = document.getElementById('champEmail').querySelector('.champ__message-erreur');
                            this.refChampErreur.display = 'block';
                        }
                        console.log(response.isValidEmail);
                        return [2 /*return*/, response.isValidEmail];
                }
            });
        });
    },
    validerConnexionCourriel: function (courriel) {
        return __awaiter(this, void 0, void 0, function () {
            var response;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0: return [4 /*yield*/, fetch("index.php?controleur=validercourriel&action=connexion&courriel=".concat(courriel))
                            .then(function (response) { return response.json(); })];
                    case 1:
                        response = _a.sent();
                        return [2 /*return*/, response];
                }
            });
        });
    },
    validerConnexion: function () {
        var _this = this;
        this.refInput = document.getElementById('champConnexionEmail').querySelector('input');
        this.refChampErreur = document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur');
        this.refChampErreur.style = 'display:none;';
        document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').classList.remove('erreur');
        document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').innerHTML = '';
        if (this.refInput.required === true && this.refInput.value === '') {
            this.refErreur = "Le champ courriel est vide";
            this.refChampErreur.style = 'display:block;';
            document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').classList.add('erreur');
            document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').innerHTML = this.refErreur;
            this.formulaireConnexionValide = false;
        }
        else {
            this.validerCourriel(this.refInput.value).then(function (response) {
                if (response === true) {
                    _this.refErreur = "Le courriel n'existe pas dans nos serveurs.";
                    _this.refChampErreur.style = 'display:block;';
                    document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').classList.add('erreur');
                    document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').innerHTML = _this.refErreur;
                    _this.formulaireConnexionValide = false;
                }
                else {
                    _this.validerConnexionCourriel(_this.refInput.value).then(function (rep) {
                        _this.refInput = document.getElementById('champPasswordConnexion').querySelector('input');
                        _this.refChampErreur = document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur');
                        _this.refChampErreur.style = 'display:none;';
                        document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').classList.remove('erreur');
                        document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').innerHTML = '';
                        if (_this.refInput.required === true && _this.refInput.value === '') {
                            _this.refErreur = "Le champ mot de passe est vide";
                            _this.refChampErreur.style = 'display:block;';
                            document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').classList.add('erreur');
                            document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').innerHTML = _this.refErreur;
                            _this.formulaireConnexionValide = false;
                        }
                        else {
                            if (rep[0].motDePasse !== _this.refInput.value) {
                                _this.refErreur = "Le mot de passe n'est pas bon";
                                _this.refChampErreur.style = 'display:block;';
                                _this.refInput.innerHTML = '';
                                document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').classList.add('erreur');
                                document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').innerHTML = _this.refErreur;
                                _this.formulaireConnexionValide = false;
                            }
                            else {
                                _this.formulaireConnexionValide = true;
                            }
                        }
                    });
                }
            });
        }
        return this.formulaireConnexionValide;
    },
    validerInput: function (id) {
        var _this = this;
        this.refInput = document.getElementById(id).querySelector('input');
        this.refChampErreur = document.getElementById(id).querySelector('.champ__message-erreur');
        this.refChampErreur.style = 'display:none;';
        document.getElementById(id).querySelector('.champ__message-erreur').classList.remove('erreur');
        document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = '';
        if (this.refInput.hasAttribute('required') && this.refInput.value === '') {
            this.refErreur = "Le champ ".concat(id, " est obligatoire.");
            this.refChampErreur.style = 'display:block;';
            document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
            document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
        }
        else if (this.refInput.hasAttribute('pattern') && this.validerAttributPattern(this.refInput.pattern, this.refInput.value) === false) {
            var bool = this.validerAttributPattern(this.refInput.pattern, this.refInput.value);
            if (bool === false) {
                this.refErreur = "Veuillez verifier que la valeur du champ ".concat(id, " correspond aux crit\u00E8res demand\u00E9s.");
                this.refChampErreur.style = 'display:block;';
                document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
                document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
            }
        }
        else if (id === 'champEmail') {
            this.validerCourriel(this.refInput.value).then(function (response) {
                if (response === false) {
                    _this.courrielValid = false;
                    _this.refErreur = "Le courriel existe d\u00E9j\u00E0, veuillez en choisir un autre.";
                    _this.refChampErreur.style = 'display:block;';
                    document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
                    document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = _this.refErreur;
                }
                else {
                    _this.courrielValid = true;
                }
            });
        }
    },
    validerFormulaire: function () {
        var tabErreur = [];
        for (var i = 0; i < this.refTableauChampGlobal.length; i++) {
            this.validerInput(this.refTableauChampGlobal[i]);
            if (document.getElementById(this.refTableauChampGlobal[i]).querySelector('.champ__message-erreur').innerHTML === '') {
                if (this.refTableauChampGlobal[i] === 'champEmail' && this.courrielValid === false) {
                    tabErreur.push(false);
                }
                else {
                    tabErreur.push(true);
                }
            }
            else {
                tabErreur.push(false);
            }
        }
        return tabErreur.indexOf(false) === -1;
    },
    validerAttributPattern: function (pattern, value) {
        return new RegExp(pattern).test(value);
    },
    reinitialiserChamp: function () {
        for (var i = 0; i < this.refTableauChamp.length; i++) {
            document.getElementById(this.refTableauChamp[i]).innerHTML === '';
        }
    },
};
//*******************
// Écouteurs d'événements
//*******************
document.getElementById('prenom').addEventListener('change', function () {
    formulaire.validerInput('champPrenom');
});
document.getElementById('nom').addEventListener('change', function () {
    formulaire.validerInput('champNom');
});
document.getElementById('courriel').addEventListener('change', function () {
    formulaire.validerInput('champEmail');
});
document.getElementById('mot_de_passe').addEventListener('change', function () {
    formulaire.validerInput('champPassword');
});
document.getElementById('btnReset').addEventListener('reset', function () {
    formulaire.reinitialiserChamp();
});
