<?php
class Prijava{
    public $id;   
    public $predmet;   
    public $katedra;   
    public $sala;   
    public $datum;
    
    public function __construct($id=null, $predmet=null, $katedra=null, $sala=null, $datum=null)
    {
        $this->id = $id;
        $this->predmet = $predmet;
        $this->katedra = $katedra;
        $this->sala = $sala;
        $this->datum = $datum;
    }

    #funkcija prikazi sve getAll

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM prijave";
        return $conn->query($query);
    }

    #funkcija getById

    public static function getById($id, mysqli $conn){
        $query = "SELECT * FROM prijave WHERE id=$id";

        $myObj = array();
        if($msqlObj = $conn->query($query)){
            while($red = $msqlObj->fetch_array(1)){
                $myObj[]= $red;
            }
        }

        return $myObj;

    }

    #deleteById

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM prijave WHERE id=$this->id";
        return $conn->query($query);
    }

    #update
    public function update(mysqli $conn)
    {
        return Prijava::update2($conn);
    }

    public static function update2(mysqli $conn)
    {
         $query = "UPDATE prijave set predmet ='".$_POST['predmet']."',
         katedra = '".$_POST['katedra']."',sala = '".$_POST['sala']."',
         datum = '".$_POST['datum']."' WHERE id='".$_POST['id']."'";
         return $conn->query($query);

    }

    #insert add
    public static function add(Prijava $prijava, mysqli $conn)
    {
        $query = "INSERT INTO prijave(predmet, katedra, sala, datum)
        VALUES('$prijava->predmet','$prijava->katedra','$prijava->sala','$prijava->datum')";
        return $conn->query($query);
    }
}

?>