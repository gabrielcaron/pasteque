/**
 * TODO - Valider les champs
 */
/** Formulaire : Élément pouvant être en display none pour l'affichage du step-left **/
var refEtapeLivraison = document.getElementById('etapeLivraison');
var refEtapeFacturation = document.getElementById('etapeFacturation');
var refEtapeValidation = document.getElementById('etapeValidation');
var refSectionRecapAdresseLivraison = document.getElementById('sectionRecapAdresseLivraison');
var refSectionRecapAdresseFacturation = document.getElementById('sectionRecapAdresseFacturation');
var refSectionRecapPaiement = document.getElementById('sectionRecapPaiement');
var refSectionRecapPanier = document.getElementById('sectionRecapPanier');
var refSectionAdresseLivraison = document.getElementById('sectionAdresseLivraison');
var refSectionAdresseFacturation = document.getElementById('sectionAdresseFacturation');
var refSectionPaiementFacturation = document.getElementById('sectionPaiementFacturation');
var refSectionAnciennesAdressesLivraison = document.getElementById('sectionAncienneAdresseLivraison');
var refSectionRadioAnciennesAdressesLivraison = document.getElementById('sectionRadioAnciennesAdresses');
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
var refLivraisonAdresseValidationRecap = document.getElementById('livraisonAdresseLivraison_recapAdresse');
var refLivraisonVilleValidationRecap = document.getElementById('livraisonAdresseLivraison_recapVille');
var refLivraisonProvinceValidationRecap = document.getElementById('livraisonAdresseLivraison_recapProvince');
var refLivraisonCodePostalValidationRecap = document.getElementById('livraisonAdresseLivraison_recapCodePostal');
/** Validation : Paragraphes du recap du paiement facturation **/
var refFacturationTitulaireValidationRecap = document.getElementById('paiement_titulaire');
var refFacturationNumeroCarteValidationRecap = document.getElementById('paiement_numeroCarte');
var refFacturationMoisExpirationValidationRecap = document.getElementById('paiement_moisExpiration');
var refFacturationAnneeExpirationValidationRecap = document.getElementById('paiement_anneeExpiration');
var refFacturationCvvValidationRecap = document.getElementById('paiement_cvv');
/** Différents input caché du formulaire **/
var refNombresLivraisonsCompte = document.getElementById('nombreAnciennesAdresses');
var refRadiosLivraisons = document.getElementsByName('ancienAdresses');
/** Gestion du step-left **/
var gestionStepLeft = {
    livraisonCompleted: false,
    facturationCompleted: false,
    /** Initialisation du step-left **/
    initialiser: function () {
        gestionStepLeft.remettreAZero();
        if (refLivraisonInputAdresse.value === '') {
            refSectionAdresseLivraison.removeAttribute("style");
        }
        else if (refFacturationInputAdresse.value === '') {
            this.livraisonCompleted = true;
            refSectionAdresseFacturation.removeAttribute("style");
        }
        else {
            refSectionRecapAdresseLivraison.removeAttribute("style");
            refSectionRecapAdresseFacturation.removeAttribute("style");
            refSectionRecapPaiement.removeAttribute("style");
            refSectionRecapPanier.removeAttribute("style");
            this.livraisonCompleted = true;
            this.facturationCompleted = true;
        }
    },
    /** Continuer de la livraison vers facturation / validation **/
    continuerLivraison: function () {
        gestionStepLeft.remettreAZero();
        //this.options[this.selectedIndex].text
        //Validation : Mettre à jour recap adresse Livraison
        document.getElementById('continuerLivraison').style.display = 'none';
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
            }
        }
        else {
            refSectionRecapAdresseLivraison.removeAttribute("style");
            refSectionRecapAdresseFacturation.removeAttribute("style");
            refSectionRecapPaiement.removeAttribute("style");
            refSectionRecapPanier.removeAttribute("style");
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
        refSectionRecapAdresseLivraison.removeAttribute("style");
        refSectionRecapAdresseFacturation.removeAttribute("style");
        refSectionRecapPaiement.removeAttribute("style");
        refSectionRecapPanier.removeAttribute("style");
    },
    /** Ajouter une adresse de Livraison **/
    ajouterLivraison: function () {
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
    confirmerAjouterLivraison: function () {
        gestionStepLeft.remettreAZero();
        document.getElementById('continuerLivraison').removeAttribute("style");
        refSectionAnciennesAdressesLivraison.removeAttribute("style");
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
        }
        this.ajouterLivraisonAncienAdresse();
    },
    ajouterLivraisonAncienAdresse: function () {
        var refLi = document.createElement('li');
        var refAdress = document.createElement('address');
        var refRue = document.createElement('p');
        var refVille = document.createElement('p');
        var refProvince = document.createElement('p');
        var refCodePostal = document.createElement('p');
        refAdress.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_radioAdresse");
        refRue.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_recapAdresse");
        refVille.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_recapVille");
        refProvince.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_recapProvince");
        refCodePostal.setAttribute('id', refNombresLivraisonsCompte.value + "_livraisonAncienneAdresse_recapCodePostal");
        refRue.innerHTML = refLivraisonInputAdresse.value;
        refVille.innerHTML = refLivraisonInputVille.value;
        refProvince.innerHTML = refLivraisonInputProvince[refLivraisonInputProvince.value].text;
        refCodePostal.innerHTML = refLivraisonInputCodePostal.value;
        refAdress.prepend(refRue, refVille, refProvince, refCodePostal);
        refLi.prepend(refAdress);
        refSectionRadioAnciennesAdressesLivraison.append(refLi);
        refNombresLivraisonsCompte.value = (parseInt(refNombresLivraisonsCompte.value) + 1).toString();
    },
    /** Modifier une adresse de Livraison **/
    modifierLivraison: function () {
        gestionStepLeft.remettreAZero();
        refSectionAnciennesAdressesLivraison.removeAttribute("style");
    },
    /** Modifier une adresse de Facturation **/
    modifierAdresseFacturation: function () {
        gestionStepLeft.remettreAZero();
        refSectionAdresseFacturation.removeAttribute("style");
    },
    /** Modifier un paiement de Facturation **/
    modifierPaiementFacturation: function () {
        gestionStepLeft.remettreAZero();
        refSectionRecapAdresseFacturation.removeAttribute("style");
        refSectionPaiementFacturation.removeAttribute("style");
    },
    /** Changer le selected **/
    changerSelected: function (event) {
        console.log(event);
    },
    /** Remet à display none toutes les étapes et section d'étapes nécessaires **/
    remettreAZero: function () {
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
//Validation : Écouteurs d'événements
document.getElementById('modifierAdresseLivraison').addEventListener('click', function () { gestionStepLeft.modifierLivraison(); });
document.getElementById('modifierAdresseFacturation').addEventListener('click', function () { gestionStepLeft.modifierAdresseFacturation(); });
document.getElementById('modifierPaiementFacturation').addEventListener('click', function () { gestionStepLeft.modifierPaiementFacturation(); });
//Radios
console.log(refRadiosLivraisons);
for (var i = 0; i < refRadiosLivraisons.length; i++) {
    refRadiosLivraisons[i].addEventListener('click', function () { gestionStepLeft.changerSelected(event); });
}
