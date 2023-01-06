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
Liczba N<input type="number" name="n">
Liczba Z<input type="number" name="z">

<select name="opcja">
    <option value="parz">parzyste</option>
    <option value="nieparz">nieparzyste</option>
    <option value="przezT">podzielne przez 3</option>
    <option value="przezP">podzielne przez 5</option>
</select>


<select name="kolory">
    <option value="#FF0000">czerwony</option>
    <option value="#00FF00">zielony</option>
    <option value="#0000FF">niebieski</option>
</select>

<input type="submit" name="submit">
</form>

    <?php
if(isset($_GET["n"]) && isset($_GET["z"])){
   
    $n = $_GET["n"];
    $z = $_GET["z"];
    $digitArray = array();
    if($n<$z){
        for($i=0;$i<$n;$i++){
            $digitArray[$i]=rand(0,$z);
            echo"<span>$digitArray[$i]</span><br>";
        }
    if(!empty($_GET["opcja"])){
        $selected = $_GET["opcja"];
        $color = $_GET["kolory"];
        for($i=0;$i<$n;$i++){
            if($selected=="parz" && $digitArray[$i]%2==0){
                echo"<span style='color: $color;'>$digitArray[$i] </span>";
            }
            elseif($selected=="nieparz" && $digitArray[$i]%2!=0){
                echo"<span style='color: $color;'>$digitArray[$i] </span>";
            }
            elseif($selected=="przezT" && $digitArray[$i]%3==0){
                echo"<span style='color: $color;'>$digitArray[$i] </span>";
            }
            elseif($selected=="przezP" && $digitArray[$i]%5==0){
                echo"<span style='color: $color;'>$digitArray[$i] </span>";
            }
            else{
                echo"<span>$digitArray[$i] </span>";
            }
        }
       
    }}
    else{
        echo"Liczba N jest większa lub równa od Z.";
    }}

    ?>
</body>
</html>