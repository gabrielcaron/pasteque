/**
 * TODO - Valider les champs
 */

/** Formulaire : Élément pouvant être en display none pour l'affichage du step-left **/
const refEtapeLivraison: HTMLFieldSetElement = document.getElementById('etapeLivraison') as HTMLFieldSetElement;
const refEtapeFacturation: HTMLFieldSetElement = document.getElementById('etapeFacturation') as HTMLFieldSetElement;
const refEtapeValidation: HTMLFieldSetElement = document.getElementById('etapeValidation') as HTMLFieldSetElement;

const refSectionRecapAdresseLivraison: HTMLElement = document.getElementById('sectionRecapAdresseLivraison') as HTMLElement;
const refSectionRecapAdresseFacturation: HTMLElement = document.getElementById('sectionRecapAdresseFacturation') as HTMLElement;
const refSectionRecapPaiement: HTMLElement = document.getElementById('sectionRecapPaiement') as HTMLElement;
const refSectionRecapPanier: HTMLElement = document.getElementById('sectionRecapPanier') as HTMLElement;


const refSectionAdresseLivraison: HTMLElement = document.getElementById('sectionAdresseLivraison') as HTMLElement;
const refSectionAdresseFacturation: HTMLElement = document.getElementById('sectionAdresseFacturation') as HTMLElement;
const refSectionPaiementFacturation: HTMLElement = document.getElementById('sectionPaiementFacturation') as HTMLElement;

const refSectionAnciennesAdressesLivraison: HTMLElement = document.getElementById('sectionAncienneAdresseLivraison') as HTMLElement;
const refSectionRadioAnciennesAdressesLivraison: HTMLUListElement = document.getElementById('sectionRadioAnciennesAdresses') as HTMLUListElement;




/** Livraison : Champs input de la section adresse **/
const refLivraisonInputAdresse: HTMLInputElement = document.getElementById('livraison_adresse') as HTMLInputElement;
const refLivraisonInputVille: HTMLInputElement = document.getElementById('livraison_ville') as HTMLInputElement;
const refLivraisonInputProvince: HTMLSelectElement = document.getElementById('livraison_province') as HTMLSelectElement;
const refLivraisonInputCodePostal: HTMLInputElement = document.getElementById('livraison_codePostal') as HTMLInputElement;
const refLivraisonMemeAdresse: HTMLInputElement = document.getElementById('memeAdresse') as HTMLInputElement;


/** Facturation : Champs input de la section adresse **/
const refFacturationInputAdresse: HTMLInputElement = document.getElementById('facturation_adresse') as HTMLInputElement;
const refFacturationInputVille: HTMLInputElement = document.getElementById('facturation_ville') as HTMLInputElement;
const refFacturationInputProvince: HTMLInputElement = document.getElementById('facturation_province') as HTMLInputElement;
const refFacturationInputCodePostal: HTMLInputElement = document.getElementById('facturation_codePostal') as HTMLInputElement;


/** Facturation : Champs input de la section paiement **/
const refFacturationInputTitulaire: HTMLInputElement = document.getElementById('facturation_nomTitulaire') as HTMLInputElement;
const refFacturationInputNumeroCarte: HTMLInputElement = document.getElementById('facturation_numeroCarte') as HTMLInputElement;
const refFacturationInputMoisExpiration: HTMLInputElement = document.getElementById('facturation_moisExpiration') as HTMLInputElement;
const refFacturationInputAnneeExpiration: HTMLInputElement = document.getElementById('facturation_anneeExpiration') as HTMLInputElement;
const refFacturationInputCvv: HTMLInputElement = document.getElementById('facturation_cvv') as HTMLInputElement;

/** Facturation : Paragraphes du recap de l'adresse de facturation **/
const refFacturationAdresseFacturationRecap: HTMLElement = document.getElementById('facturationAdresseFacturation_recapAdresse') as HTMLElement;
const refFacturationVilleFacturationRecap: HTMLElement = document.getElementById('facturationAdresseFacturation_recapVille') as HTMLElement;
const refFacturationProvinceFacturationRecap: HTMLElement = document.getElementById('facturationAdresseFacturation_recapProvince') as HTMLElement;
const refFacturationCodePostalFacturationRecap: HTMLElement = document.getElementById('facturationAdresseFacturation_recapCodePostal') as HTMLElement;


/** Validation : Paragraphes du recap de l'adresse de livraison **/
const refLivraisonAdresseValidationRecap: HTMLElement = document.getElementById('livraisonAdresseLivraison_recapAdresse') as HTMLElement;
const refLivraisonVilleValidationRecap: HTMLElement = document.getElementById('livraisonAdresseLivraison_recapVille') as HTMLElement;
const refLivraisonProvinceValidationRecap: HTMLElement = document.getElementById('livraisonAdresseLivraison_recapProvince') as HTMLElement;
const refLivraisonCodePostalValidationRecap: HTMLElement = document.getElementById('livraisonAdresseLivraison_recapCodePostal') as HTMLElement;


