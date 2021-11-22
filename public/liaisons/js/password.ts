const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#connexionPassword');
const passwordCreation = document.querySelector('#mot_de_passe');
const togglePasswordCreation = document.querySelector('#togglePasswordCreation');


togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

togglePasswordCreation.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordCreation.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordCreation.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
})
