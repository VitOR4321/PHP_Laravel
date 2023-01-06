<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
    include("script.inc");
    require_once("menu.php");
    require_once("car.php");

    $fiat=new Samochod("Fiat 225p",2020,"fiat225p.jpg","benzynowy+elektryczny",5);
    $merc=new Samochod("Mercedens Benz",2020,"Merc.jpg","benzynowy",6);

    $opisFiata=new OpisHtml($fiat);
    $opisMerc=new OpisHtml($merc);

    echo $opisFiata->generujOpis();
    echo $opisMerc->generujOpis();
    ?>
</body>
</html>
