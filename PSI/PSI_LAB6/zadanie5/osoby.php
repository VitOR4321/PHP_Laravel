<?php

class person {

private $fname;
private $lname;
private $age;
private $height;
private $weight;
private $gender;


public function __construct( $fname, $lname, $age, $height, $weight, $gender )
	{
	$this->fname   = $fname;
	$this->lname   = $lname;
	$this->age    = $age;
	$this->height = $height;
	$this->weight = $weight;
	$this->gender = $gender;
}

public function get_fname()
{
	return 	$this->fname;
}

public function get_lname()
{
	return 	$this->lname;
}

public function get_age()
{
	return 	$this->age;
}

public function get_height()
{
	return 	$this->height;
}

public function get_weight()
{
	return 	$this->weight;
}
public function get_gender()
{
	return 	$this->gender;
}

public function info()
{
	return "[".$this->get_fname().",".$this->get_lname().",".$this->get_age().",".$this->get_height().",".$this->get_weight().",".$this->get_gender()."]\n";
}	

}


class osoby {
private $people = array();   //Create an array of people


public function __construct()
{
$this->people[]  = new person("Jan","Nowak", 17, 190, 81,"M");
$this->people[]  = new person("John","Smith", 36, 180, 78,"M");
$this->people[]  = new person("Kate","Smith", 36, 170, 63,"K");
$this->people[]  = new person("Zofia","Nowak", 15, 160, 54,"K");
$this->people[]  = new person("Waldemar","Kowalski", 30, 195, 88,"M");
$this->people[]  = new person("Zuzanna","Mostowiak", 25, 180, 65,"K");
$this->people[]  = new person("Zofia","Wachowiak", 36, 180, 78,"K");

}

public function search_by_fname($sfname)
{
$mypeople = array();	
foreach ($this->people as $person)
 {
 if ($person->get_fname() == $sfname)
	 $mypeople[]=$person;
 }	
 return $mypeople;
}

public function search_by_lname($slname)
{
$mypeople = array();	
foreach ($this->people as $person)
 {
 if ($person->get_lname() == $slname)
	 $mypeople[]=$person;
 }	
 return $mypeople;
}

public function search_by_gender($sgender)
{
$mypeople = array();	
foreach ($this->people as $person)
 {
 if ($person->get_gender() == $sgender)
	 $mypeople[]=$person;
 }	
 return $mypeople;
}	

public function search_adult()
{
$mypeople = array();	
foreach ($this->people as $person)
 {
 if ($person->get_age() >= 18)
	 $mypeople[]=$person;
 }	
 return $mypeople;
}	


}
// utworzenie osób

$o = new osoby();
 /*
echo"<br>";
echo"<br>";
$m = $o->search_by_fname("Zofia");
 print_r($m);
 echo"<br>";
 echo"<br>";
 $g = $o->search_by_gender("K");
 print_r($g);
 */
?>