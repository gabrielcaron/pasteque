/**
 * TODO - Mettre les champs de recap adresse en const
 * TODO - Faire le INNERHTML sur les champs recaps
 * TODO - Valider les champs
 */

/** Élément pouvant être en display none pour l'affichage du formulaire step-left **/
const refEtapeLivraison: HTMLFieldSetElement = document.getElementById('etapeLivraison') as HTMLFieldSetElement;
const refEtapeFacturation: HTMLFieldSetElement = document.getElementById('etapeFacturation') as HTMLFieldSetElement;
const refEtapeValidation: HTMLFieldSetElement = document.getElementById('etapeValidation') as HTMLFieldSetElement;
const refSectionRecapAdresseFacturation: HTMLElement = document.getElementById('sectionRecapAdresseFacturation') as HTMLElement;
const refSectionAdresseFacturation: HTMLElement = document.getElementById('sectionAdresseFacturation') as HTMLElement;
const refSectionPaiementFacturation: HTMLElement = document.getElementById('sectionPaiementFacturation') as HTMLElement;


/** Champs input de la section adresse livraison **/
const refLivraisonInputAdresse: HTMLInputElement = document.getElementById('livraison_adresse') as HTMLInputElement;
const refLivraisonInputVille: HTMLInputElement = document.getElementById('livraison_ville') as HTMLInputElement;
const refLivraisonInputProvince: HTMLInputElement = document.getElementById('livraison_province') as HTMLInputElement;
const refLivraisonInputCodePostal: HTMLInputElement = document.getElementById('livraison_codePostal') as HTMLInputElement;
const refLivraisonMemeAdresse: HTMLInputElement = document.getElementById('memeAdresse') as HTMLInputElement;


/** Champs input de la section adresse facturation **/
const refFacturationInputAdresse: HTMLInputElement = document.getElementById('facturation_adresse') as HTMLInputElement;
const refFacturationInputVille: HTMLInputElement = document.getElementById('facturation_ville') as HTMLInputElement;
const refFacturationInputProvince: HTMLInputElement = document.getElementById('facturation_province') as HTMLInputElement;
const refFacturationInputCodePostal: HTMLInputElement = document.getElementById('facturation_codePostal') as HTMLInputElement;


/** Champs input de la section paiement facturation **/
const refFacturationInputNomTitulaire: HTMLInputElement = document.getElementById('facturation_nomTitulaire') as HTMLInputElement;
const refFacturationInputNumeroCarte: HTMLInputElement = document.getElementById('facturation_numeroCarte') as HTMLInputElement;
const refFacturationInputMoisExpiration: HTMLInputElement = document.getElementById('facturation_moisExpiration') as HTMLInputElement;
const refFacturationInputAnneeExpiration: HTMLInputElement = document.getElementById('facturation_anneeExpiration') as HTMLInputElement;
const refFacturationInputCvv: HTMLInputElement = document.getElementById('facturation_cvv') as HTMLInputElement;


/** Gestion du step-left **/
let gestionStepLeft = {

    livraisonCompleted: false,
    facturationCompleted: false,

    /** Initialisation du step-left **/
    initialiser() {
        gestionStepLeft.remettreAZero();
        if (refLivraisonInputAdresse.value === '') {
            refEtapeLivraison.style.display = 'block'
        } else if(refFacturationInputAdresse.value === '') {
            refEtapeFacturation.style.display = 'block'
        } else {
            refEtapeValidation.style.display = 'block'
        }
    },

    /** Continuer de la livraison vers facturation / validation **/
    continuerLivraison() {
        gestionStepLeft.remettreAZero();
        if (this.livraisonCompleted === false) {
            this.livraisonCompleted = true;
            refEtapeFacturation.style.display = 'block';
            if (refLivraisonMemeAdresse.checked === true) {
                refSectionRecapAdresseFacturation.style.display = 'block';
                refSectionPaiementFacturation.style.display = 'block';

                //Adresse identique
                refFacturationInputAdresse.value = refLivraisonInputAdresse.value;
                refFacturationInputVille.value = refLivraisonInputVille.value;
                refFacturationInputProvince.value = refLivraisonInputProvince.value;
                refFacturationInputCodePostal.value = refLivraisonInputCodePostal.value;
            }
            else {
                refSectionAdresseFacturation.style.display = 'block';
            }
        } else {
            refEtapeValidation.style.display = 'block';
        }
    },

    /** Continuer de facturation vers validation **/
    continuerFacturation() {
        gestionStepLeft.remettreAZero();
        this.facturationCompleted = true;
        refEtapeValidation.style.display = 'block';

    },

    /** Modifier une Livraison **/
    modifierLivraison() {
        gestionStepLeft.remettreAZero();
        refEtapeLivraison.style.display = 'block';
    },

    /** Modifier Facturation **/
    modifierFacturation() {
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
    },
}

/*************************************************************************************
************************ Écouteurs d'événements du step-left *************************
**************************************************************************************/
window.addEventListener('load', function () {gestionStepLeft.initialiser()});
document.getElementById('continuerLivraison').addEventListener('click', function (){gestionStepLeft.continuerLivraison()});
document.getElementById('continuerFacturation').addEventListener('click', function (){gestionStepLeft.continuerFacturation()});
document.getElementById('modifierAdresseFacturation').addEventListener('click', function (){gestionStepLeft.modifierFacturation()});
document.getElementById('modifierAdresseFacturationValidation').addEventListener('click', function (){gestionStepLeft.modifierFacturation()});
document.getElementById('modifierAdresseLivraisonValidation').addEventListener('click', function (){gestionStepLeft.modifierLivraison()});