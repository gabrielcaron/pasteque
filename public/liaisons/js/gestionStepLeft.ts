/**
 * @file Fichier js servant à la gestion du stepleft
 * @author @Michel Veillette <1965623@csfoy.ca>
 * @version 1.2.3
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
const refFacturationInputProvince: HTMLSelectElement = document.getElementById('facturation_province') as HTMLSelectElement;
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
    paiementCompleted: false,
    adresseLivraisonMemoire: [],

    tableauChampAdresseId: ['_champAdresse', '_champVille', '_champProvince', '_champCodePostal'],
    tableauInputAdresseId: ['adresse', 'ville', 'province', 'code postal'],

    tableauChampPaiementId: ['_champNomTitulaire', '_champNumeroCarte', '_champCvv'],
    tableauInputPaiementId: ['nom titulaire', 'numero de carte', 'cvv'],

    /** Initialisation du step-left **/
    initialiser():void {
        gestionStepLeft.remettreAZero();
        gestionStepLeft.ajouterEcouteurs();
        if (refLivraisonInputAdresse.value === '') {
            refEtapeLivraison.classList.add('courante');
            refSectionAdresseLivraison.removeAttribute("style");
            document.getElementById('continuerLivraison').removeAttribute('style');
        } else if(refFacturationInputAdresse.value === '') {
            refEtapeLivraison.classList.add('complete');
            refEtapeFacturation.classList.add('courante');
            this.livraisonCompleted = true;
            refSectionAdresseFacturation.removeAttribute("style");
            document.getElementById('continuerAdresseFacturation').removeAttribute('style');
        } else if(refFacturationInputTitulaire.value === '') {
            refEtapeLivraison.classList.add('complete');
            refEtapeFacturation.classList.add('courante');
            refSectionRecapAdresseFacturation.removeAttribute("style");
            refSectionPaiementFacturation.removeAttribute("style");
            document.getElementById('continuerFacturation').removeAttribute('style');
        } else {
            refEtapeLivraison.classList.add('complete');
            refEtapeFacturation.classList.add('complete');
            refEtapeValidation.classList.add('courante')
            refSectionRecapAdresseLivraison.removeAttribute("style");
            refSectionRecapAdresseFacturation.removeAttribute("style");
            refSectionRecapPaiement.removeAttribute("style");
            refSectionRecapPanier.removeAttribute("style");
            this.livraisonCompleted = true;
            this.facturationCompleted = true;
            document.getElementById('envoyerFormulaireStepLeft').removeAttribute('style');
        }
    },

    /** Continuer de la livraison vers facturation / validation **/
    continuerLivraison():void {
        if (this.validerChampSectionFormulaire('livraison')===true) {
            gestionStepLeft.remettreAZero();

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
                refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince.options[refFacturationInputProvince.selectedIndex].text;
                refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;

            }

            if (this.livraisonCompleted === false) {
                this.livraisonCompleted = true;
                refEtapeLivraison.classList.remove('courante');
                refEtapeLivraison.classList.add('complete');
                refEtapeFacturation.classList.add('courante');
                refSectionRecapAdresseLivraison.removeAttribute("style");
                if (refLivraisonMemeAdresse.checked === true) {
                    refSectionRecapAdresseFacturation.removeAttribute("style");
                    refSectionPaiementFacturation.removeAttribute("style");
                    document.getElementById('continuerFacturation').removeAttribute('style');
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
                document.getElementById('envoyerFormulaireStepLeft').removeAttribute('style');
            }

            this.ajouterAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                .then(response => {
                    this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                        .then(response=> {
                            // console.log(response)
                            refLivraisonId.value = response;
                            if (refLivraisonMemeAdresse.checked === true) {
                                refFacturationId.value = response;
                            }
                        });
                });

        }

    },

    /** Continuer de adresse Facturation vers paiement Facturation **/
    continuerAdresseFacturation():void {
        if(this.validerChampSectionFormulaire('facturation') === true) {
            gestionStepLeft.remettreAZero();

            //Facturation Mettre à jour recap adresse Facturation
            refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
            refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
            refFacturationProvinceFacturationRecap.innerHTML = refLivraisonInputProvince.options[refLivraisonInputProvince.selectedIndex].text;
            refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;

            if (this.facturationCompleted === false) {
                refEtapeFacturation.classList.add('courante');
                refSectionRecapAdresseLivraison.removeAttribute("style");
                refSectionRecapAdresseFacturation.removeAttribute("style");
                refSectionPaiementFacturation.removeAttribute("style");
                document.getElementById('continuerFacturation').removeAttribute('style');
            }
            else {
                refSectionRecapAdresseLivraison.removeAttribute("style");
                refSectionRecapAdresseFacturation.removeAttribute("style");
                refSectionRecapPaiement.removeAttribute("style");
                refSectionRecapPanier.removeAttribute("style");
                document.getElementById('envoyerFormulaireStepLeft').removeAttribute('style');
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
    continuerFacturation():void {
        if (this.validerChampSectionFormulaire('paiement')===true) {
            gestionStepLeft.remettreAZero();

            //Validation : Mettre à jour recap paiement Facturation
            refFacturationTitulaireValidationRecap.innerHTML = refFacturationInputTitulaire.value;
            refFacturationNumeroCarteValidationRecap.innerHTML = refFacturationInputNumeroCarte.value;
            refFacturationMoisExpirationValidationRecap.innerHTML = refFacturationInputMoisExpiration.value;
            refFacturationAnneeExpirationValidationRecap.innerHTML = refFacturationInputAnneeExpiration.value;
            refFacturationCvvValidationRecap.innerHTML = refFacturationInputCvv.value;

            this.facturationCompleted = true;
            refEtapeFacturation.classList.remove('courante');
            refEtapeFacturation.classList.add('complete');
            refEtapeValidation.classList.add('courante');

            refSectionRecapAdresseLivraison.removeAttribute("style");
            refSectionRecapAdresseFacturation.removeAttribute("style");
            refSectionRecapPaiement.removeAttribute("style");
            refSectionRecapPanier.removeAttribute("style");
            document.getElementById('envoyerFormulaireStepLeft').removeAttribute('style');
        }
    },

    /** Ajouter une adresse de Livraison **/
    ajouterLivraison():void {
        gestionStepLeft.remettreAZero();
        this.adresseLivraisonMemoire[0] = refLivraisonInputAdresse.value;
        this.adresseLivraisonMemoire[1] = refLivraisonInputVille.value;
        this.adresseLivraisonMemoire[2] = refLivraisonInputProvince.value;
        this.adresseLivraisonMemoire[3] = refLivraisonInputCodePostal.value;
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
    confirmerAjouterLivraison():void {
        if (gestionStepLeft.validerChampSectionFormulaire('livraison') === true) {
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
                refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince.options[refFacturationInputProvince.selectedIndex].text;
                refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;
            }
            this.ajouterLivraisonAncienAdresse();
            this.ajouterAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                .then(response => {
                    this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
                        .then(response=> {
                            refLivraisonId.value = response;
                        });
                })
        }
    },

    /** Annuler d'ajouter la livraison **/
    annulerAjouterLivraison():void {
        gestionStepLeft.remettreAZero();
        refSectionAnciennesAdressesLivraison.removeAttribute("style");
        document.getElementById('continuerModifierAdresseLivraison').removeAttribute('style');

        refLivraisonInputAdresse.value = this.adresseLivraisonMemoire[0];
        refLivraisonInputVille.value = this.adresseLivraisonMemoire[1];
        refLivraisonInputProvince.value = this.adresseLivraisonMemoire[2];
        refLivraisonInputCodePostal.value = this.adresseLivraisonMemoire[3];
        this.adresseLivraisonMemoire = [];
    },

    /** Ajouter une adresse de livraison au radio des adresses **/
    ajouterLivraisonAncienAdresse():void {
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

        //refPId.innerHTML = 'NA';
        refRue.innerHTML = refLivraisonInputAdresse.value;
        refVille.innerHTML = refLivraisonInputVille.value + ', ';
        refProvince.innerHTML = refLivraisonInputProvince.options[refLivraisonInputProvince.selectedIndex].text + ', ';
        refCodePostal.innerHTML = refLivraisonInputCodePostal.value;

        refPRue.prepend(refRue);
        refPInfo.prepend(refVille, refProvince, refCodePostal);
        refAdress.prepend(refPId, refPRue, refPInfo);
        refLabel.prepend(refAdress);
        refLi.prepend(refInput, refLabel);
        refLi.classList.add('listeAnciennesAdresses');
        refSectionRadioAnciennesAdressesLivraison.prepend(refLi);

        refNombresLivraisonsCompte.value = (parseInt(refNombresLivraisonsCompte.value) + 1).toString();
    },

    /** Modifier une adresse de Livraison **/
    modifierLivraison():void {
        gestionStepLeft.remettreAZero();
        refSectionAnciennesAdressesLivraison.removeAttribute("style");
        document.getElementById('continuerModifierAdresseLivraison').removeAttribute('style');
    },

    /** Continuer après avoir modifier une adresse de livraison **/
    continuerModifierAdresseLivraison():void {
        gestionStepLeft.remettreAZero();
        refSectionRecapAdresseLivraison.removeAttribute("style");
        refSectionRecapAdresseFacturation.removeAttribute("style");
        refSectionRecapPaiement.removeAttribute("style");
        refSectionRecapPanier.removeAttribute("style");
    },

    /** Modifier une adresse de Facturation **/
    modifierAdresseFacturation():void {
        gestionStepLeft.remettreAZero();
        refSectionAdresseFacturation.removeAttribute("style");
    },

    /** Modifier un paiement de Facturation **/
    modifierPaiementFacturation():void {
        gestionStepLeft.remettreAZero();
        //refSectionRecapAdresseFacturation.removeAttribute("style");
        refSectionPaiementFacturation.removeAttribute("style");
        document.getElementById('continuerFacturation').removeAttribute('style');
    },

    /** Changer le selected **/
    changerSelected(event):void {
        let index = event.target.id.charAt(0);
        refLivraisonInputAdresse.value = document.getElementById(index + '_livraisonAncienneAdresse_recapAdresse').getAttribute('data-rue');
        refLivraisonInputVille.value = document.getElementById(index + '_livraisonAncienneAdresse_recapVille').getAttribute('data-ville');
        refLivraisonInputProvince.value = document.getElementById(index + '_livraisonAncienneAdresse_recapProvince').getAttribute('data-province');
        refLivraisonInputCodePostal.value = document.getElementById(index + '_livraisonAncienneAdresse_recapCodePostal').getAttribute('data-codePostal');
        this.trouverIdAdresse(refLivraisonInputAdresse.value, refLivraisonInputVille.value, parseInt(refLivraisonInputProvince.value), refLivraisonInputCodePostal.value)
            .then(response=> {
                refLivraisonId.value = response;
            });
    },

    /** Valider un input **/
    validerInput(prefixe: string, id: string, nom:string):boolean {
        let erreur = false;
        this.refInput = document.getElementById(prefixe + id).querySelector('input') === null ? document.getElementById(prefixe + id).querySelector('select') :document.getElementById(prefixe + id).querySelector('input');
        this.refChampErreur = document.getElementById(prefixe + id).querySelector('.champ__message-erreur');
        this.refInput.classList.remove('erreurInput');

        this.refChampErreur.style = 'display:none;';
        document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.remove('erreur');
        document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = '';

        if (this.refInput.hasAttribute('required') && this.refInput.value === '') {
            this.refInput.classList.add('erreurInput');
            this.refErreur = `Le champ ${nom} est obligatoire.`;
            this.refChampErreur.style = 'display:block;';
            document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.add('erreur');
            document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
            erreur = true;

        } else if (this.refInput.hasAttribute('pattern') && this.validerAttributPattern(this.refInput.pattern, this.refInput.value) === false) {

            let bool = this.validerAttributPattern(this.refInput.pattern, this.refInput.value)
            if (bool === false) {
                this.refInput.classList.add('erreurInput');
                this.refErreur = `Veuillez verifier que la valeur du champ ${nom} correspond aux critères demandés.`;
                this.refChampErreur.style = 'display:block;';
                document.getElementById(prefixe + id).querySelector('.champ__message-erreur').classList.add('erreur');
                document.getElementById(prefixe + id).querySelector('.champ__message-erreur').innerHTML = this.refErreur;
                erreur = true
            }
        }
        return erreur
    },

    /** Valider les champs d'une section du formulaire **/
    validerChampSectionFormulaire(livraisoFacturationOuPaiement:string):boolean {
        let tableauErreur = [];
        let tableauValider = livraisoFacturationOuPaiement === 'paiement' ? this.tableauChampPaiementId :this.tableauChampAdresseId;
        let tableauRefNom = livraisoFacturationOuPaiement === 'paiement' ? this.tableauInputPaiementId :this.tableauInputAdresseId;
        let prefixe = livraisoFacturationOuPaiement === 'paiement' ? 'facturation' : livraisoFacturationOuPaiement;

        tableauValider.forEach((id, index) => {
            if (this.validerInput(prefixe, id, tableauRefNom[index]) === true) {
                tableauErreur.push(true);
            }
        });
        return tableauErreur.length === 0;
    },

    /** Valider le regex d'un champ **/
    validerAttributPattern(pattern:string, value:string): boolean {
        return new RegExp(pattern).test(value);
    },

    /** Trouver une adresse **/
    ajouterAdresse(adresse:string, ville:string, province:bigint, codePostal:string):any {
        let response =  fetch(`index.php?controleur=requete&classe=stepleft&action=insererAdresse&adresse=${adresse}&ville=${ville}&province_id=${province}&code_postal=${codePostal}`);
        return response
    },

    /** Trouver une adresse en ajax **/
    async trouverIdAdresse(adresse:string, ville:string, province:string, codePostal:string) {
        let response =  await fetch(`index.php?controleur=requete&classe=stepleft&action=trouverParChamp&adresse=${adresse}&ville=${ville}&province_id=${province}&code_postal=${codePostal}`)
            .then(response => response.json());
        return response;
    },

    /** Ajouter tous les écouteurs d'événements focusout **/
    ajouterEcouteurs():void {
        this.tableauChampAdresseId.forEach((input, index) =>{
            let nomChamp = this.tableauInputAdresseId[index];
            document.getElementById('livraison' + input).addEventListener('focusout', function(){gestionStepLeft.validerInput('livraison', input, nomChamp)});
            document.getElementById('facturation' + input).addEventListener('focusout', function(){gestionStepLeft.validerInput('facturation', input, nomChamp)});
        })
        this.tableauChampPaiementId.forEach((input, index) =>{
            let nomChamp = this.tableauInputPaiementId[index];
            document.getElementById('facturation' + input).addEventListener('focusout', function(){gestionStepLeft.validerInput('facturation', input, nomChamp)});
        })
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
        document.getElementById('continuerModifierAdresseLivraison').style.display = 'none';
        document.getElementById('envoyerFormulaireStepLeft').style.display = 'none';

    },
}

/*************************************************************************************
 ************************ Écouteurs d'événements du step-left *************************
 **************************************************************************************/
//Load
window.addEventListener('load', function () {gestionStepLeft.initialiser()});

//Livraison : Écouteurs d'événements
document.getElementById('continuerLivraison').addEventListener('click', function (){gestionStepLeft.continuerLivraison()});
document.getElementById('continuerModifierAdresseLivraison').addEventListener('click', function (){gestionStepLeft.continuerModifierAdresseLivraison()})
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
for (let i = 0; i < refRadiosLivraisons.length; i++) {
    refRadiosLivraisons[i].addEventListener('click', function (){ gestionStepLeft.changerSelected(event) });
}

