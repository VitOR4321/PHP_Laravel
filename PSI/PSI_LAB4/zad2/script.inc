<?php

interface InterfejsOpis{
    public function getDaneOpisu();
    public function generujOpis();
}

interface InterfejsDaneOpisu
{
 public function getNaglowek2();
 public function getNaglowek3();
 public function getNaglowek4();
 public function getZdjecie();
}


class Opis implements InterfejsOpis{
    protected $naglowek2="";
    protected $naglowek3="";
    protected $naglowek4="";
    protected $zdjecie="";
    protected $tabak=[]; //tablica akapitów

    protected $obiekt=null;

    public function __construct($ob)
    {
    $this->obiekt=$ob;
    $this->setDaneOpisu();
    }

    public function getDaneOpisu()
    {
    return $this->naglowek2;
    }
    public function setDaneOpisu()
    {
    $this->naglowek2=$this->obiekt->getNaglowek2();
    }
    public function generujOpis()
    {
    $s="<h2>$this->naglowek2</h2>\n";
    return $s;
    }

}
 

abstract class PojazdAbstrakcyjny {
    abstract public function setModel($m);
    abstract public function setRokRozpProd($m);
  }

  class Pojazd extends PojazdAbstrakcyjny implements InterfejsDaneOpisu 
 {
    private $model="";
    private $rokRozpProd=0; 
    private $zdjecie="images/";
    public function __construct($m,$rrp,$z)
    {
        $this->setModel($m);
        $this->setRokRozpProd($rrp);
        $this->setZdjecie($z);
    }


    public function setModel($m){
    $this->model=$m;
    }


    public function setRokRozpProd($m){
    $this->rokRozpProd=$m;
    }


    public function setZdjecie($m){
    $this->zdjecie.=$m;
    }

    //////////////////////////////////////////

    public function getNaglowek2()
    {
    return $this->model;
    }
    public function getNaglowek3()
    {
    return "Produkowany od ".$this->rokRozpProd." roku";
    }
    public function getZdjecie()
    {
    return $this->zdjecie;
    }
    public function getNaglowek4(){
        return null;
    }

}

class Samochod extends Pojazd implements InterfejsDaneOpisu
{
    private $typSilnika="";
    private $zuzyciePaliwa=0;
   public function __construct($m,$rrp,$z,$ts,$zp)
    {
        parent::__construct($m,$rrp,$z);
        $this->setTypSilnika($ts);
        $this->setZuzyciePaliwa($zp);
    }

   public function setTypSilnika($m){
   $this->typSilnika=$m;
   }


    public function setZuzyciePaliwa($m){
    $this->zuzyciePaliwa=$m;
    }

    public function getNaglowek4()
    {
    return 
    "Typ silnika: ".$this->typSilnika.".\r\n
     Zużycie paliwa: ".$this->zuzyciePaliwa." L/100km.\r\n";
    }
}


class Skuter extends Pojazd implements InterfejsDaneOpisu
{   
    private $typSilnika="";
    private $zuzyciePaliwa=0;
   public function __construct($m,$rrp,$z,$ts,$zp)
    {
        parent::__construct($m,$rrp,$z);
        $this->setTypSilnika($ts);
        $this->setZuzyciePaliwa($zp);
    }


        public function setTypSilnika($m){
        $this->typSilnika=$m;
        }

        public function setZuzyciePaliwa($m){
        $this->zuzyciePaliwa=$m;
        }

        public function getNaglowek4()
        {
        return 
        "Typ silnika: ".$this->typSilnika.".\r\n
        Zużycie paliwa: ".$this->zuzyciePaliwa." L/100km.\r\n";
        }
  
}


class Rower extends Pojazd implements InterfejsDaneOpisu
{
    private $rozmiarKol="";
    private $rozmiarRamy=0;
   public function __construct($m,$rrp,$z,$ts,$zp)
    {
        parent::__construct($m,$rrp,$z);
        $this->setRozmiarKol($ts);
        $this->setRozmiarRamy($zp);
    }


        public function setRozmiarKol($m){
        $this->rozmiarKol=$m;
        }
     

        public function setRozmiarRamy($m){
        $this->rozmiarRamy=$m;
        }

        public function getNaglowek4()
        {
        return 
        "Rozmiar ramy: ".$this->rozmiarKol."\".\r\n
        Rozmiar kół: ".$this->rozmiarRamy."\".\r\n";
        }
  
}

class OpisHtmlDlugiBlok extends Opis
{
 public function setDaneOpisu()
 {
 parent::setDaneOpisu();
 $this->zdjecie=$this->obiekt->getZdjecie();
 $this->naglowek3=$this->obiekt->getNaglowek3();
 $this->naglowek4=$this->obiekt->getNaglowek4();
 }
 public function generujOpis()
 {
 $s="<div>";
 $s.="<h2>$this->naglowek2</h2>\n"; //lub $s.=parent::generujOpis();
 $s.="<img src=".$this->zdjecie." alt='zdjecie'>\n";
 $s.="<h3>$this->naglowek3</h3>\n";
 $s.="<h3>$this->naglowek4</h3>\n";
 $s.="</div>";
 return $s;
 }
}

?>