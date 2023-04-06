<?php

class Modelo{
    private $Modelo;
    private $db;
    private $datos;

    public function __construct()
    {
        $servername='localhost';
        $username='victorDB';
        $password='victorDB';
        $database='restaurante';
        $this->Modelo = array();
        $this->db = new PDO("mysql:host=$servername; dbname=$database", $username, $password);
    }

    public function insertar($tabla, $campos,$data){
        $consulta="insert into ".$tabla. " " . $campos ." values(". $data .")";
        echo "<br> insertar: ".$consulta;
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
     }


     public function mostrar($tabla,$condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        echo $consul;
            $resu=$this->db->query($consul);
            while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
                $this->datos[]=$filas;
            }
            return $this->datos;
    }
    
    public function actualizar($tabla, $data, $condicion){       
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }

    public function eliminar($tabla, $condicion){
        $eli="delete from ".$tabla." where ".$condicion;
        $res=$this->db->query($eli);
        if ($res) {
            return true; 
        }else {
            return false;
        }
    }
}

?>