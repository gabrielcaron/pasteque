/**
 * TODO - Valider les champs
 */

/** Formulaire : Élément pouvant être en display none pour l'affichage du step-left **/
const refEtapeLivraison: HTMLFieldSetElement = document.getElementById('etapeLivraison') as HTMLFieldSetElement;
const refEtapeFacturation: HTMLFieldSetElement = document.getElementById('etapeFacturation') as HTMLFieldSetElement;
const refEtapeValidation: HTMLFieldSetElement = document.getElementById('etapeValidation') as HTMLFieldSetElement;
const refSectionRecapAdresseFacturation: HTMLElement = document.getElementById('sectionRecapAdresseFacturation') as HTMLElement;
const refSectionAdresseFacturation: HTMLElement = document.getElementById('sectionAdresseFacturation') as HTMLElement;
const refSectionPaiementFacturation: HTMLElement = document.getElementById('sectionPaiementFacturation') as HTMLElement;
const refSectionAnciennesAdressesLivraison: HTMLElement = document.getElementById('sectionAncienneAdresseLivraison') as HTMLElement;
const refSectionAdresseLivraison: HTMLElement = document.getElementById('sectionAdresseLivraison') as HTMLElement;


/** Livraison : Champs input de la section adresse **/
const refLivraisonInputAdresse: HTMLInputElement = document.getElementById('livraison_adresse') as HTMLInputElement;
const refLivraisonInputVille: HTMLInputElement = document.getElementById('livraison_ville') as HTMLInputElement;
const refLivraisonInputProvince: HTMLInputElement = document.getElementById('livraison_province') as HTMLInputElement;
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
const refLivraisonAdresseValidationRecap: HTMLElement = document.getElementById('livraisonAdresseValidation_recapAdresse') as HTMLElement;
const refLivraisonVilleValidationRecap: HTMLElement = document.getElementById('livraisonAdresseValidation_recapVille') as HTMLElement;
const refLivraisonProvinceValidationRecap: HTMLElement = document.getElementById('livraisonAdresseValidation_recapProvince') as HTMLElement;
const refLivraisonCodePostalValidationRecap: HTMLElement = document.getElementById('livraisonAdresseValidation_recapCodePostal') as HTMLElement;


/** Validation : Paragraphes du recap de l'adresse de facturation **/
const refFacturationAdresseValidationRecap: HTMLElement = document.getElementById('facturationAdresseValidation_recapAdresse') as HTMLElement;
const refFacturationVilleValidationRecap: HTMLElement = document.getElementById('facturationAdresseValidation_recapVille') as HTMLElement;
const refFacturationProvinceValidationRecap: HTMLElement = document.getElementById('facturationAdresseValidation_recapProvince') as HTMLElement;
const refFacturationCodePostalValidationRecap: HTMLElement = document.getElementById('facturationAdresseValidation_recapCodePostal') as HTMLElement;

/** Validation : Paragraphes du recap du paiement facturation **/
const refFacturationTitulaireValidationRecap: HTMLElement = document.getElementById('paiement_titulaire') as HTMLElement;
const refFacturationNumeroCarteValidationRecap: HTMLElement = document.getElementById('paiement_numeroCarte') as HTMLElement;
const refFacturationMoisExpirationValidationRecap: HTMLElement = document.getElementById('paiement_moisExpiration') as HTMLElement;
const refFacturationAnneeExpirationValidationRecap: HTMLElement = document.getElementById('paiement_anneeExpiration') as HTMLElement;
const refFacturationCvvValidationRecap: HTMLElement = document.getElementById('paiement_cvv') as HTMLElement;

/** Différents input caché du formulaire **/
const refNombresLivraisonsCompte: HTMLInputElement = document.getElementById('nombreAnciennesAdresses') as HTMLInputElement;


