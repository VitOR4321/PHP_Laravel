<?php
$host = "127.0.0.1";
$port = 5000;
set_time_limit(0);
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Nie udało się stworzyć socketa!");
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
    if ($input === "quit") {
        echo "Server zakończył prace\n";
        socket_close($spawn);  
        socket_close($socket);  
        break;
    } else {
        echo "Read client input from socket\n";
        echo "Komenda użytkownika: " . $input . "\n";
        require_once("osoby.php");
        $tab = explode(":", $input);
        if ($tab != null) {
            $com  = $tab[0];
            $variable = $tab[1];
            $value = $tab[2];
            if($com==='znajdz' && $variable === 'imie'){
                $m = $o->search_by_fname($value);
                if($m == null){
                    $output = "Nie ma takich osob.";
                }
                else{
                    for($i=0;$i<count($m);$i++){
                        $output .= $m[$i]->info() . "\n";
                    }
                }
            }
            elseif ($com==='znajdz' && $variable === 'plec') {
                $g = $o->search_by_gender($value);
                if($g == null){
                    $output = "Nie ma takich osob.";
                }
                else{
                    for($i=0;$i<count($g);$i++){
                        $output .= $g[$i]->info() ."\n";
                    }
                }
            }
            elseif ($com==='znajdz' && $variable === 'doroslych') {
                $a = $o->search_adult();
                if($a == null){
                    $output = "Nie ma takich osob.";
                }
                else{
                    for($i=0;$i<count($a);$i++){
                        $output .= $a[$i]->info()."\n";
                    }
                }
            }
            elseif ($com==='znajdz' && $variable === 'nazwisko') {
                $m = $o->search_by_lname($value);
                if($m == null){
                    $output = "Nie ma takich osob.";
                }
                else{
                    for($i=0;$i<count($m);$i++){
                        $output .= $m[$i]->info() ."\n";
                    }
                }
            }
            else{
                $output = "zła komenda";
            }
            socket_write($spawn, $output) or die("Could not write output\n");
        }
        else {
            socket_close($spawn); 
            socket_close($socket); 
         }
    }
}