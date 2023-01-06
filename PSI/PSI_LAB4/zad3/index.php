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


    echo<<<END
        <div class='obiekt'>
        <h1>Witaj w katalogu samochodów</h1>
        <h3>Znajdujesz się na stronie głównej</h3>
        </div>
    END;


    ?>
    
</body>
</html>