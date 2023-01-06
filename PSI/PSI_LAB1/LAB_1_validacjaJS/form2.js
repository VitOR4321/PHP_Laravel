function bilecikulg()
{
    let biletulgowy = document.getElementById("ulga");
    let title =  document.getElementById("idilenag");
    let button = document.getElementById("idwyslij");
    let ulgowe = document.getElementById("idileulg");
    if(biletulgowy.checked == true) {
        button.style.display="block";
        title.style.display="block";
        ulgowe.style.display="block";
    }
    else {
        button.style.display="none";
        title.style.display="none";
        ulgowe.style.display="none";
    }
}
function bileciknorm()
{
    let biletnormalny = document.getElementById("norm");
    let normalne = document.getElementById("idilenor");
    let title =  document.getElementById("idilenag");
    let button = document.getElementById("idwyslij");

    if(biletnormalny.checked == true) {
        button.style.display="block";
        title.style.display="block";
        normalne.style.display="block";
    }
    else {
        button.style.display="none";
        title.style.display="none";
        normalne.style.display="none";
    }
}
function wyslijFormularz(f)
{
    let iloscBiletowUlgowych =  document.getElementById("idileulg").value;
    let iloscBiletowNormalnych =  document.getElementById("idilenor").value;
    let biletulgowy = document.getElementById("ulga");
    let biletnormalny = document.getElementById("norm");
    if(biletulgowy.checked == true && biletnormalny.checked == false)
    {
        if(isNaN(iloscBiletowUlgowych))
        {
            alert("prosze podac liczbe w ulgowych");
            document.getElementById("idileulg").focus();
            return false;
        }
        else if(iloscBiletowUlgowych < 0 || iloscBiletowUlgowych == "")
        {
            alert("liczba musi byc wieksza od zera w ulgowych");
            document.getElementById("idileulg").focus();
            return false;
        }
        else
        {
            alert("Poprawny formularz!");
            return true;
        }
    }
    else if(biletnormalny.checked == true && biletulgowy.checked == false)
    {
        if(isNaN(iloscBiletowNormalnych))
        {
            alert("prosze podac liczbe w normalnych");
            document.getElementById("idileulg").focus();
            return false;
        }
        else if(iloscBiletowNormalnych < 0 || iloscBiletowNormalnych == "")
        {
            alert("liczba musi byc wieksza od zera w normalnych");
            document.getElementById("idileulg").focus();
            return false;
        }
        else
        {
            alert("Poprawny formularz!");
            return true;
        }
    }
    else if(biletnormalny.checked == true && biletulgowy.checked == true)
    {
        if(isNaN(iloscBiletowNormalnych))
        {
            alert("prosze podac liczbe w normalnych");
            document.getElementById("idileulg").focus();
            return false;
        }
        else if(iloscBiletowNormalnych < 0 || iloscBiletowNormalnych == "")
        {
            alert("liczba musi byc wieksza od zera w normalnych");
            document.getElementById("idileulg").focus();
            return false;
        }
        else if(isNaN(iloscBiletowNormalnych))
        {
            alert("prosze podac liczbe w normalnych");
            document.getElementById("idileulg").focus();
            return false;
        }
        else if(iloscBiletowNormalnych < 0 || iloscBiletowNormalnych == "")
        {
            alert("liczba musi byc wieksza od zera w normalnych");
            document.getElementById("idileulg").focus();
            return false;
        }
        else
        {
            alert("Poprawny formularz!");
            return true;
        }
    }
}