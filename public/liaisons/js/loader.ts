let loader = document.getElementById("page-loader");


const enleverLoader = () => {
    loader.classList.add('c0');

}
enleverLoader();

window.setTimeout(enleverDisplay, 1500);

function enleverDisplay(){
    loader.style.display = 'none';
}