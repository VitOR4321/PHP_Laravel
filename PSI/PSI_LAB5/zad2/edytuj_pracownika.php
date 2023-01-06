<?php

	$ref = $_SERVER['HTTP_REFERER'];
	$idp = intval(substr($ref,strlen("http://foka.umg.edu.pl/~s47624/PSI/PSI_LAB5/zad2/lista_pracownikow.php?pracownik="),strlen($ref)));
	
	$nazwisko = $_POST["nazwisko"];
	$imie = $_POST["imie"];
	$wiek = $_POST["wiek"];
	$doswiadczenie = $_POST["doswiadczenie"];
	$zainteresowania = $_POST["zainteresowania"];
	
	require_once('db_pgsql.php');
	$db = new Db_Pgsql();
	$db->connect();
	$sql = 
	"UPDATE rekrutacja.pracownicy 
	 SET nazwisko='$nazwisko', imie='$imie', wiek=$wiek, doswiadczenie='$doswiadczenie', zainteresowania='$zainteresowania' 
	 WHERE idp=$idp;";
	$db->query($sql);
	$db->disconnect();
	
	header("Location: lista_pracownikow.php");
?>