<?php
abstract class PojazdAbstrakcyjny {
    abstract public function setModel($m);
    abstract public function getModel();
    abstract public function setRokRozpProd($m);
    abstract public function getRokRozpProd();
  }

  class Pojazd extends PojazdAbstrakcyjny 
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

    public function getModel(){
    return "<h2>".$this->model."</h2>";
    }
    public function setModel($m){
    $this->model=$m;
    }

    public function getRokRozpProd(){
    return "<p>".$this->rokRozpProd."</p>";
    }
    public function setRokRozpProd($m){
    $this->rokRozpProd=$m;
    }

    public function getZdjecie(){
    return "<img src=".$this->zdjecie." alt='zdjecie'>";
    }
    public function setZdjecie($m){
    $this->zdjecie.=$m;
    }
}

class Samochod extends Pojazd 
{
    private $typSilnika="";
    private $zuzyciePaliwa=0;
   public function __construct($m,$rrp,$z,$ts,$zp)
    {
        parent::__construct($m,$rrp,$z);
        $this->setTypSilnika($ts);
        $this->setZuzyciePaliwa($zp);
    }
   public function getTypSilnika(){
   return "<p>".$this->typSilnika."</p>";
   }
   public function setTypSilnika($m){
   $this->typSilnika=$m;
   }

   public function getZuzyciePaliwa(){
    return "<p>".$this->zuzyciePaliwa." L/100km</p>";
    }
    public function setZuzyciePaliwa($m){
    $this->zuzyciePaliwa=$m;
    }
}


class Skuter extends Pojazd 
{   
    private $typSilnika="";
    private $zuzyciePaliwa=0;
   public function __construct($m,$rrp,$z,$ts,$zp)
    {
        parent::__construct($m,$rrp,$z);
        $this->setTypSilnika($ts);
        $this->setZuzyciePaliwa($zp);
    }

    public function getTypSilnika(){
        return "<p>".$this->typSilnika."</p>";
        }
        public function setTypSilnika($m){
        $this->typSilnika=$m;
        }
     
    public function getZuzyciePaliwa(){
        return "<p>".$this->zuzyciePaliwa." L/100km</p>";
        }
        public function setZuzyciePaliwa($m){
        $this->zuzyciePaliwa=$m;
        }
  
}


class Rower extends Pojazd 
{
    private $rozmiarKol="";
    private $rozmiarRamy=0;
   public function __construct($m,$rrp,$z,$ts,$zp)
    {
        parent::__construct($m,$rrp,$z);
        $this->setRozmiarKol($ts);
        $this->setRozmiarRamy($zp);
    }

    public function getRozmiarKol(){
        return "<p>".$this->rozmiarKol."\"</p>";
        }
        public function setRozmiarKol($m){
        $this->rozmiarKol=$m;
        }
     
    public function getRozmiarRamy(){
        return "<p>".$this->rozmiarRamy."\"</p>";
        }
        public function setRozmiarRamy($m){
        $this->rozmiarRamy=$m;
        }
  
}

?>