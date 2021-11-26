/**
 * TODO - Mettre les champs de recap adresse en const
 * TODO - Faire le INNERHTML sur les champs recaps
 * TODO - Valider les champs
 * TODO - Mettre les champs de carte de crédit en const
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
var gestionStepLeft = {
    livraisonCompleted: false,
    facturationCompleted: false,
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
    continuerFacturation: function () {
        gestionStepLeft.remettreAZero();
        this.facturationCompleted = true;
        refEtapeValidation.style.display = 'block';
    },
    modifierLivraison: function () {
        gestionStepLeft.remettreAZero();
        refEtapeLivraison.style.display = 'block';
    },
    modifierFacturation: function () {
        gestionStepLeft.remettreAZero();
        refEtapeFacturation.style.display = 'block';
        refSectionRecapAdresseFacturation.style.display = 'block';
        refSectionPaiementFacturation.style.display = 'block';
    },
    remettreAZero: function () {
        refEtapeLivraison.style.display = 'none';
        refEtapeFacturation.style.display = 'none';
        refEtapeValidation.style.display = 'none';
        refSectionRecapAdresseFacturation.style.display = 'none';
        refSectionAdresseFacturation.style.display = 'none';
        refSectionPaiementFacturation.style.display = 'none';
    },
};
window.addEventListener('load', function () { gestionStepLeft.initialiser(); });
document.getElementById('continuerLivraison').addEventListener('click', function () { gestionStepLeft.continuerLivraison(); });
document.getElementById('continuerFacturation').addEventListener('click', function () { gestionStepLeft.continuerFacturation(); });
document.getElementById('modifierAdresseFacturation').addEventListener('click', function () { gestionStepLeft.modifierFacturation(); });
document.getElementById('modifierAdresseFacturationValidation').addEventListener('click', function () { gestionStepLeft.modifierFacturation(); });
document.getElementById('modifierAdresseLivraisonValidation').addEventListener('click', function () { gestionStepLeft.modifierLivraison(); });
