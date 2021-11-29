/**
 * TODO - Valider les champs
 */
/** Formulaire : Élément pouvant être en display none pour l'affichage du step-left **/
var refEtapeLivraison = document.getElementById('etapeLivraison');
var refEtapeFacturation = document.getElementById('etapeFacturation');
var refEtapeValidation = document.getElementById('etapeValidation');
var refSectionRecapAdresseFacturation = document.getElementById('sectionRecapAdresseFacturation');
var refSectionAdresseFacturation = document.getElementById('sectionAdresseFacturation');
var refSectionPaiementFacturation = document.getElementById('sectionPaiementFacturation');
var refSectionAnciennesAdressesLivraison = document.getElementById('sectionAncienneAdresseLivraison');
var refSectionAdresseLivraison = document.getElementById('sectionAdresseLivraison');
/** Livraison : Champs input de la section adresse **/
var refLivraisonInputAdresse = document.getElementById('livraison_adresse');
var refLivraisonInputVille = document.getElementById('livraison_ville');
var refLivraisonInputProvince = document.getElementById('livraison_province');
var refLivraisonInputCodePostal = document.getElementById('livraison_codePostal');
var refLivraisonMemeAdresse = document.getElementById('memeAdresse');
/** Facturation : Champs input de la section adresse **/
var refFacturationInputAdresse = document.getElementById('facturation_adresse');
var refFacturationInputVille = document.getElementById('facturation_ville');
var refFacturationInputProvince = document.getElementById('facturation_province');
var refFacturationInputCodePostal = document.getElementById('facturation_codePostal');
/** Facturation : Champs input de la section paiement **/
var refFacturationInputTitulaire = document.getElementById('facturation_nomTitulaire');
var refFacturationInputNumeroCarte = document.getElementById('facturation_numeroCarte');
var refFacturationInputMoisExpiration = document.getElementById('facturation_moisExpiration');
var refFacturationInputAnneeExpiration = document.getElementById('facturation_anneeExpiration');
var refFacturationInputCvv = document.getElementById('facturation_cvv');
/** Facturation : Paragraphes du recap de l'adresse de facturation **/
var refFacturationAdresseFacturationRecap = document.getElementById('facturationAdresseFacturation_recapAdresse');
var refFacturationVilleFacturationRecap = document.getElementById('facturationAdresseFacturation_recapVille');
var refFacturationProvinceFacturationRecap = document.getElementById('facturationAdresseFacturation_recapProvince');
var refFacturationCodePostalFacturationRecap = document.getElementById('facturationAdresseFacturation_recapCodePostal');
/** Validation : Paragraphes du recap de l'adresse de livraison **/
var refLivraisonAdresseValidationRecap = document.getElementById('livraisonAdresseValidation_recapAdresse');
var refLivraisonVilleValidationRecap = document.getElementById('livraisonAdresseValidation_recapVille');
var refLivraisonProvinceValidationRecap = document.getElementById('livraisonAdresseValidation_recapProvince');
var refLivraisonCodePostalValidationRecap = document.getElementById('livraisonAdresseValidation_recapCodePostal');
/** Validation : Paragraphes du recap de l'adresse de facturation **/
var refFacturationAdresseValidationRecap = document.getElementById('facturationAdresseValidation_recapAdresse');
var refFacturationVilleValidationRecap = document.getElementById('facturationAdresseValidation_recapVille');
var refFacturationProvinceValidationRecap = document.getElementById('facturationAdresseValidation_recapProvince');
var refFacturationCodePostalValidationRecap = document.getElementById('facturationAdresseValidation_recapCodePostal');
/** Validation : Paragraphes du recap du paiement facturation **/
var refFacturationTitulaireValidationRecap = document.getElementById('paiement_titulaire');
var refFacturationNumeroCarteValidationRecap = document.getElementById('paiement_numeroCarte');
var refFacturationMoisExpirationValidationRecap = document.getElementById('paiement_moisExpiration');
var refFacturationAnneeExpirationValidationRecap = document.getElementById('paiement_anneeExpiration');
var refFacturationCvvValidationRecap = document.getElementById('paiement_cvv');
/** Différents input caché du formulaire **/
var refNombresLivraisonsCompte = document.getElementById('nombreAnciennesAdresses');
/** Gestion du step-left **/
var gestionStepLeft = {
    livraisonCompleted: false,
    facturationCompleted: false,
    /** Initialisation du step-left **/
    initialiser: function () {
        gestionStepLeft.remettreAZero();
        if (refLivraisonInputAdresse.value === '') {
            refEtapeLivraison.style.display = 'block';
            refSectionAdresseLivraison.style.display = 'block';
        }
        else if (refFacturationInputAdresse.value === '') {
            this.livraisonCompleted = true;
            refEtapeFacturation.style.display = 'block';
        }
        else {
            refEtapeValidation.style.display = 'block';
            this.livraisonCompleted = true;
            this.facturationCompleted = true;
        }
    },
    /** Continuer de la livraison vers facturation / validation **/
    continuerLivraison: function () {
        gestionStepLeft.remettreAZero();
        //this.options[this.selectedIndex].text
        //Validation : Mettre à jour recap adresse Livraison
        refLivraisonAdresseValidationRecap.innerHTML = refLivraisonInputAdresse.value;
        refLivraisonVilleValidationRecap.innerHTML = refLivraisonInputVille.value;
        refLivraisonProvinceValidationRecap.innerHTML = refLivraisonInputProvince[refLivraisonInputProvince.value].text;
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
            refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince[refFacturationInputProvince.value].text;
            refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;
            //Validation : Mettre à jour recap adresse Facturation
            refFacturationAdresseValidationRecap.innerHTML = refFacturationInputAdresse.value;
            refFacturationVilleValidationRecap.innerHTML = refFacturationInputVille.value;
            refFacturationProvinceValidationRecap.innerHTML = refFacturationInputProvince[refFacturationInputProvince.value].text;
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
        }
        else {
            refEtapeValidation.style.display = 'block';
        }
    },
    /** Continuer de adresse Facturation vers paiement Facturation **/
    continuerAdresseFacturation: function () {
        gestionStepLeft.remettreAZero();
        //Facturation Mettre à jour recap adresse Facturation
        refFacturationAdresseFacturationRecap.innerHTML = refFacturationInputAdresse.value;
        refFacturationVilleFacturationRecap.innerHTML = refFacturationInputVille.value;
        refFacturationProvinceFacturationRecap.innerHTML = refFacturationInputProvince[refFacturationInputProvince.value].text;
        refFacturationCodePostalFacturationRecap.innerHTML = refFacturationInputCodePostal.value;
        //Validation : Mettre à jour recap adresse Facturation
        refFacturationAdresseValidationRecap.innerHTML = refFacturationInputAdresse.value;
        refFacturationVilleValidationRecap.innerHTML = refFacturationInputVille.value;
        refFacturationProvinceValidationRecap.innerHTML = refFacturationInputProvince[refFacturationInputProvince.value].text;
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
    continuerFacturation: function () {
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
    ajouterLivraison: function () {
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
    confirmerAjouterLivraison: function () {
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
        refNombresLivraisonsCompte;
        for (var i = 0; i < parseInt(refNombresLivraisonsCompte.value); i++) {
        }
        if (refLivraisonInputAdresse.value)
            refNombresLivraisonsCompte.value = refNombresLivraisonsCompte.value + 1;
        var refDiv = document.createElement('div');
        var refAdresse = document.createElement('p');
        var refVille = document.createElement('p');
        var refProvince = document.createElement('p');
        var refCodePostal = document.createElement('p');
        refAdresse.innerHTML = refLivraisonInputAdresse.value;
        refVille.innerHTML = refLivraisonInputVille.value;
        refProvince.innerHTML = refLivraisonInputProvince.value;
        refCodePostal.innerHTML = refLivraisonInputCodePostal.value;
        refDiv.prepend(refAdresse, refVille, refProvince, refCodePostal);
        refSectionAnciennesAdressesLivraison.prepend(refDiv);
    },
    /** Modifier une adresse de Livraison **/
    modifierLivraison: function () {
        gestionStepLeft.remettreAZero();
        refEtapeLivraison.style.display = 'block';
        refSectionAnciennesAdressesLivraison.style.display = 'block';
    },
    /** Modifier une adresse de Facturation **/
    modifierAdresseFacturation: function () {
        gestionStepLeft.remettreAZero();
        refEtapeFacturation.style.display = 'block';
        refSectionAdresseFacturation.style.display = 'block';
    },
    /** Modifier un paiement de Facturation **/
    modifierPaiementFacturation: function () {
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
        refSectionAnciennesAdressesLivraison.style.display = 'none';
        refSectionAdresseLivraison.style.display = 'none';
        document.getElementById('ajouterLivraison').style.display = 'none';
        document.getElementById('annulerAjouterAdresse').style.display = 'none';
    },
};
/*************************************************************************************
************************ Écouteurs d'événements du step-left *************************
**************************************************************************************/
//Load
window.addEventListener('load', function () { gestionStepLeft.initialiser(); });
//Livraison : Écouteurs d'événements
document.getElementById('continuerLivraison').addEventListener('click', function () { gestionStepLeft.continuerLivraison(); });
document.getElementById('ajouterNouvelleAdresseLivraison').addEventListener('click', function () { gestionStepLeft.ajouterLivraison(); });
document.getElementById('ajouterLivraison').addEventListener('click', function () { gestionStepLeft.confirmerAjouterLivraison(); });
//Facturation : Écouteurs d'événements
document.getElementById('continuerAdresseFacturation').addEventListener('click', function () { gestionStepLeft.continuerAdresseFacturation(); });
document.getElementById('continuerFacturation').addEventListener('click', function () { gestionStepLeft.continuerFacturation(); });
document.getElementById('modifierAdresseFacturation').addEventListener('click', function () { gestionStepLeft.modifierAdresseFacturation(); });
//Validation : Écouteurs d'événements
document.getElementById('modifierAdresseLivraisonValidation').addEventListener('click', function () { gestionStepLeft.modifierLivraison(); });
document.getElementById('modifierAdresseFacturationValidation').addEventListener('click', function () { gestionStepLeft.modifierAdresseFacturation(); });
document.getElementById('modifierPaiementFacturationValidation').addEventListener('click', function () { gestionStepLeft.modifierPaiementFacturation(); });
