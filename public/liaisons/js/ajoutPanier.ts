/**
 * @file Fichier js servant à l'ajout au panier à partir de la fiche d'un livre
 * @author @Gabriel Caron <1861095@csfoy.ca>
 * @version 1.2.3
 *
 */
// Ajout au panier lorsque JS est activé, affiche la fenêtre modale

const refSectionFicheLivre: HTMLElement = document.querySelector(".ficheLivre__format") as HTMLElement;
const refBoutonAjouterPHP: HTMLButtonElement = document.getElementById("boutonAjouterPanierPHP") as HTMLButtonElement;
const refBoutonAjouterJS: HTMLAnchorElement = document.createElement("a") as HTMLAnchorElement;
const refProduitId: HTMLInputElement = document.getElementById("produit_id") as HTMLInputElement;
const refPanierId: HTMLInputElement = document.getElementById("panier_id") as HTMLInputElement;
const refQuantite: HTMLInputElement = document.querySelector(".ficheLivre__ajoutInput") as HTMLInputElement;
const refLienPanier: HTMLAnchorElement = document.getElementById("lienPanier") as HTMLAnchorElement;
let refSpanNbArticles: HTMLSpanElement = document.getElementById("spanNbItemsPanier") as HTMLSpanElement;
const refQuantiteModale: HTMLLIElement = document.querySelector(".livre__item.livre__categorie.quantite") as HTMLLIElement;

// Redessine certaines balises lorsque le JS est activé

refBoutonAjouterPHP.remove();
refBoutonAjouterJS.id = "boutonAjouterPanierJS";
refBoutonAjouterJS.classList.add("bouton", "action", "ajoutPanier");
refBoutonAjouterJS.href = "#panier";
refBoutonAjouterJS.innerHTML = "Ajouter au panier";
refSectionFicheLivre.append(refBoutonAjouterJS);

let ajoutPanier = {
    async ajouterAuPanier() {
        let response = await fetch(`index.php?controleur=requete&classe=livre&action=insererLivre&produit_id=${refProduitId.value}&panier_id=${refPanierId.value}&quantite=${refQuantite.value}`);
        const quantite: number = parseInt(refQuantite.value);
        refQuantiteModale.innerHTML = `Quantité: ${refQuantite.value}`;

        if (refSpanNbArticles === null) {
            refSpanNbArticles = document.createElement("span");
            refSpanNbArticles.classList.add("menuTop__itemsPanier");
            refLienPanier.append(refSpanNbArticles);
        }
        if (refSpanNbArticles.innerHTML === "") {
            refSpanNbArticles.innerHTML = quantite.toString();
        } else {
            const nbArticlesPanier: number = parseInt(refSpanNbArticles.innerHTML);
            const nouveauTotalPanier: number = nbArticlesPanier + quantite;
            refSpanNbArticles.innerHTML = nouveauTotalPanier.toString();
        }

        return response;
    }
};


// Écouteurs d'événements
refBoutonAjouterJS.addEventListener("click", ajoutPanier.ajouterAuPanier);
