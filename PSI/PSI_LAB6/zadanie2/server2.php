<?php
$host = "127.0.0.1";
$port = 10000; 

set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");

$result = socket_bind($socket, $host, $port) or die("Could not bind to socket\n");
echo "bind socket to port: $port on host: $host\n";

while(true) {

    $result = socket_listen($socket, 3) or die("Could not set up socket listener\n");
    echo "start listening for connections - socket listen\n";

    $spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
    echo "spawn another socket to handle communication\n";

    $input = socket_read($spawn, 1024) or die("Could not read input\n");
    echo "read client input from socket\n";

    // output
    $output = strrev($input) . "\n";
    socket_write($spawn, $output, strlen ($output)) or die("Could not write output\n");
    if ($input == "quit"){
        socket_close($spawn);
    } 
    else if ($input == "shutdown"){
        break;
    } 
}

socket_close($spawn); 
socket_close($socket); 


?>