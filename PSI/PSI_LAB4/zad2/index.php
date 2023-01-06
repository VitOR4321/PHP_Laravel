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
    require_once("script.inc");
    $fiat=new Samochod("Fiat 225p",2020,"fiat225p.jpg","benzynowy+elektryczny",5);
    $puma=new Skuter("Puma X 9000",2019,"PumaX9000.jpg","benzynowy",3.5);
    $merida=new Rower("Merida Matts",2021,"MeridaMatts.png",27.5,17);
    $merc=new Samochod("Mercedens Benz",2020,"Merc.jpg","benzynowy",6);
    $bicycle=new Rower("Faka Maka",2022,"Faka.png",28,19);

    $opisFiata=new OpisHtmlDlugiBlok($fiat);
    $opisPumy=new OpisHtmlDlugiBlok($puma);
    $opisMerida=new OpisHtmlDlugiBlok($merida);
    $opisMerc=new OpisHtmlDlugiBlok($merc);
    $opisBicycle=new OpisHtmlDlugiBlok($bicycle);

    echo $opisFiata->generujOpis();
    echo $opisPumy->generujOpis();
    echo $opisMerida->generujOpis();
    echo $opisMerc->generujOpis();
    echo $opisBicycle->generujOpis();


?>
</body>
</html>