/**
 * @file Fichier js servant à l'ajout au panier à partir de la fiche d'un livre
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @version 1.2.3
 *
 */
// Ajout au panier lorsque JS est activé, affiche la fenêtre modale

const refFormulaire: HTMLButtonElement = document.getElementById("formulaireAjoutPanier") as HTMLButtonElement;
const refSectionFicheLivre: HTMLElement = document.querySelector(".ficheLivre__format") as HTMLElement;
const refBoutonAjouterPHP: HTMLButtonElement = document.getElementById("boutonAjouterPanierPHP") as HTMLButtonElement;
const refBoutonAjouterJS: HTMLAnchorElement = document.createElement("a") as HTMLAnchorElement;
const refProduitId: HTMLInputElement = document.getElementById("produit_id") as HTMLInputElement;
const refPanierId: HTMLInputElement = document.getElementById("panier_id") as HTMLInputElement;
const refQuantite: HTMLInputElement = document.getElementById("quantite") as HTMLInputElement;



// Redessiner certaines balises lorsque le JS est activé

refBoutonAjouterPHP.remove();
refBoutonAjouterJS.id = "boutonAjouterPanierJS";
refBoutonAjouterJS.classList.add("bouton", "action", "ajoutPanier");
refBoutonAjouterJS.href = "#panier";
refBoutonAjouterJS.innerHTML = "Ajouter au panier";
refSectionFicheLivre.append(refBoutonAjouterJS);

let ajoutPanier = {
// get à la place de post, envoyer dans querystring
        async ajouterAuPanier() {
            let response = await fetch(`index.php?controleur=requete&classe=livre&action=insererLivre&produit_id=${refProduitId.value}&panier_id=${refPanierId.value}&quantite=${refQuantite.value}`);
            return response;
        }
    };


// Écouteurs d'événements
refBoutonAjouterJS.addEventListener("click", ajoutPanier.ajouterAuPanier);
// document.getElementById("fermerModale").addEventListener("click", function () {
//     const refModale = document.getElementById("panier");
//     refModale.style.visibility = "hidden";
//     refModale.style.opacity = "0";
//     refModale.style.bottom = "-40rem";
// });