/** Validation : Paragraphes du recap du paiement facturation **/
const refFacturationTitulaireValidationRecap: HTMLElement = document.getElementById('paiement_titulaire') as HTMLElement;
const refFacturationNumeroCarteValidationRecap: HTMLElement = document.getElementById('paiement_numeroCarte') as HTMLElement;
const refFacturationMoisExpirationValidationRecap: HTMLElement = document.getElementById('paiement_moisExpiration') as HTMLElement;
const refFacturationAnneeExpirationValidationRecap: HTMLElement = document.getElementById('paiement_anneeExpiration') as HTMLElement;
const refFacturationCvvValidationRecap: HTMLElement = document.getElementById('paiement_cvv') as HTMLElement;


/** Différents input caché du formulaire **/
const refNombresLivraisonsCompte: HTMLInputElement = document.getElementById('nombreAnciennesAdresses') as HTMLInputElement;
const refLivraisonId: HTMLInputElement = document.getElementById('livraison_id') as HTMLInputElement;
const refFacturationId: HTMLInputElement = document.getElementById('facturation_id') as HTMLInputElement;
let refRadiosLivraisons = document.getElementsByName('ancienAdresses');




/** Gestion du step-left **/
let gestionStepLeft = {

    livraisonCompleted: false,
    facturationCompleted: false,

    tableauChampAdresseId: ['_champAdresse', '_champVille', '_champProvince', '_champCodePostal'],
    tableauInputAdresseId: ['adresse', 'ville', 'province', 'code postal'],

    tableauChampPaiementId: ['_champNomTitulaire', '_champNumeroCarte', '_champCvv'],
    tableauInputPaiementId: ['nom titulaire', 'numero de carte', 'cvv'],

    /** Initialisation du step-left **/
    initialiser() {
        gestionStepLeft.remettreAZero();
        if (refLivraisonInputAdresse.value === '') {
            refSectionAdresseLivraison.removeAttribute("style");
            document.getElementById('continuerLivraison').removeAttribute('style');
        } else if(refFacturationInputAdresse.value === '') {
            this.livraisonCompleted = true;
            refSectionAdresseFacturation.removeAttribute("style");
            document.getElementById('continuerFacturation').removeAttribute('style');
        } else {
            refSectionRecapAdresseLivraison.removeAttribute("style");
            refSectionRecapAdresseFacturation.removeAttribute("style");
            refSectionRecapPaiement.removeAttribute("style");
            refSectionRecapPanier.removeAttribute("style");
            this.livraisonCompleted = true;
            this.facturationCompleted = true;
        }
    },

    /** Continuer de la livraison vers facturation / validation **/
    continuerLivraison() {
        if (this.validerChampSectionAdresse('livraison')===true) {
            gestionStepLeft.remettreAZero();
            //this.options[this.selectedIndex].text
            //Validation : Mettre à jour recap adresse Livraison

           // document.getElementById('continuerLivraison').style.display = 'none';
            refLivraisonAdresseValidationRecap.innerHTML = refLivraisonInputAdresse.value;
            refLivraisonVilleValidationRecap.innerHTML = refLivraisonInputVille.value;
            refLivraisonProvinceValidationRecap.innerHTML = refLivraisonInputProvince.options[refLivraisonInputProvince.selectedIndex].text;
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
                    document.getElementById('continuerAdresseFacturation').removeAttribute('style');
                }
            } else {
                refSectionRecapAdresseLivraison.removeAttribute("style");
                refSectionRecapAdresseFacturation.removeAttribute("style");
                refSectionRecapPaiement.removeAttribute("style");
                refSectionRecapPanier.removeAttribute("style");
            }

            this.ajouterAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                .then(response => {
                    this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                        .then(response=> {
                           // console.log(response)
                            refLivraisonId.value = response;
                        });
                });

        }

    },

    /** Continuer de adresse Facturation vers paiement Facturation **/
    continuerAdresseFacturation() {
        if(this.validerChampSectionAdresse('facturation') === true) {
            gestionStepLeft.remettreAZero();

            //Facturation Mettre à jour recap adresse Facturation
            refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
            refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
            refFacturationProvinceFacturationRecap.innerHTML = refLivraisonInputProvince.options[refLivraisonInputProvince.selectedIndex].text;
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
                .then(response => {
                    this.trouverIdAdresse(refFacturationInputAdresse.value, refFacturationInputVille.value, parseInt(refFacturationInputProvince.value), refFacturationInputCodePostal.value)
                        .then(response=> {
                           // console.log(response)
                            refFacturationId.value = response;
                        });
                })
        }
    },

    /** Continuer de facturation vers validation **/
    continuerFacturation() {
        if (this.validerChampSectionAdresse('paiement')===true) {
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
    ajouterLivraison() {
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
    confirmerAjouterLivraison() {
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
                refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince[parseInt(refFacturationInputProvince.value)-4].text;
                refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;
            }
            this.ajouterLivraisonAncienAdresse();
            this.ajouterAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                .then(response => {
                    this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                        .then(response=> {
                           // console.log(response)
                            refLivraisonId.value = response;
                        });
                })
        }
    },

    annulerAjouterLivraison (){
        refRadiosLivraisons.forEach(radio => {
            console.log(radio.querySelector("input"));
        })

    },

    ajouterLivraisonAncienAdresse() {
        const refLi = document.createElement('li');
        const refInput = document.createElement('input');
        const refLabel = document.createElement('label');
        const refAdress = document.createElement('address');

        const refPId = document.createElement('p');
        const refPRue = document.createElement('p');
        const refPInfo = document.createElement('p');

        const refRue = document.createElement('span');
        const refVille= document.createElement('span');
        const refProvince = document.createElement('span');
        const refCodePostal = document.createElement('span');

        refInput.setAttribute('id', `${refNombresLivraisonsCompte.value}_livraisonAncienneAdresse_inputAdresse`);
        refInput.setAttribute('type', 'radio');
        refInput.setAttribute('name', 'ancienAdresses');
        refInput.checked = true;
        refInput.addEventListener('click',function() {gestionStepLeft.changerSelected(event)});
        refInput.setAttribute('value', parseInt(refNombresLivraisonsCompte.value).toString());
        refLabel.setAttribute('for', `${refNombresLivraisonsCompte.value}_livraisonAncienneAdresse_inputAdresse`);
        refAdress.setAttribute('id', `${refNombresLivraisonsCompte.value}_livraisonAncienneAdresse_radioAdresse`);
        refRue.setAttribute('id', `${refNombresLivraisonsCompte.value}_livraisonAncienneAdresse_recapAdresse`);
        refRue.setAttribute('data-rue', refLivraisonInputAdresse.value);
        refVille.setAttribute('id', `${refNombresLivraisonsCompte.value}_livraisonAncienneAdresse_recapVille`)
        refVille.setAttribute('data-ville', refLivraisonInputVille.value);
        refProvince.setAttribute('id', `${refNombresLivraisonsCompte.value}_livraisonAncienneAdresse_recapProvince`);
        refProvince.setAttribute('data-province', refLivraisonInputProvince.value);
        refCodePostal.setAttribute('id', `${refNombresLivraisonsCompte.value}_livraisonAncienneAdresse_recapCodePostal`);
        refCodePostal.setAttribute('data-codePostal', refLivraisonInputCodePostal.value);

        refPId.innerHTML = 'NA';
        refRue.innerHTML = refLivraisonInputAdresse.value;
        refVille.innerHTML = refLivraisonInputVille.value + ', ';
        refProvince.innerHTML = refLivraisonInputProvince.options[refLivraisonInputProvince.selectedIndex].text + ', ';
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
    modifierLivraison() {
        gestionStepLeft.remettreAZero();
        refSectionAnciennesAdressesLivraison.removeAttribute("style");
        document.getElementById('continuerLivraison').removeAttribute('style');
        console.log('modifier')
    },

    /** Modifier une adresse de Facturation **/
    modifierAdresseFacturation() {
        gestionStepLeft.remettreAZero();
        refSectionAdresseFacturation.removeAttribute("style");
    },

    /** Modifier un paiement de Facturation **/
    modifierPaiementFacturation() {
        gestionStepLeft.remettreAZero();
        //refSectionRecapAdresseFacturation.removeAttribute("style");
        refSectionPaiementFacturation.removeAttribute("style");
        document.getElementById('continuerFacturation').removeAttribute('style');
    },

    /** Changer le selected **/
    changerSelected(event) {
        let index = event.target.id.charAt(0);
       // console.log(document.getElementById(index + '_livraisonAncienneAdresse_recapAdresse').innerHTML)
        refLivraisonInputAdresse.value = document.getElementById(index + '_livraisonAncienneAdresse_recapAdresse').getAttribute('data-rue');
        refLivraisonInputVille.value = document.getElementById(index + '_livraisonAncienneAdresse_recapVille').getAttribute('data-ville');
        refLivraisonInputProvince.value = document.getElementById(index + '_livraisonAncienneAdresse_recapProvince').getAttribute('data-province');
        refLivraisonInputCodePostal.value = document.getElementById(index + '_livraisonAncienneAdresse_recapCodePostal').getAttribute('data-codePostal');;
        //console.log(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
        this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
            .then(response=> {
               // console.log(response)
                refLivraisonId.value = response;
            });
    },

    validerChampSectionAdresse(livraisoFacturationOuPaiement) {
        let tableauErreur = [];
        let tableauValider = livraisoFacturationOuPaiement === 'paiement' ? this.tableauChampPaiementId :this.tableauChampAdresseId;
        let tableauRefNom = livraisoFacturationOuPaiement === 'paiement' ? this.tableauInputPaiementId :this.tableauInputAdresseId;
        let prefixe = livraisoFacturationOuPaiement === 'paiement' ? 'facturation' : livraisoFacturationOuPaiement;

        tableauValider.forEach((id, index) => {
            this.refInput = document.getElementById(prefixe + id).querySelector('input') === null ? document.getElementById(prefixe + id).querySelector('select') :document.getElementById(prefixe + id).querySelector('input');
            this.refChampErreur = document.getElementById(prefixe + id).querySelector('.champ__message-erreur');
            this.refInput.classList.remove('erreurInput');

            this.refChampErreur.style = 'display:none;';
            document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.remove('erreur');
            document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = '';

            if (this.refInput.hasAttribute('required') && this.refInput.value === '') {
                    this.refInput.classList.add('erreurInput');
                this.refErreur = `Le champ ${tableauRefNom[index]} est obligatoire.`;
                this.refChampErreur.style = 'display:block;';
                document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.add('erreur');
                document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
                tableauErreur.push(true);

            } else if (this.refInput.hasAttribute('pattern') && this.validerAttributPattern(this.refInput.pattern, this.refInput.value) === false) {

                let bool = this.validerAttributPattern(this.refInput.pattern, this.refInput.value)
                if (bool === false) {
                    this.refInput.classList.add('erreurInput');
                    this.refErreur = `Veuillez verifier que la valeur du champ ${tableauRefNom[index]} correspond aux critères demandés.`;
                    this.refChampErreur.style = 'display:block;';
                    document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.add('erreur');
                    document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
                    tableauErreur.push(true);
                }

            }
        });
       // console.log(tableauErreur)
        return tableauErreur.length === 0;
    },

    validerAttributPattern(pattern, value): boolean {
        return new RegExp(pattern).test(value);
    },

    ajouterAdresse(adresse:string, ville:string, province:bigint, codePostal:string) {
       let response =  fetch(`index.php?controleur=requete&classe=stepleft&action=insererAdresse&adresse=${adresse}&ville=${ville}&province_id=${province}&code_postal=${codePostal}`);
       return response
    },

    async trouverIdAdresse(adresse:string, ville:string, province:string, codePostal:string) {
        let response =  await fetch(`index.php?controleur=requete&classe=stepleft&action=trouverParChamp&adresse=${adresse}&ville=${ville}&province_id=${province}&code_postal=${codePostal}`)
            .then(response => response.json());
       // console.log(response)
        return response;
    },

    /** Remet à display none toutes les étapes et section d'étapes nécessaires **/
    remettreAZero() {
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
}

/*************************************************************************************
************************ Écouteurs d'événements du step-left *************************
**************************************************************************************/
//Load
window.addEventListener('load', function () {gestionStepLeft.initialiser()});

//Livraison : Écouteurs d'événements
document.getElementById('continuerLivraison').addEventListener('click', function (){gestionStepLeft.continuerLivraison()});
document.getElementById('ajouterNouvelleAdresseLivraison').addEventListener('click', function (){gestionStepLeft.ajouterLivraison()});
document.getElementById('ajouterLivraison').addEventListener('click', function (){gestionStepLeft.confirmerAjouterLivraison()});
document.getElementById('annulerAjouterLivraison').addEventListener('click', function (){gestionStepLeft.annulerAjouterLivraison()})

//Facturation : Écouteurs d'événements
document.getElementById('continuerAdresseFacturation').addEventListener('click', function (){gestionStepLeft.continuerAdresseFacturation()});
document.getElementById('continuerFacturation').addEventListener('click', function (){gestionStepLeft.continuerFacturation()});

//Validation : Écouteurs d'événements
document.getElementById('modifierAdresseLivraison').addEventListener('click', function (){gestionStepLeft.modifierLivraison()});
document.getElementById('modifierAdresseFacturation').addEventListener('click', function (){gestionStepLeft.modifierAdresseFacturation()});
document.getElementById('modifierPaiementFacturation').addEventListener('click', function (){gestionStepLeft.modifierPaiementFacturation()});

//Radios
console.log(refRadiosLivraisons)

for (let i = 0; i < refRadiosLivraisons.length; i++) {
    refRadiosLivraisons[i].addEventListener('click', function (){ gestionStepLeft.changerSelected(event) });
}

