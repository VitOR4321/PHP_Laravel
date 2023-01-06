<?php
class Pracownik{

    private $nazwisko;
    private $imie;
    private $wiek;
    private $doswiadczenie;
    private $zainteresowania;

    public function __construct()
    {
        $this->set_field_value("nazwisko",isset($_SESSION['nazwisko'])?$_SESSION['nazwisko']:'Kowalski');
        $this->set_field_value("imie",isset($_SESSION['imie'])?$_SESSION['imie']:'Jan');
        $this->set_field_value("wiek",isset($_SESSION['wiek'])?$_SESSION['wiek']:'25');
        $this->set_field_value("doswiadczenie",isset($_SESSION['doswiadczenie'])?$_SESSION['doswiadczenie']:'Brak');
        $this->set_field_value("zainteresowania",isset($_SESSION['zainteresowania'])?$_SESSION['zainteresowania']:'Brak');
    }

    public function get_field_name($name){
        switch($name){
            case 'nazwisko': 
                return $this->nazwisko;
            break;
            case 'imie':
                return $this->imie;
            break;
            case 'wiek':
                return $this->wiek;
            break;
            case 'doswiadczenie':
                return $this->doswiadczenie;
            break;
            case 'zainteresowania':
                return $this->zainteresowania;
            break;
            default: 
                return 0; 
            break;
        }
    }

    public function set_field_value($name, $v){
        switch($name){
            case 'nazwisko': 
                $this->nazwisko=$v;
            break;
            case 'imie':
                $this->imie=$v;
            break;
            case 'wiek':
                $this->wiek=$v;
            break;
            case 'doswiadczenie':
                $this->doswiadczenie=$v;
            break;
            case 'zainteresowania':
                $this->zainteresowania=$v;
            break;
        }
    }



    public function insert_to_pgsql(){
        $base = new Db_Pgsql();
        $base->connect();
  $sql = "INSERT INTO rekrutacja.pracownicy(nazwisko,imie,wiek,doswiadczenie,zainteresowania) 
          VALUES ('".$this->get_field_name("nazwisko")."','".$this->get_field_name("imie")."',".$this->get_field_name("wiek").",'".$this->get_field_name("doswiadczenie")."','".$this->get_field_name("zainteresowania")."');";
        $base->query($sql);
        $base->disconnect();
    }

}
?>