/** Gestion du step-left **/
let gestionStepLeft = {

    livraisonCompleted: false,
    facturationCompleted: false,

    /** Initialisation du step-left **/
    initialiser() {
        gestionStepLeft.remettreAZero();
        if (refLivraisonInputAdresse.value === '') {
            refEtapeLivraison.style.display = 'block';
            refSectionAdresseLivraison.style.display = 'block';
        } else if(refFacturationInputAdresse.value === '') {
            this.livraisonCompleted = true;
            refEtapeFacturation.style.display = 'block';
        } else {
            refEtapeValidation.style.display = 'block';
            this.livraisonCompleted = true;
            this.facturationCompleted = true;
        }
    },

    /** Continuer de la livraison vers facturation / validation **/
    continuerLivraison() {
        gestionStepLeft.remettreAZero();

        //Validation : Mettre à jour recap adresse Livraison
        refLivraisonAdresseValidationRecap.innerHTML = refLivraisonInputAdresse.value;
        refLivraisonVilleValidationRecap.innerHTML = refLivraisonInputVille.value;
        refLivraisonProvinceValidationRecap.innerHTML = refLivraisonInputProvince.innerHTML;
        refLivraisonCodePostalValidationRecap.innerHTML = refLivraisonInputCodePostal.value;

        if (refLivraisonMemeAdresse.checked === true) {
            //Adresse identique
            refFacturationInputAdresse.value = refLivraisonInputAdresse.value;
            refFacturationInputVille.value = refLivraisonInputVille.value;
            refFacturationInputProvince.value = refLivraisonInputProvince.value;
            refFacturationInputCodePostal.value = refLivraisonInputCodePostal.value;

            //Facturation Mettre à jour recap adresse Facturation
            refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
            refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
            refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince.innerHTML;
            refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;

            //Validation : Mettre à jour recap adresse Facturation
            refFacturationAdresseValidationRecap.innerHTML = refFacturationInputAdresse.value;
            refFacturationVilleValidationRecap.innerHTML = refFacturationInputVille.value;
            refFacturationProvinceValidationRecap.innerHTML = refFacturationInputProvince.innerHTML;
            refFacturationCodePostalValidationRecap.innerHTML = refFacturationInputCodePostal.value;
        }

        if (this.livraisonCompleted === false) {
            this.livraisonCompleted = true;
            refEtapeFacturation.style.display = 'block';
            if (refLivraisonMemeAdresse.checked === true) {
                refSectionRecapAdresseFacturation.style.display = 'block';
                refSectionPaiementFacturation.style.display = 'block';
            }
            else {
                refSectionAdresseFacturation.style.display = 'block';
                refSectionPaiementFacturation.style.display = 'block';
            }
        } else {
            refEtapeValidation.style.display = 'block';
        }
    },

    /** Continuer de adresse Facturation vers paiement Facturation **/
    continuerAdresseFacturation() {
        gestionStepLeft.remettreAZero();

        //Facturation Mettre à jour recap adresse Facturation
        refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
        refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
        refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince.innerHTML;
        refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;

        //Validation : Mettre à jour recap adresse Facturation
        refFacturationAdresseValidationRecap.innerHTML = refFacturationInputAdresse.value;
        refFacturationVilleValidationRecap.innerHTML = refFacturationInputVille.value;
        refFacturationProvinceValidationRecap.innerHTML = refFacturationInputProvince.innerHTML;
        refFacturationCodePostalValidationRecap.innerHTML = refFacturationInputCodePostal.value;

        if (this.facturationCompleted === false) {
            refEtapeFacturation.style.display = 'block';
            refSectionRecapAdresseFacturation.style.display = 'block';
            refSectionPaiementFacturation.style.display = 'block';
        }
        else {
            refEtapeValidation.style.display = 'block';
        }

    },

    /** Continuer de facturation vers validation **/
    continuerFacturation() {
        gestionStepLeft.remettreAZero();

        //Validation : Mettre à jour recap paiement Facturation
        refFacturationTitulaireValidationRecap.innerHTML = refFacturationInputTitulaire.value;
        refFacturationNumeroCarteValidationRecap.innerHTML = refFacturationInputNumeroCarte.value;
        refFacturationMoisExpirationValidationRecap.innerHTML = refFacturationInputMoisExpiration.value;
        refFacturationAnneeExpirationValidationRecap.innerHTML = refFacturationInputAnneeExpiration.value;
        refFacturationCvvValidationRecap.innerHTML = refFacturationInputCvv.value;

        this.facturationCompleted = true;
        refEtapeValidation.style.display = 'block';
    },

    /** Ajouter une adresse de Livraison **/
    ajouterLivraison() {
        gestionStepLeft.remettreAZero();
        refLivraisonInputAdresse.value = '';
        refLivraisonInputVille.value = '';
        refLivraisonInputProvince.value = '';
        refLivraisonInputCodePostal.value = '';

        refEtapeLivraison.style.display = 'block';
        refSectionAdresseLivraison.style.display = 'block';
        document.getElementById('ajouterLivraison').style.display = 'block';
        document.getElementById('annulerAjouterLivraison').style.display = 'block';
        document.getElementById('continuerLivraison').style.display = 'none';
    },

    /** Confirmer ajouter une adresse de Livraison **/
    confirmerAjouterLivraison() {
        gestionStepLeft.remettreAZero();

        refEtapeLivraison.style.display = 'block';
        refSectionAnciennesAdressesLivraison.style.display = 'block';
        //Validation : Mettre à jour recap adresse Livraison
        refLivraisonAdresseValidationRecap.innerHTML = refLivraisonInputAdresse.value;
        refLivraisonVilleValidationRecap.innerHTML = refLivraisonInputVille.value;
        refLivraisonProvinceValidationRecap.innerHTML = refLivraisonInputProvince.innerHTML;
        refLivraisonCodePostalValidationRecap.innerHTML = refLivraisonInputCodePostal.value;

        if (refLivraisonMemeAdresse.checked === true) {
            //Adresse identique
            refFacturationInputAdresse.value = refLivraisonInputAdresse.value;
            refFacturationInputVille.value = refLivraisonInputVille.value;
            refFacturationInputProvince.value = refLivraisonInputProvince.value;
            refFacturationInputCodePostal.value = refLivraisonInputCodePostal.value;

            //Facturation Mettre à jour recap adresse Facturation
            refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
            refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
            refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince.innerHTML;
            refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;

            //Validation : Mettre à jour recap adresse Facturation
            refFacturationAdresseValidationRecap.innerHTML = refFacturationInputAdresse.value;
            refFacturationVilleValidationRecap.innerHTML = refFacturationInputVille.value;
            refFacturationProvinceValidationRecap.innerHTML = refFacturationInputProvince.innerHTML;
            refFacturationCodePostalValidationRecap.innerHTML = refFacturationInputCodePostal.value;
        }
        //TODO - Set selected aria
        refNombresLivraisonsCompte.value = refNombresLivraisonsCompte.value + 1;

        const refDiv = document.createElement('div');
        const refAdresse = document.createElement('p');
        const refVille= document.createElement('p');
        const refProvince = document.createElement('p');
        const refCodePostal = document.createElement('p');

        refAdresse.innerHTML = refLivraisonInputAdresse.value;
        refVille.innerHTML = refLivraisonInputVille.value;
        refProvince.innerHTML = refLivraisonInputProvince.value;
        refCodePostal.innerHTML = refLivraisonInputCodePostal.value;

        refDiv.prepend(refAdresse, refVille, refProvince, refCodePostal);
        refSectionAnciennesAdressesLivraison.prepend(refDiv);

    },

    /** Modifier une adresse de Livraison **/
    modifierLivraison() {
        gestionStepLeft.remettreAZero();
        refEtapeLivraison.style.display = 'block';
        refSectionAnciennesAdressesLivraison.style.display = 'block';
    },

    /** Modifier une adresse de Facturation **/
    modifierAdresseFacturation() {
        gestionStepLeft.remettreAZero();
        refEtapeFacturation.style.display = 'block';
        refSectionAdresseFacturation.style.display = 'block';
    },

    /** Modifier un paiement de Facturation **/
    modifierPaiementFacturation() {
        gestionStepLeft.remettreAZero();
        refEtapeFacturation.style.display = 'block';
        refSectionRecapAdresseFacturation.style.display = 'block';
        refSectionPaiementFacturation.style.display = 'block';
    },

    /** Remet à display none toutes les étapes et section d'étapes nécessaires **/
    remettreAZero() {
        refEtapeLivraison.style.display = 'none';
        refEtapeFacturation.style.display = 'none';
        refEtapeValidation.style.display = 'none';
        refSectionRecapAdresseFacturation.style.display = 'none';
        refSectionAdresseFacturation.style.display = 'none';
        refSectionPaiementFacturation.style.display = 'none';
        refSectionAnciennesAdressesLivraison.style.display = 'none';
        refSectionAdresseLivraison.style.display = 'none';
        document.getElementById('ajouterLivraison').style.display = 'none';
        document.getElementById('annulerAjouterAdresse').style.display = 'none';
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

//Facturation : Écouteurs d'événements
document.getElementById('continuerAdresseFacturation').addEventListener('click', function (){gestionStepLeft.continuerAdresseFacturation()});
document.getElementById('continuerFacturation').addEventListener('click', function (){gestionStepLeft.continuerFacturation()});
document.getElementById('modifierAdresseFacturation').addEventListener('click', function (){gestionStepLeft.modifierAdresseFacturation()});

//Validation : Écouteurs d'événements
document.getElementById('modifierAdresseLivraisonValidation').addEventListener('click', function (){gestionStepLeft.modifierLivraison()});
document.getElementById('modifierAdresseFacturationValidation').addEventListener('click', function (){gestionStepLeft.modifierAdresseFacturation()});
document.getElementById('modifierPaiementFacturationValidation').addEventListener('click', function (){gestionStepLeft.modifierPaiementFacturation()});
