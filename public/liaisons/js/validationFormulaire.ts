let formulaire = {

    refInput: null,
    refErreur: '',

    initialiser() {
        document.getElementById('prenom').addEventListener('change', this.validerInput('champPrenom'));
        console.log('erreur');
    },
    validerInput(id) {
        this.refInput = document.getElementById(id).querySelector('input');
        if (this.refInput.hasAttribute('required') && this.refInput.value === '') {
            this.refErreur = `Le champ ${id} est obligatoire.`;
            document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
            console.log('erreur');
        } else if (this.refInput.hasAttribute('pattern')) {
            let bool = this.validerAttributPattern(this.refInput.pattern, this.refInput.value)
            if (bool === false) {
                this.refErreur = `Veuillez verifier que la valeur du champ ${id} correspond aux critères demandés.`;
            }
        }
    },
    validerAttributPattern(pattern, value): boolean {
        return new RegExp(pattern).test(value);
    }
}
//*******************
// Écouteurs d'événements
//*******************
document.getElementById('testRequest').addEventListener('load', function () {
    formulaire.initialiser()
});


