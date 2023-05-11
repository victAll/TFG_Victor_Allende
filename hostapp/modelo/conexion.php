<?php 

/**
 * funcion que conecta a la bbdd, em este caso recibe una bbdd a conectarse
 * Conexion por PDO Orientado a objetos
 */
function conectar_param_pdo($database){
    $servername="localhost";
    $username="victorDB";
    $password="victorDB";
   try {//PDO va con try catch
       $conn = new PDO("mysql:host=$servername; dbname=$database", $username, $password);

       $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

   } catch (PDOException $err) {
      return "Error al conectar con base de datos: ".$err;
      echo $err;
   }
   return $conn;

}


?>