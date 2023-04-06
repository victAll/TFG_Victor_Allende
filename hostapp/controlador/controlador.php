<?php
require_once("modelo/modelo.php");

class ModeloController{
    private $model;

    function __construct()
    {
        $this->model = new Modelo(); // Modelo de la carpeta modelo o bbdd
    }

    // mostrar inicio
    static function index(){
        $modelo = new Modelo();
        $datos = $modelo->mostrar("usuarios", "1");
        require_once("vista/login.php");
    }

    /**
     *valida el login corercto del usuario
     *devuelve mensaje en caso de no encontrarse el ususario registrado 
     */
    static function validar_login()
    {
        $validar_modelo = new Modelo();
        //recuperamos las variables
        $dni = $_REQUEST['dni'];
        $password = $_REQUEST['password'];
        $data = "dni= '" . $dni . "' and password ='" . $password . "'";


        $usuario = $validar_modelo->mostrar("usuarios", $data);
        echo "aqui";
        if (empty($usuario)) {
            //devolvemos mensje a la vuista en caso de no estar el ususio que se intenta logear
            $resVacia = "El Dni o la contraseña no son correctos, registrese o intentelo nuevamente...";
            header("location:".urlsite);
        } else {
            echo  "algo";
            require_once("vista/bienvenida.php");
        }
    }
    /**
     * Registramos un nuevo cliente
     */
    function alta_cliente()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $correo = $_POST['email'];
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];
        $campos = " (nombre, apellido, dni, email, password, tipo_usuario) ";

        $data = "'" . $nombre . "' ,'" . $apellido . "','" . $dni . "','" . $correo . "','" . $password . "','" . $tipo . "'";
        echo "data" .$data ;
        $registrar = new Modelo();

        //validar si el usuario existe antes de registrar
        $usuario = $registrar->mostrar("usuarios","dni=".$dni);
        if ($usuario != null) {
            echo "usuario ".$usuario;
            $resExiste = "El usuario con dni: " . $dni . " ya está registrado, intentelo nuevamente...";
           // require_once("vista/login.php");
          header("location:".urlsite);
        } else {
            
            $registrar->insertar(" usuarios ",$campos, $data );
            $usuarioAux = $registrar->mostrar("usuarios","dni=".$dni);
            echo"sin usuario, se crea: ". print_r($usuarioAux)." <br>";
            require_once("vista/bienvenida.php");
            //header("location:".urlsite);
        }
    }



























    static function nuevo(){
        require_once("vista/nuevo.php");
    }

    /*static function guardar(){
        $modelo = new Modelo();
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $data = "'".$nombre."',".$precio;
        $datos = $modelo->insertar("usuarios",$data);
        header("location:".urlsite);
    }*/

    static function editar(){
        $modelo = new Modelo();
        $id = $_GET['id'];
        $datos = $modelo->mostrar("productos","id=".$id);
        require_once("vista/editar.php");
    }

    static function actualizar(){
        $modelo = new Modelo();
        $id = $_GET['id'];
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $data = "nombre='".$nombre."', precio=".$precio;
        $datos = $modelo->actualizar("productos",$data, "id=".$id);
        header("location:".urlsite);
    }
}


?>