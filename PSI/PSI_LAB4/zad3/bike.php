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
    require_once("bike.php");

    $merida=new Rower("Merida Matts",2021,"MeridaMatts.png",27.5,17);
    $bicycle=new Rower("Faka Maka",2022,"Faka.png",28,19);

    $opisMerida=new OpisHtml($merida);
    $opisBicycle=new OpisHtml($bicycle);

    echo $opisMerida->generujOpis();
    echo $opisBicycle->generujOpis();
?>
</body>
</html>
