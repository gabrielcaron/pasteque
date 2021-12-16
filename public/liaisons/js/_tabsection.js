/**
 * @file Fichier js servant pour les tab sections dans la fiche dun livre
 * @author @nicolasThibault <nicolasthibault@hotmail.ca>
 * @version 1.2.3
 *
 */
// Tabs Action
const tabLink = document.querySelectorAll(".tabSection__menuLink");
const tabContent = document.querySelectorAll(".tabSection__barContent");

tabLink.forEach((el) => {
    el.addEventListener("click", activeTab);
});

function activeTab(el) {
    const btnTarget = el.currentTarget;
    const content = btnTarget.dataset.content;

    tabContent.forEach((el) => {
        el.classList.remove("active");
    });

    tabLink.forEach((el) => {
        el.classList.remove("active");
    });

    document.querySelector("#" + content).classList.add("active");
    btnTarget.classList.add("active");
}