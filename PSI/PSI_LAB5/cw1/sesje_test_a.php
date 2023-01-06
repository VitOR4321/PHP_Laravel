<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // rozpoczęcie istniejącej sesji lub stworzenie nowej
    session_start();
    // zmienna sesyjna
    $_SESSION["name"] = "Wiktor Górski";
    // wyświetlenie zmiennej
    echo "Jestem ".$_SESSION["name"];
    session_destroy();
    ?>
</body>
</html>