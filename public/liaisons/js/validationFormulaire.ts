let formulaire = {

    refInput: null,
    refErreur: '',
    refChampErreur: null,
    refTableauChamp: ['prenom', 'nom', 'courriel'],
    refTableauChampGlobal: ['champPrenom', 'champNom', 'champEmail'],
    courrielValid: false,
    nombreErreur: 0,


    async validerCourriel(courriel) {
        let response = await fetch(`index.php?controleur=validercourriel&action=index&courriel=${courriel}`)
                                .then(response=>response.json());
        console.log(response);
        if(response.isValidEmail === false){
            this.refChampErreur = document.getElementById('champEmail').querySelector('.champ__message-erreur');
            this.refChampErreur.display = 'block';
        }
        return response.isValidEmail
    },

    async validerConnexionCourriel(courriel) {
        let response = await fetch(`index.php?controleur=validercourriel&action=connexion&courriel=${courriel}`)
            .then(response => response.json())
        return response;
    },

    validerConnexion() {
        let formulaire = true;
        this.refInput = document.getElementById('champConnexionEmail').querySelector('input');
        this.refChampErreur = document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur');
        this.refChampErreur.style = 'display:none;';
        document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').classList.remove('erreur');
        document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').innerHTML = '';
        this.validerCourriel(this.refInput.value).then(response => {
            if (response === true) {
                this.refErreur = `Le courriel n'existe pas dans nos serveurs.`;
                this.refChampErreur.style = 'display:block;';
                document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').classList.add('erreur');
                document.getElementById('champConnexionEmail').querySelector('.champ__message-erreur').innerHTML = this.refErreur;
                formulaire = false;
            }
            else {
                this.validerConnexionCourriel(this.refInput.value).then(rep => {
                    this.refInput = document.getElementById('champPasswordConnexion').querySelector('input');
                    this.refChampErreur = document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur');
                    this.refChampErreur.style = 'display:none;';
                    document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').classList.remove('erreur');
                    document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').innerHTML = '';
                    if (rep[0].motDePasse !== this.refInput.value) {
                        this.refErreur = `Le mot de passe n'est pas bon`;
                        this.refChampErreur.style = 'display:block;';
                        this.refInput.innerHTML = '';
                        document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').classList.add('erreur');
                        document.getElementById('champPasswordConnexion').querySelector('.champ__message-erreur').innerHTML = this.refErreur;
                        formulaire = false;
                    }
                });
            }
        });
        return false/*formulaire*/;
    },

    validerInput(id) {
        /*alert('hey');*/
        this.refInput = document.getElementById(id).querySelector('input');
        this.refChampErreur = document.getElementById(id).querySelector('.champ__message-erreur');

        this.refChampErreur.style = 'display:none;';
        document.getElementById(id).querySelector('.champ__message-erreur').classList.remove('erreur');
        document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = '';

        if (this.refInput.hasAttribute('required') && this.refInput.value === '') {

            this.refErreur = `Le champ ${id} est obligatoire.`;
            this.refChampErreur.style = 'display:block;';
            document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
            document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;

        } else if (this.refInput.hasAttribute('pattern') && this.validerAttributPattern(this.refInput.pattern, this.refInput.value) === false) {

            let bool = this.validerAttributPattern(this.refInput.pattern, this.refInput.value)
            if (bool === false) {
                this.refErreur = `Veuillez verifier que la valeur du champ ${id} correspond aux critères demandés.`;
                this.refChampErreur.style = 'display:block;';
                document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
                document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
            }

        } else if (id === 'champEmail') {
            this.validerCourriel(this.refInput.value).then(response=>{
                if (response === false) {
                    this.courrielValid = false;
                    this.refErreur = `Le courriel existe déjà, veuillez en choisir un autre.`;
                    this.refChampErreur.style = 'display:block;';
                    document.getElementById(id).querySelector('.champ__message-erreur').classList.add('erreur');
                    document.getElementById(id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
                }
                else {
                    this.courrielValid=true;
                }
            });
        }
    },
    validerFormulaire() {
        let tabErreur = [];
        for (let i = 0; i < this.refTableauChampGlobal.length; i++) {
            this.validerInput(this.refTableauChampGlobal[i]);
            if(document.getElementById(this.refTableauChampGlobal[i]).querySelector('.champ__message-erreur').innerHTML === ''){
                if (this.refTableauChampGlobal[i] === 'champEmail' && this.courrielValid === false) {
                    tabErreur.push(false);
                } else {
                    tabErreur.push(true);
                }
            } else {
                tabErreur.push(false);
            }
        }
        return tabErreur.indexOf(true) !== -1;
    },
    validerAttributPattern(pattern, value): boolean {
        return new RegExp(pattern).test(value);
    },
    reinitialiserChamp(){
        for (let i = 0; i < this.refTableauChamp.length; i++) {
            document.getElementById(this.refTableauChamp[i]).innerHTML === '';
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
document.getElementById('courriel').addEventListener('change', function () {
    formulaire.validerInput('champEmail')
});
/*document.getElementById('mot_de_passe').addEventListener('change', function () {
    formulaire.validerInput('champPassword')
});*/
document.getElementById('btnReset').addEventListener('reset', function () {
    formulaire.reinitialiserChamp()
});


