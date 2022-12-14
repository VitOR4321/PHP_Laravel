<?php
$host = "127.0.0.1";
$port = 10000; // tutaj port i host muszą być takie same jak zdefiniowano w server.php.
// No Timeout 
set_time_limit(0);
$message = "Hello Server";

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
echo "Socket Create\n";

$result = socket_connect($socket, $host, $port) or die("Could not connect to server\n"); 
echo "Socket Connect to port $port on host/server $host\n";

socket_write($socket, $message, strlen($message)) or die("Could not send data to server\n");
echo "Message to server : $message\n";

$result = socket_read ($socket, 1024) or die("Could not read server response\n");
echo "Reply From Server :".$result;

$result = socket_connect ($socket, $host, $port);
if ($result < 0) {
 echo "socket_connect() failed.\nReason: ($result) " . 
socket_strerror($result) . "\n";
} else {
 echo "The connection to the server '$host' has been established\n"
}

socket_close($socket);
?>