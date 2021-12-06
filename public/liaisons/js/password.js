"use strict";
var togglePassword = document.querySelector('#togglePassword');
var password = document.querySelector('#connexionPassword');
var passwordCreation = document.querySelector('#mot_de_passe');
var togglePasswordCreation = document.querySelector('#togglePasswordCreation');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
togglePasswordCreation.addEventListener('click', function (e) {
    // toggle the type attribute
    var type = passwordCreation.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordCreation.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
