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

    echo $fiat->getModel();
    echo $fiat->getRokRozpProd();
    echo $fiat->getZdjecie();
    echo $fiat->getTypSilnika();
    echo $fiat->getZuzyciePaliwa();
    echo "<br>";
    echo $puma->getModel();
    echo $puma->getRokRozpProd();
    echo $puma->getZdjecie();
    echo $puma->getTypSilnika();
    echo $puma->getZuzyciePaliwa();
    echo "<br>";
    echo $merida->getModel();
    echo $merida->getRokRozpProd();
    echo $merida->getZdjecie();
    echo $merida->getRozmiarKol();
    echo $merida->getRozmiarRamy();
    ?>
</body>
</html>