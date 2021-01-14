"use strict";

const email = document.getElementById('email');
const passwort = document.getElementById('password');
const theForm = document.getElementById('form');
const loginFehlerDiv = document.getElementById('loginFehlerDiv');
const emailFehlerSpan = document.getElementById('emailFehlerSpan');
const emailFelhersopan2 = document.getElementById('emailFelhersopan2');
const passwordFehlerSpan = document.getElementById('passwordFehlerSpan');



theForm.addEventListener('submit', (e) => {

    if (email.value === '' || email.value == null) {
        email.style.border = "2px solid red";
        loginFehlerDiv.style.display = "inline-block";
        emailFehlerSpan.style.display = "inline-block";
        e.preventDefault();
    }
    if (passwort.value === '' || passwort.value == null) {
        passwort.style.border = "2px solid red";
        loginFehlerDiv.style.display = "inline-block";
        passwordFehlerSpan.style.display = "inline-block";
        e.preventDefault();
    }


});