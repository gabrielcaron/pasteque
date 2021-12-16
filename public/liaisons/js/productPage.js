/**
 * @file Fichier js servant à la gestion des images dans la fiche livre
 * @author @Nicolas Thibault <1635751@csfoy.ca>

 * @version 1.2.3
 *
 */
const activeImage = document.querySelector(".ficheLivre__productImage .ficheLivre__active");
const productImages = document.querySelectorAll(".ficheLivre__imageList img");

function changeImage(e) {
    activeImage.src = e.target.src;
}

productImages.forEach(image => image.addEventListener("click", changeImage));