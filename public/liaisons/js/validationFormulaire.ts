let formulaire = {

    refInput: null,
    refErreur: '',
    refChampErreur: null,
    refTableauChamp: ['prenom', 'nom', 'email'],

    validerInput(id) {

        this.refInput = document.getElementById(id).querySelector('input');
        this.refChampErreur = document.getElementById(id).querySelector('.champ__message-erreur');

        for (let i = 0; i < this.refTableauChamp.length; i++) {

            if (this.refInput.hasAttribute('required') && this.refInput.value === '') {
                this.refErreur = `Le champ ${id} est obligatoire.`;
                this.refChampErreur.style = 'display:block;';
                document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
                //document.getElementById(id).querySelector('.champ__message-erreur');
                this.refErreur.display = 'block';
                document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;

                console.log('erreur');
            } else if (this.refInput.hasAttribute('pattern')) {
                let bool = this.validerAttributPattern(this.refInput.pattern, this.refInput.value)
                if (bool === false) {
                    this.refErreur = `Veuillez verifier que la valeur du champ ${id} correspond aux critères demandés.`;
                }
            }
        }
    },
    validerFormulaire() {
        console.log('ca marche');
        let formErreur = false;
        let tabErreur = [];
        for (let i = 0; i < this.refTableauChamp.length; i++) {

            console.log(this.refTableauChamp);
            //this.refChampErreur = document.getElementById(this.refTableauChamp[i]).value;
            //if (this.refChampErreur.value === '') {
            if(document.getElementById(this.refTableauChamp[i]).value === ''){
                tabErreur.push(true);

                //formulaire.validerInput(document.getElementById(this.refTableauChamp[i]));
            } else {
                tabErreur.push(false);
            }

        }
        alert(tabErreur);
        console.log(tabErreur.indexOf(true));

        if (tabErreur.indexOf(true) == -1){
            for (let i = 0; i < this.refTableauChamp.length; i++) {
                formErreur = true;

                formulaire.validerInput(document.getElementById(this.refTableauChamp[i]));
            }
        }
        console.log(tabErreur);

        return formErreur;
    },
    validerAttributPattern(pattern, value): boolean {
        return new RegExp(pattern).test(value);
    },
    reinitialiserChamp(){
        for (let i = 0; i < this.refTableauChamp.length; i++) {
            console.log(this.refTableauChamp);
            document.getElementById(this.refTableauChamp[i]).value === '';
        }
    },
}
//*******************
// Écouteurs d'événements
//*******************

document.getElementById('prenom').addEventListener('change', function () {
    formulaire.validerInput('champPrenom')
});
document.getElementById('nom').addEventListener('change', function () {
    formulaire.validerInput('champNom')
});
document.getElementById('btnReset').addEventListener('reset', function () {
    formulaire.reinitialiserChamp()
});


