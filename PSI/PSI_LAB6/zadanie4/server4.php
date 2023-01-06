<?php
$host = "127.0.0.1";
$port = 10000;
set_time_limit(0);
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Nie udało się stworzyć socketu");
$result = socket_bind($socket, $host, $port) or die("Could not
bind to socket\n");
echo "bind socket to port: $port on host: $host\n";
$result = socket_listen($socket, 3) or die("Could not set up
socket listener\n");
echo "start listening for connections - socket listen\n";
$spawn = socket_accept($socket) or die("Could not accept incoming
connection\n");
echo "spawn another socket to handle communication\n";
while (true) {
    $input = socket_read($spawn, 1024) or die("Could not read input\n");
    if ($input < 1) {
        echo "<p class='error'>Serwer zakończył prace</p>";
        socket_close($spawn); 
        socket_close($socket); 
        break;
    } else {
        echo "Read client input from socket\n";
        echo "Liczba podana przez użytkownika: " . $input . "\n";
        require_once("losuj.inc");
        $tab = losu($input);
        if ($tab != null) {
            $output = "[";
            for ($i = 0; $i < count($tab); $i++) {
                if ($i == count($tab) - 1) {
                    $output .= $tab[$i];
                } else {
                    $output .= $tab[$i] . ", ";
                }
            }
            $output .= "] dla n = " . $input;
            socket_write($spawn, $output) or die("Could not write output\n");
        }
        else {
            socket_close($spawn); 
            socket_close($socket); 
         }
    }
}
?>