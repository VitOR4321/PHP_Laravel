<!DOCTYPE html>
<html lang="pl">
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
    require_once("scooter.php");

    $puma=new Skuter("Puma X 9000",2019,"PumaX9000.jpg","benzynowy",3.5);

    $opisPumy=new OpisHtml($puma);

    echo $opisPumy->generujOpis();

    ?>
</body>
</html>
