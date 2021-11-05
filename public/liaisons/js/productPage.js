const activeImage = document.querySelector(".ficheLivre__productImage .ficheLivre__active");
const productImages = document.querySelectorAll(".ficheLivre__imageList img");

function changeImage(e) {
    activeImage.src = e.target.src;
}

productImages.forEach(image => image.addEventListener("click", changeImage));