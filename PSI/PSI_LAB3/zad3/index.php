<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
<fieldset>
    Ilość losowanych liczb: <input type="number" name="ilosc">
    Granica losowania od: <input type="number" step=any name="granicaOD">
    Granica losowania do: <input type="number" step=any name="granicaDO">
    <input type="submit" name="wyslij">

</fieldset>
    <br>
<fieldset>
    suma: <input type="checkbox" name="suma">
    średnia: <input type="checkbox" name="srednia">
    max: <input type="checkbox" name="max">
    min: <input type="checkbox" name="min">
    liczba dodatnich: <input type="checkbox" name="dod">
    liczba ujemnych: <input type="checkbox" name="uje">
    liczba zer: <input type="checkbox" name="zera">
    suma kwadratów: <input type="checkbox" name="kwadraty">
    suma wartości bezwzględnych: <input type="checkbox" name="bezwzgledne">
</fieldset>
</form>

    <?php
    function random_float ($min,$max) {
    return ($min+lcg_value()*(abs($max-$min)));
    };
    // walidacja liczb typu float
    // $number_validation_regex = "/^(?:-(?:[1-9](?:\\d{0,2}(?:,\\d{3})+|\\d*))|(?:0|(?:[1-9](?:\\d{0,2}(?:,\\d{3})+|\\d*))))(?:.\\d+|)$/";

    if (isset($_GET["ilosc"]) && isset($_GET["granicaOD"]) && isset($_GET["granicaDO"])){
        $n=$_GET["ilosc"];
        $od=$_GET["granicaOD"];
        $do=$_GET["granicaDO"];
        $digitArray = array();

        for($i=0;$i<$n;$i++){
            $digitArray[$i]=round(random_float($od,$do),1);
        }
        sort($digitArray);

        for($i=0;$i<$n;$i++){
            echo "$digitArray[$i], ";
        }
        
///////////////////////////////////////////////////////////
        if(isset($_GET['suma'])){
            $suma = 0;
            for($i=0;$i<$n;$i++){
                $suma = $suma +$digitArray[$i];
            }
            echo "<p>Suma wynosi: $suma</p>";
        }
////////////////////////////////////////////////////////////
        if(isset($_GET['srednia'])){
            $srednia = 0;
        for($i=0;$i<$n;$i++){
            $srednia = $srednia +$digitArray[$i];
            }
            $srednia = $srednia / $n;
            echo "<p>Średnia wynosi: $srednia</p>";
        }
////////////////////////////////////////////////////////////
        if(isset($_GET['max'])){
            $pozycjaMax = $n-1;
            echo "<p>Max wynosi: $digitArray[$pozycjaMax]</p>";
        }

////////////////////////////////////////////////////////////
        if(isset($_GET['min'])){
            echo "<p>Min wynosi: $digitArray[0]</p>";
        }
////////////////////////////////////////////////////////////
        if(isset($_GET['dod'])){
            $dod = 0;
            for($i=0;$i<$n;$i++){
                if($digitArray[$i]>0){
                    $dod++;
                }
            }
            echo "<p>Ilość liczb dodatnich wynosi: $dod</p>";
        } 
////////////////////////////////////////////////////////////
        if(isset($_GET['uje'])){
            $uje = 0;
            for($i=0;$i<$n;$i++){
                if($digitArray[$i]<0){
                    $uje++;
                }
            }
            echo "<p>Ilość liczb ujemnych wynosi: $uje</p>";
        } 
////////////////////////////////////////////////////////////
        if(isset($_GET['zera'])){
            $z = 0;
            for($i=0;$i<$n;$i++){
                if($digitArray[$i]==0){
                    $z++;
                }
            }
            echo "<p>Ilość zer wynosi: $z</p>";
        } 
///////////////////////////////////////////////////////////
        if(isset($_GET['kwadraty'])){
            $suma = 0;
            for($i=0;$i<$n;$i++){
                $suma = $suma +pow($digitArray[$i],2);
            }
            echo "<p>Suma kwadratów wynosi: $suma</p>";
        }
///////////////////////////////////////////////////////////
        if(isset($_GET['bezwzgledne'])){
            $suma = 0;
            for($i=0;$i<$n;$i++){
                $suma = $suma +abs($digitArray[$i]);
            }
            echo "<p>Suma wartości bezwzględnych wynosi: $suma</p>";
        }
}
    ?>
</body>
</html>