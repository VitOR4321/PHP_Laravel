<?php

interface InterfejsOpis{
    public function getDaneOpisu();
    public function generujOpis();
}

interface InterfejsDaneOpisu
{
 public function getTytul();
 public function getDane();
 public function getZdjecie();
}

class Opis implements InterfejsOpis{
    protected $tytul="";
    protected $dane="";
    protected $zdjecie="";

    protected $obiekt=null;

    public function __construct($ob)
    {
    $this->obiekt=$ob;
    $this->setDaneOpisu();
    }

    public function getDaneOpisu()
    {
    return $this->tytul;
    }
    public function setDaneOpisu()
    {
    $this->tytul=$this->obiekt->getTytul();
    }
    public function generujOpis()
    {
    $s="<h2>$this->tytul</h2>\n";
    return $s;
    }
}
///////////////////////////////////////////////////////////////////
// Klasa abstrakcyjna dla klasy pojazd
    abstract class PojazdAbstrakcyjny {
        abstract public function setModel($m);
        abstract public function setRokRozpProd($m);
      }
 ///////////////////////////////////////////////////////////////////
 // Klasa Pojazd poszerzona przez PojazdAbstrakcyjny i implementująca InterfejsDaneOpisu  
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
        ///////////////////////////////////

        public function getTytul()
        {
        return $this->model;
        }
        public function getDane()
        {
        return "Produkowany od ".$this->rokRozpProd." roku";
        }
        public function getZdjecie()
        {
        return $this->zdjecie;
        }
     }
///////////////////////////////////////////////////////////////////
// Klasy pochodne Pojazd

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
    public function setRokRozpProd($m){
    $this->rokRozpProd=$m;
    }
        
   public function setTypSilnika($m){
   $this->typSilnika=$m;
   }


    public function setZuzyciePaliwa($m){
    $this->zuzyciePaliwa=$m;
    }

    public function getDane()
    {
    return 
    "Produkowany od ".$this->rokRozpProd." roku.\r\n
     Typ silnika: ".$this->typSilnika.".\r\n
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
        public function setRokRozpProd($m){
        $this->rokRozpProd=$m;
        }

        public function setTypSilnika($m){
        $this->typSilnika=$m;
        }

        public function setZuzyciePaliwa($m){
        $this->zuzyciePaliwa=$m;
        }

        public function getDane()
        {
        return 
        "Produkowany od ".$this->rokRozpProd." roku.\r\n
        Typ silnika: ".$this->typSilnika.".\r\n
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
        public function setRokRozpProd($m){
        $this->rokRozpProd=$m;
        }

        public function setRozmiarKol($m){
        $this->rozmiarKol=$m;
        }
     

        public function setRozmiarRamy($m){
        $this->rozmiarRamy=$m;
        }

        public function getDane()
        {
        return 
        "Produkowany od ".$this->rokRozpProd." roku.\r\n
        Rozmiar ramy: ".$this->rozmiarKol."\".\r\n
        Rozmiar kół: ".$this->rozmiarRamy."\".\r\n";
        }
  
}
///////////////////////////////////////////////////////////////////
// Klasy OpisHtml towrząca grafikę dla strony HTML

class OpisHtml extends Opis
{
 public function setDaneOpisu()
 {
 parent::setDaneOpisu();
 $this->zdjecie=$this->obiekt->getZdjecie();
 $this->tytul=$this->obiekt->getTytul();
 $this->dane=$this->obiekt->getDane();
 }
 public function generujOpis()
 {
 $s="<div class='obiekt'>";
 $s.="<h2>$this->tytul</h2>\n";
 $s.="<img src=".$this->zdjecie." alt='zdjecie'>\n";
 $s.="<h3>$this->dane</h3>\n";
 $s.="</div>";
 return $s;
 }
}
?>