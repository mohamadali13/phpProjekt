"use strict";



const updateDataAdmin = document.getElementById('dataUpdate');
const myEmailUpdade = document.getElementById('email');
const nameUpdateAdmin = document.getElementById('adminNameUpdate');
const plzUpdateAdmin = document.getElementById('plz');
const ortUpdateAdmin = document.getElementById('ort');
const telephonUpdateAdmin = document.getElementById('telephon');
const passUpdateAdmin = document.getElementById('passwort');
const passWiederUpdateAmdin = document.getElementById('wiederholung');

updateDataAdmin.addEventListener('submit', (e) => {

    const letters = /^[0-9a-zA-Z]+$/;
    const numbers = /^[0-9]+$/;
    const regExp = /[a-zA-Z]/g;

    function hasNumber(myString) {
        return /\d/.test(myString);
    }

    if (hasNumber(nameUpdateAdmin.value)) {
        document.getElementById("nameUpdateError").innerText = " Plaese Just a Letters! ";
        e.preventDefault();
    }
    if (!plzUpdateAdmin.value.match(numbers)) {
        document.getElementById("plzUpdateError").innerText = "please only 5 Numbers!";

        e.preventDefault();
    }
    if (plzUpdateAdmin.value.length > 5 || plzUpdateAdmin.value.length < 5 && plzUpdateAdmin.value.length > 0) {
        document.getElementById("plzUpdateError").innerText = "please only 5 Numbers!";

        e.preventDefault();

    }
    if (hasNumber(ortUpdateAdmin.value)) {
        document.getElementById('ortUpdateError').innerTExt = "please only Letters!";

        e.preventDefault();
    }
    if (regExp.test(telephonUpdateAdmin.value)) {
        document.getElementById('telephonUpdateError').innerText = "only numbers please";

        e.preventDefault();
    }
    if (passUpdateAdmin.value !== passWiederUpdateAmdin.value) {
        document.getElementById('passwordUpdateError').innerText = "the password are not the same!";

        e.preventDefault();
    }
})