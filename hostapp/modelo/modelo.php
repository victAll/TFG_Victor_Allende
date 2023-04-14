<?php
include('conexion.php');
include('session.php');

class Modelo{
    private $Modelo;
    private $db;
    private $datos;

    public function __construct()
    {
        $this->Modelo = array();
        $this->db = conectar_param_pdo('hostapp');
    }

    public function insertar($tabla, $campos,$data){
        $consulta="insert into ".$tabla. " " . $campos ." values(". $data .")";

        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
     }


     public function mostrar($tabla, $campos, $condicion){

        try {//
            $consul="select " .$campos. " from ".$tabla." where ".$condicion.";";
            //echo $consul;
                $resu=$this->db->query($consul);
                while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
                    $this->datos[]=$filas;
                }
                return $this->datos;
     
        } catch (PDOException $err) {
           return "Error al consultar con base de datos: ".$err;
           echo $err;
        }





    }

    /**
     * Función genérica de actualizacion - update
     */
    public function actualizar($tabla, $data, $condicion)
    {
        //inicio creacio sql update
        $sql = "update " . $tabla . " set ";
        //array opara recoger los campos que se quieren actualizar
        $ar_campos = array();
        //Y transformamos a posiciones de array en formato para sql
        foreach ($data as $campo => $value) {
            //transformamos a posiciones de array en formato para sql
            $ar_campos[] = $campo . " = " . "'" . $value . "'";
        }
        //Utilizamos implode para generar un strig y concatenar a la sql
        $sql .= implode(",", $ar_campos);
        //añadimos el where
        $sql .= " where " . $condicion;

        $resultado = $this->db->query($sql);
        if ($resultado) {
            return true;
        } else {
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

    public function mostrar_reservas_admin(){
         $consul="SELECT res.id as id, res.nombre as nombre_reserva, res.fecha_reserva as fecha_reserva, res.email_usuario as email_reserva, res.id_usuario as id_usuario,
         us.nombre as nombre_usuario, us.dni as dni_usuario, us.email as email_usuario, us.apellido as apellido,
         m.nombre_menu as nombre_menu, m.entrante as entrante, m.plato_principal as plato_principal
         FROM reservas res 
         INNER JOIN usuarios us
         ON res.id_usuario = us.id
         INNER JOIN menu m 
         ON m.id = res.id_menu;";
 
         $resu=$this->db->query($consul);
         while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
             $this->datos[]=$filas;
         }
         return $this->datos;
     }

     public function mostrar_reservas_usuario($id){
        $consul = "SELECT m.nombre_menu as nombre_menu, m.entrante as entrante_menu, m.plato_principal as principal_menu, m.precio as precio_menu,
        res.id as id_reserva, res.nombre as nombre_reserva, res.fecha_reserva , res.email_usuario, res.id_usuario as id_usuario_res
        FROM menu m
        INNER JOIN reservas res
        ON m.id = res.id_menu
        INNER JOIN usuarios user
        ON res.id_usuario = ".$id;
       //echo $consul;
        $resu=$this->db->query($consul);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
            $this->datos[]=$filas;
        }
        return $this->datos;

     }
}

?>