<?php
$host = '127.0.0.1'; // twoje lokalne IP w systemie
$port = 10000; // Numer portu może być dowolną dodatnią liczbą
// całkowitą z przedziału od 1024 do 65535.
set_time_limit(0);

// create socket
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
echo "bind socket to port: $port on host: $host\n";

$result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
echo "start listening for connections - socket listen\n";

$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
echo "spawn another socket to handle communication\n";

$input = socket_read($spawn, 1024) or die("Could not read input\n");
echo "read client input from socket\n";

$output = md5($input). "\n";

socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");

socket_close($spawn); // zamkniecie gniazda komunikacji z klientem
socket_close($socket); // zamkniecie gniazda serwera /koniec nasłuchiwania

?>