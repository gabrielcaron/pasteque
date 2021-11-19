var formulaire = {
    refInput: null,
    refErreur: '',
    refChampErreur: null,
    refTableauChamp: ['prenom', 'nom', 'courriel', 'mot_de_passe'],
    validerInput: function (id) {
        console.log('hey');
        console.log(id);
        this.refInput = document.getElementById(id).querySelector('input');
        this.refChampErreur = document.getElementById(id).querySelector('.champ__message-erreur');
        for (var i = 0; i < this.refTableauChamp.length; i++) {
            if (this.refInput.hasAttribute('required') && this.refInput.value === '') {
                this.refErreur = "Le champ " + id + " est obligatoire.";
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
                    this.refErreur = "Veuillez verifier que la valeur du champ " + id + " correspond aux crit\u00E8res demand\u00E9s.";
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
