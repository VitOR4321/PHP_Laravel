<?php

require_once("db_pgsql.php");
$db = new Db_Pgsql();
$host = "127.0.0.1";
$port = 7777;
set_time_limit(0);
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Nie udało się stworzyć socketa!");
$result = socket_bind($socket, $host, $port) or die("Could notbind to socket\n");
echo "bind socket to port: $port on host: $host\n";
$result = socket_listen($socket, 3) or die("Could not set upsocket listener\n");
echo "start listening for connections - socket listen\n";
while(true) {

$spawn = socket_accept($socket) or die("Could not accept incoming connection\n");
echo "spawn another socket to handle communication\n";

$input = socket_read($spawn, 1024) or die("Could not read input\n");
echo "read client input from socket\n";
echo "Client message :".$input."\n";

if ($input === "quit") {
	echo "Server zakończył prace\n";
	socket_close($spawn);  
	socket_close($socket);  
	break;
}
else {
	$tab = explode(":",$input);
	$mesage = "";
	
	if(count($tab)==3) {
		
		$db->connect();
		$sql = "SELECT * FROM ksiazki.kategoria WHERE 0=1;";
		
		switch($tab[1]) {
			case "tytul":
				$sql = "SELECT DISTINCT tytul,nazwa,opis FROM (ksiazki.ksiazka JOIN ksiazki.wydawnictwo ON (ksiazki.ksiazka.idwyd=ksiazki.wydawnictwo.id)) JOIN ksiazki.kategoria ON (ksiazki.ksiazka.idkat=ksiazki.kategoria.id) WHERE tytul='".$tab[2]."';";
				$db->query($sql);
				$res = $db->get_result();
				while($line=pg_fetch_array($res,null,PGSQL_ASSOC)) {
					foreach($line as $col_value) {
						$mesage .= $line["tytul"].", ".$line["nazwa"].", ".$line["opis"]."\n";
					}
				}
			break;
			case "wydawnictwo":
				$sql = "SELECT DISTINCT tytul,nazwa,opis FROM (ksiazki.ksiazka JOIN ksiazki.wydawnictwo ON (ksiazki.ksiazka.idwyd=ksiazki.wydawnictwo.id)) JOIN ksiazki.kategoria ON (ksiazki.ksiazka.idkat=ksiazki.kategoria.id) WHERE nazwa='".$tab[2]."';";
				$db->query($sql);
				$res = $db->get_result();
				while($line=pg_fetch_array($res,null,PGSQL_ASSOC)) {
					foreach($line as $col_value) {
						$mesage .= $line["tytul"].", ".$line["nazwa"].", ".$line["opis"]."\n";
					}
				}
			break;
			case "kategoria":
				$sql = "SELECT DISTINCT tytul,nazwa,opis FROM (ksiazki.ksiazka JOIN ksiazki.wydawnictwo ON (ksiazki.ksiazka.idwyd=ksiazki.wydawnictwo.id)) JOIN ksiazki.kategoria ON (ksiazki.ksiazka.idkat=ksiazki.kategoria.id) WHERE opis='".$tab[2]."';";
				$db->query($sql);
				$res = $db->get_result();
				while($line=pg_fetch_array($res,null,PGSQL_ASSOC)) {
					foreach($line as $col_value) {
						$mesage .= $line["tytul"].", ".$line["nazwa"].", ".$line["opis"]."\n";
					}
				}
			break;
			default:
				$mesage = "Nie ma takiego parametru jak ".$tab[1];
			break;
		}
		
		$db->disconnect();
	}
	else {
		$mesage = "Błąd - liczba elementów musi wynosić dokładnie 3.";
	}
	if($mesage==""){
		$mesage="Brak wyników.";
	}
	echo "Server message :".$mesage."\n";
	socket_write($spawn, $mesage, strlen ($mesage)) or die("Could not write output\n");
}

}

?>