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
        $ts = array();
        for($i = 0;$i<10;$i++)
        {
        $ts[$i] = rand(-100,100);
        echo $ts[$i]." ";
        }
        echo "<br>";

        session_start();
        if(isset($_SESSION["tablica"])){
            for($i = 0;$i<10;$i++){
                echo $_SESSION["tablica"][$i]." ";
            }
       
        }
        else{
             $_SESSION["tablica"] = $ts;
             for($i = 0;$i<10;$i++){
                echo $_SESSION["tablica"][$i]." ";
            }
    }
    echo "<br>";
    $_SESSION["tablica1"] = array();
    for($i = 0;$i<10;$i++){
        $_SESSION["tablica1"][$i] = rand(-100,100);
        echo $_SESSION["tablica1"][$i]." ";
    }
    session_destroy();
    ?>
</body>
</html>