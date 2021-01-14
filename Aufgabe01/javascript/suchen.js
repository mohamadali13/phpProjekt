"use strict";

const searchButton = document.getElementById('suchenButton');
const searchForm = document.getElementById('searchForm');
const searchEmail = document.getElementById('searchEmail');
const searchTheName = document.getElementById('searchName');
const searchPlz = document.getElementById('searchPlz');
const searchOrt = document.getElementById('searchOrt');
const searchTelephon = document.getElementById('searchTelephon');
const searchError = document.getElementById('searchError');
const searchingBox = document.getElementById('searchingBox');
const willkommenDiv = document.getElementById('willkommenDiv');
const resultTable = document.getElementById('resultTable');



searchForm.addEventListener('submit', (e) => {

    const letters = /^[0-9a-zA-Z]+$/;
    const numbers = /^[0-9]+$/;
    const regExp = /[a-zA-Z]/g;

    function hasNumber(myString) {
        return /\d/.test(myString);
    }
    if ((searchEmail.value === '' || searchEmail.value == null) &&
        (searchTheName.value === '' || searchTheName.value == null) &&
        (searchPlz.value == '' || searchPlz.value == null) &&
        (searchOrt.value === '' || searchOrt.value == null) &&
        (searchTelephon.value == '' || searchTelephon.value == null)) {
        e.preventDefault();

        searchError.style.display = 'inline-block';
        searchError.innerHTML = 'Sie haben nichts eingegeben, Bitte gebene min.1 Arrgument ein';

    }

});