function wyslijFormularz(f)
{

}
function angielski()
{
    let sprawdzjezyk = document.getElementById("ang");
    let radia = document.getElementById("angol");
    if(sprawdzjezyk.checked == true)
    {
        radia.style.display="inline";
        document.getElementById("anglow").disabled = false;
        document.getElementById("angmed").disabled = false;
        document.getElementById("angbest").disabled = false;
        document.getElementById("angsuper").disabled = false;
    }
    else
    {
        radia.style.display="none";
        document.getElementById("anglow").disabled = true;
        document.getElementById("angmed").disabled = true;
        document.getElementById("angbest").disabled = true;
        document.getElementById("angsuper").disabled = true;
    }
}
function francuski()
{
    let sprawdzjezyk = document.getElementById("fra");
    let radia = document.getElementById("zabol");
    if(sprawdzjezyk.checked == true)
    {
        radia.style.display="inline";
        document.getElementById("fralow").disabled = false;
        document.getElementById("framed").disabled = false;
        document.getElementById("frabest").disabled = false;
        document.getElementById("frasuper").disabled = false;
    }
    else
    {
        radia.style.display="none";
        document.getElementById("fralow").disabled = true;
        document.getElementById("framed").disabled = true;
        document.getElementById("frabest").disabled = true;
        document.getElementById("frasuper").disabled = true;
    }
}
function niemiecki()
{
    let sprawdzjezyk = document.getElementById("nie");
    let radia = document.getElementById("szfabol");
    if(sprawdzjezyk.checked == true)
    {
        radia.style.display="inline";
        document.getElementById("nielow").disabled = false;
        document.getElementById("niemed").disabled = false;
        document.getElementById("niebest").disabled = false;
        document.getElementById("niesuper").disabled = false;
    }
    else
    {
        radia.style.display="none";
        document.getElementById("nielow").disabled = true;
        document.getElementById("niemed").disabled = true;
        document.getElementById("niebest").disabled = true;
        document.getElementById("niesuper").disabled = true;
    }
}

    function inny()
    {
        let sprawdzjezyk = document.getElementById("other");
        let text = document.getElementById("textother").value;
        let radia = document.getElementById("innol");
        let textWzor=/[A-z]/;
        if(sprawdzjezyk.checked == false && !textWzor.test(text))
        {
            radia.style.display="none";
            document.getElementById("otherlow").disabled = true;
            document.getElementById("othermed").disabled = true;
            document.getElementById("otherbest").disabled = true;
            document.getElementById("othersuper").disabled = true;
        }
        else if(sprawdzjezyk.checked == true && !textWzor.test(text))
        {
            radia.style.display="none";
            document.getElementById("otherlow").disabled = true;
            document.getElementById("othermed").disabled = true;
            document.getElementById("otherbest").disabled = true;
            document.getElementById("othersuper").disabled = true;
        }
        else
        {
            radia.style.display="inline";
            document.getElementById("otherlow").disabled = false;
            document.getElementById("othermed").disabled = false;
            document.getElementById("otherbest").disabled = false;
            document.getElementById("othersuper").disabled = false;
        }
    }


