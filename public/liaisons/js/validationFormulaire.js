var formulaire = {
    refInput: null,
    refErreur: '',
    initialiser: function () {
        document.getElementById('prenom').addEventListener('change', this.validerInput('champPrenom'));
        console.log('erreur');
    },
    validerInput: function (id) {
        this.refInput = document.getElementById(id).querySelector('input');
        if (this.refInput.hasAttribute('required') && this.refInput.value === '') {
            this.refErreur = "Le champ " + id + " est obligatoire.";
            document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
            document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
            console.log('erreur');
        }
        else if (this.refInput.hasAttribute('pattern')) {
            var bool = this.validerAttributPattern(this.refInput.pattern, this.refInput.value);
            if (bool === false) {
                this.refErreur = "Veuillez verifier que la valeur du champ " + id + " correspond aux crit\u00E8res demand\u00E9s.";
            }
        }
    },
    validerAttributPattern: function (pattern, value) {
        return new RegExp(pattern).test(value);
    }
};
//*******************
// Écouteurs d'événements
//*******************
window.addEventListener('load', function () {
    formulaire.initialiser();
});
