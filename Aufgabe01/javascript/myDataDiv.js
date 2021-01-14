"use strict";

const myDataDivForm = document.getElementById('myDataUpdate');
const myEmailUpdade = document.getElementById('email');
const myNameUpdate = document.getElementById('name');
const myPlzUpdate = document.getElementById('plz');
const myOrtUpdate = document.getElementById('ort');
const myTelephonUpdate = document.getElementById('telephon');
const myPassUpdate = document.getElementById('passwort');
const myPasswiederUpdate = document.getElementById('wiederholung');

myDataDivForm.addEventListener('submit', (e) => {

    const letters = /^[0-9a-zA-Z]+$/;
    const numbers = /^[0-9]+$/;
    const regExp = /[a-zA-Z]/g;

    function hasNumber(myString) {
        return /\d/.test(myString);
    }

    if (hasNumber(myNameUpdate.value)) {
        document.getElementById("nameUpdateError").innerText = " Plaese Just a Letters! ";
        e.preventDefault();
    }
    if (!myPlzUpdate.value.match(numbers)) {
        document.getElementById("plzUpdateError").innerText = "please only 5 Numbers!";

        e.preventDefault();
    }
    if (myPlzUpdate.value.length > 5 || myPlzUpdate.value.length < 5 && myPlzUpdate.value.length > 0) {
        document.getElementById("plzUpdateError").innerText = "please only 5 Numbers!";

        e.preventDefault();

    }
    if (hasNumber(myOrtUpdate.value)) {
        document.getElementById('ortUpdateError').innerTExt = "please only Letters!";

        e.preventDefault();
    }
    if (regExp.test(myTelephonUpdate.value)) {
        document.getElementById('telephonUpdateError').innerText = "only numbers please";

        e.preventDefault();
    }
    if (myPassUpdate.value !== myPasswiederUpdate.value) {
        document.getElementById('passwordUpdateError').innerText = "the password are not the same!";

        e.preventDefault();
    }
})