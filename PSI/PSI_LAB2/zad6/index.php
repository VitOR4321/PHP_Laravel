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
    $algorytm_szyfrowania = array("md5","sha1","sha256");
    $tekst_do_zaszyfrowania = array("Wydział Elektryczny","Kierunek Informatyka","Projektowanie Serwisów 
    Internetowych");
    szyfruj($algorytm_szyfrowania, $tekst_do_zaszyfrowania);
    
    ?>
</body>
</html>