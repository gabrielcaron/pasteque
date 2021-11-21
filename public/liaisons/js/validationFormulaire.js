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
var formulaire = {
    refInput: null,
    refErreur: '',
    refChampErreur: null,
    refTableauChamp: ['prenom', 'nom', 'courriel', 'mot_de_passe'],
    validerCourriel: function (courriel) {
        return __awaiter(this, void 0, void 0, function () {
            var response, courrielExisteDeja;
            return __generator(this, function (_a) {
                switch (_a.label) {
                    case 0:
                        console.log(courriel);
                        return [4 /*yield*/, fetch("index.php?controleur=validercourriel&action=index&courriel=".concat(courriel))
                                .then(function (response) { return response.json(); })];
                    case 1:
                        response = _a.sent();
                        if (response.isValidEmail == false) {
                            courrielExisteDeja = document.getElementById('champEmail').querySelector('.champ__message-erreur').innerHTML = 'Le courriel entré existe déjà!';
                            console.log(courrielExisteDeja);
                            return [2 /*return*/, courrielExisteDeja];
                        }
                        console.log(response.isValidEmail);
                        return [2 /*return*/, response.isValidEmail];
                }
            });
        });
    },
    validerInput: function (id) {
        console.log('hey');
        console.log(id);
        this.refInput = document.getElementById(id).querySelector('input');
        this.refChampErreur = document.getElementById(id).querySelector('.champ__message-erreur');
        for (var i = 0; i < this.refTableauChamp.length; i++) {
            if (this.refInput.hasAttribute('required') && this.refInput.value === '') {
                this.refErreur = "Le champ ".concat(id, " est obligatoire.");
                this.refChampErreur.style = 'display:block;';
                document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
                //document.getElementById(id).querySelector('.champ__message-erreur');
                this.refErreur.display = 'block';
                document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
                console.log('erreur');
            }
            else if (this.refInput.hasAttribute('pattern')) {
                var bool = this.validerAttributPattern(this.refInput.pattern, this.refInput.value);
                if (bool === false) {
                    this.refErreur = "Veuillez verifier que la valeur du champ ".concat(id, " correspond aux crit\u00E8res demand\u00E9s.");
                }
            }
        }
    },
    validerFormulaire: function () {
        console.log('ca marche');
        var formErreur = false;
        var tabErreur = [];
        for (var i = 0; i < this.refTableauChamp.length; i++) {
            console.log(this.refTableauChamp);
            //this.refChampErreur = document.getElementById(this.refTableauChamp[i]).value;
            //if (this.refChampErreur.value === '') {
            if (document.getElementById(this.refTableauChamp[i]).value === '') {
                tabErreur.push(true);
                //formulaire.validerInput(document.getElementById(this.refTableauChamp[i]));
            }
            else {
                tabErreur.push(false);
            }
        }
        //alert(tabErreur);
        console.log(tabErreur.indexOf(true));
        if (tabErreur.indexOf(true) == -1) {
            for (var i = 0; i < this.refTableauChamp.length; i++) {
                formErreur = true;
                console.log(formulaire.validerInput(document.getElementById(this.refTableauChamp[i])));
            }
        }
        console.log(tabErreur);
        return formErreur;
    },
    validerAttributPattern: function (pattern, value) {
        return new RegExp(pattern).test(value);
    },
    reinitialiserChamp: function () {
        for (var i = 0; i < this.refTableauChamp.length; i++) {
            console.log(this.refTableauChamp);
            document.getElementById(this.refTableauChamp[i]).value === '';
        }
    },
};
//*******************
// Écouteurs d'événements
//*******************
document.getElementById('prenom').addEventListener('change', function () {
    formulaire.validerInput('champPrenom');
});
document.getElementById('connexionEmail').addEventListener('change', function () {
    formulaire.validerInput('champConnexionEmail');
});
document.getElementById('connexionPassword').addEventListener('change', function () {
    formulaire.validerInput('champPassword');
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
document.getElementById('courriel').addEventListener('blur', function (evt) {
    formulaire.validerCourriel(evt.target.value);
});
