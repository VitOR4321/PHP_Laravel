<?php

	$ref = $_SERVER['HTTP_REFERER'];
	$idp = intval(substr($ref,strlen("http://foka.umg.edu.pl/~s47624/PSI/PSI_LAB5/zad2/lista_pracownikow.php?pracownik="),strlen($ref)));
	
	require_once('db_pgsql.php');
	$db = new Db_Pgsql();
	$db->connect();
	$sql = 
	"DELETE FROM rekrutacja.pracownicy 
	 WHERE idp=$idp;";
	$db->query($sql);
	$db->disconnect();
	
	header("Location: lista_pracownikow.php");
?>