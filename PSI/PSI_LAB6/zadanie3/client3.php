<?php
$host = "127.0.0.1";
$port = 10000;

set_time_limit(0);
$message;

echo "
------------------------------\n
Welcome to server on 127.0.0.1\n
Client: The 'quit' command terminates the client \n
";

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Nie udało się stworzyć socketu\n");

$result = socket_connect($socket, $host, $port) or die("Nie można połączyć się z serwerem\n");
echo "Socket połączony na porcie $port z $host\n";
while (true) {
    echo "Podaj ilość liczb do wylosowania: ";
    $message = readline();
    if ($message === "quit") {
        echo "\n";
        break;
    } else {
        socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
        echo "Message to server : $message\n";
    }

    $result = socket_read($socket, 1024) or die("Could not read  server response\n");
    echo "Reply From Server: $result\n";
}