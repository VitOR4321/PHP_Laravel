<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="client4.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<h1>Zadanie 4 Losowanie-liczb</h1>
<div class="formularz">
<form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
Podaj ilość liczb do wylosowania: <input type="number" name="liczba">
    <input type="submit" value="wyślij">
</form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET"){
if(isset($_GET["liczba"])){
    if(!is_numeric($_GET["liczba"])){
        echo "<p class='error'>Wprowadzono nie poprawną wartość!</p>";
    }
    else{
        toServer();
    }
    }
}

    function toServer(){
        $host = "127.0.0.1";
        $port = 10000;  
        set_time_limit(0);
        $message;
        $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Nie udało się stworzyć socketu\n");
        $result = socket_connect($socket, $host, $port) or die("Nie można połączyć się z serwerem\n");
        echo "<p>Socket połączony na porcie $port z $host</p>";
        $message = $_GET["liczba"];
        socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
        echo "<p>Message to server : $message</p>";
        $result = socket_read($socket, 1024) or die("Could not read  server response\n");
        echo "<p>Reply From Server: $result</p>";
    }

?>


</body>
</html>

