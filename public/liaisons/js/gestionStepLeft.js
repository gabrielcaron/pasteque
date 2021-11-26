/**
 * TODO - Mettre les champs de recap adresse en const
 * TODO - Faire le INNERHTML sur les champs recaps
 * TODO - Valider les champs
 */
/** Élément pouvant être en display none pour l'affichage du formulaire step-left **/
var refEtapeLivraison = document.getElementById('etapeLivraison');
var refEtapeFacturation = document.getElementById('etapeFacturation');
var refEtapeValidation = document.getElementById('etapeValidation');
var refSectionRecapAdresseFacturation = document.getElementById('sectionRecapAdresseFacturation');
var refSectionAdresseFacturation = document.getElementById('sectionAdresseFacturation');
var refSectionPaiementFacturation = document.getElementById('sectionPaiementFacturation');
/** Champs input de la section adresse livraison **/
var refLivraisonInputAdresse = document.getElementById('livraison_adresse');
var refLivraisonInputVille = document.getElementById('livraison_ville');
var refLivraisonInputProvince = document.getElementById('livraison_province');
var refLivraisonInputCodePostal = document.getElementById('livraison_codePostal');
var refLivraisonMemeAdresse = document.getElementById('memeAdresse');
/** Champs input de la section adresse facturation **/
var refFacturationInputAdresse = document.getElementById('facturation_adresse');
var refFacturationInputVille = document.getElementById('facturation_ville');
var refFacturationInputProvince = document.getElementById('facturation_province');
var refFacturationInputCodePostal = document.getElementById('facturation_codePostal');
/** Champs input de la section paiement facturation **/
var refFacturationInputNomTitulaire = document.getElementById('facturation_nomTitulaire');
var refFacturationInputNumeroCarte = document.getElementById('facturation_numeroCarte');
var refFacturationInputMoisExpiration = document.getElementById('facturation_moisExpiration');
var refFacturationInputAnneeExpiration = document.getElementById('facturation_anneeExpiration');
var refFacturationInputCvv = document.getElementById('facturation_cvv');
/** Gestion du step-left **/
var gestionStepLeft = {
    livraisonCompleted: false,
    facturationCompleted: false,
    /** Initialisation du step-left **/
    initialiser: function () {
        gestionStepLeft.remettreAZero();
        if (refLivraisonInputAdresse.value === '') {
            refEtapeLivraison.style.display = 'block';
        }
        else if (refFacturationInputAdresse.value === '') {
            refEtapeFacturation.style.display = 'block';
        }
        else {
            refEtapeValidation.style.display = 'block';
        }
    },
    /** Continuer de la livraison vers facturation / validation **/
    continuerLivraison: function () {
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
        }
        else {
            refEtapeValidation.style.display = 'block';
        }
    },
    /** Continuer de facturation vers validation **/
    continuerFacturation: function () {
        gestionStepLeft.remettreAZero();
        this.facturationCompleted = true;
        refEtapeValidation.style.display = 'block';
    },
    /** Modifier une Livraison **/
    modifierLivraison: function () {
        gestionStepLeft.remettreAZero();
        refEtapeLivraison.style.display = 'block';
    },
    /** Modifier Facturation **/
    modifierFacturation: function () {
        gestionStepLeft.remettreAZero();
        refEtapeFacturation.style.display = 'block';
        refSectionRecapAdresseFacturation.style.display = 'block';
        refSectionPaiementFacturation.style.display = 'block';
    },
    /** Remet à display none toutes les étapes et section d'étapes nécessaires **/
    remettreAZero: function () {
        refEtapeLivraison.style.display = 'none';
        refEtapeFacturation.style.display = 'none';
        refEtapeValidation.style.display = 'none';
        refSectionRecapAdresseFacturation.style.display = 'none';
        refSectionAdresseFacturation.style.display = 'none';
        refSectionPaiementFacturation.style.display = 'none';
    },
};
/*************************************************************************************
************************ Écouteurs d'événements du step-left *************************
**************************************************************************************/
window.addEventListener('load', function () { gestionStepLeft.initialiser(); });
document.getElementById('continuerLivraison').addEventListener('click', function () { gestionStepLeft.continuerLivraison(); });
document.getElementById('continuerFacturation').addEventListener('click', function () { gestionStepLeft.continuerFacturation(); });
document.getElementById('modifierAdresseFacturation').addEventListener('click', function () { gestionStepLeft.modifierFacturation(); });
document.getElementById('modifierAdresseFacturationValidation').addEventListener('click', function () { gestionStepLeft.modifierFacturation(); });
document.getElementById('modifierAdresseLivraisonValidation').addEventListener('click', function () { gestionStepLeft.modifierLivraison(); });
