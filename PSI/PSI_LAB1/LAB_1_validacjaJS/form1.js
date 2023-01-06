function nameCheck(name){
    // zmienna która jest odpowiedzialna za format wpisywanych danych
    let nameReg = /^[A-ZĘÓĄŚŁŻŹĆŃ]{1}[a-zęóąśłżźćń]{2,}\s[A-ZĘÓĄŚŁŻŹĆŃ]{1}[a-zęóąśłżźćń]{2,}$/;
    // warunek sprawdzający czy wpisane dane zgadzają się z wymaganym formatem danych
    if(!name.match(nameReg)){
        document.getElementById("b_imienazwisko").innerHTML="Proszę poprawnie wpisać imie i nazwisko";
        return false;
    }
    else{
        document.getElementById("b_imienazwisko").innerHTML="";
        return true;
    }
}

function yearCheck(year){
    // zmienna która jest odpowiedzialna za format wpisywanych danych
    let yearReg = /^[1-2]{1}[0-9]{3}$/;
    let currentYear = new Date().getFullYear();
    // warunek sprawdzający czy wpisane dane zgadzają się z wymaganym formatem danych
    if(!year.match(yearReg) || year > currentYear){
        document.getElementById("b_rok").innerHTML = "Prosze podać poprawny rok";
        return false;
    }
    else {
        document.getElementById("b_rok").innerHTML = "";
        return true;
    }
}

function yearInIndex(year){
    // pobranie roku i zmiana go na forme liczbową
   let yearInteger = parseInt(year);
   let yearDigitSum = 0;
    while(yearInteger){
        yearDigitSum += yearInteger % 10;
        yearInteger = Math.floor(yearInteger / 10);
      }
      if(yearDigitSum <=9)
      {
        yearDigitSum = "0" + yearDigitSum;
      }
   // zwrócenie sumy cyfr roku z dodaniem zera jeśli suma była mniejsza lub równa 9
   return yearDigitSum;
}

function indexCheck(index, year){
    // zmienna która jest odpowiedzialna za format wpisywanych danych
    let indexReg = /^[A-Z]{1}\/[0-9]{5,6}$/;
     // warunek sprawdzający czy wpisane dane zgadzają się z wymaganym formatem
    //, oraz czy 2 ostateni litery w indeksie są sumą cyfr rozpoczecia roku akademickiego
    if(!index.match(indexReg)){
        document.getElementById("b_nrindeksu").innerHTML = "Niepoprawny numer indeksu ";
        return false;
    }
    else if(index.slice(-2) != yearInIndex(year)){
        document.getElementById("b_nrindeksu").innerHTML = "Dwie ostatnie cyfry w indeksie nie są sumą cyfr roku";
        return false;
    }
    else {
        document.getElementById("b_nrindeksu").innerHTML = "";
        return true;
    }
}


function formCheck(){
    let name = document.forms["formularz" ]["imienazwisko"].value;
    let year = document.forms["formularz" ]["rok"].value;
    let index = document.forms["formularz" ]["nrindeksu"].value;

    if(!nameCheck(name)){
        document.forms["formularz" ]["imienazwisko"].focus();
        return false;
    }
    else if(!yearCheck(year)){
        document.forms["formularz" ]["rok"].focus();
        return false; 
    }
    else if(!indexCheck(index, year)){
        document.forms["formularz" ]["nrindeksu"].focus();
        return false;
    }
    else{
        alert("Udało się wysłać formularz");
        return true;
    }
}