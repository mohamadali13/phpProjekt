"use strict";

const email = document.getElementById('email');
const theName = document.getElementById('name');
const plz = document.getElementById('plz');
const ort = document.getElementById('ort');
const telephon = document.getElementById('telephon');
const passwort = document.getElementById('password');
const wiederPass = document.getElementById('passwordWiederholung');
const chekBox = document.getElementById('checkbox');
const theForm = document.getElementById('form');
const fehlerDiv = document.getElementById('fehelMeldung');
const regButton = document.getElementById('regButton');


theForm.addEventListener('submit', (e) => {
    const letters = /^[0-9a-zA-Z]+$/;
    const numbers = /^[0-9]+$/;
    const regExp = /[a-zA-Z]/g;

    function hasNumber(myString) {
        return /\d/.test(myString);
    }




    /*  if(regExp.test(testString)){
         do something if letters are found in your string 
      }*/

    if (email.value === '' || email.value == null) {
        email.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (theName.value === '' || theName.value == null) {
        theName.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (hasNumber(theName.value)) {
        document.getElementById("nameSpan").innerHTML = " <br> <span>please just letters without numbers</span>";
        theName.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (plz.value === '' || plz.value == null) {
        plz.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (!plz.value.match(numbers)) {
        //document.getElementById("plzSpan").innerHTML = " <br> <span>please only 5 Numbers!</span>";
        plz.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (plz.value.length > 5 || plz.value.length < 5 && plz.value.length > 0) {
        document.getElementById("plzSpan").innerHTML = " <br> <span>please only 5 Numbers!</span>";
        plz.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();

    }
    if (ort.value === '' || ort.value == null) {
        ort.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (hasNumber(ort.value)) {
        document.getElementById('ortSpan').innerHTML = "<br> <span>please only Letters!</span>";
        ort.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (telephon.value === '' || telephon.value == null) {
        telephon.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (regExp.test(telephon.value)) {
        document.getElementById('telephonSpan').innerHTML = "<br> <span>only numbers please</span> ";
        telephon.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }

    if (passwort.value === '' || passwort.value == null) {
        passwort.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (wiederPass.value === '' || wiederPass.value == null) {
        wiederPass.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (passwort.value !== wiederPass.value) {
        document.getElementById('passwordWiederholungSpan').innerHTML = "<br> <span>the password are not the same!</span>";
        passwort.style.border = "2px solid red";
        wiederPass.style.border = "2px solid red";
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }
    if (!chekBox.checked) {

        document.getElementById("ckeckBoxSpan").innerText = '*';
        fehlerDiv.style.display = "inline-block";
        e.preventDefault();
    }

})


/*function allLetter(inputtxt) {
    var letters = /^[a-z]*$/i;
    if (!inputtxt.value.match(letters)) {
        alert('Please input letters only');
    }
}*/