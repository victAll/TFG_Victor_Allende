<?php
require_once("modelo/modelo.php");
require_once("modelo/session.php");

class ModeloController{
    private $model;

    function __construct()
    {
        $this->model = new Modelo(); // Modelo de la carpeta modelo o bbdd
    }

    // mostrar inicio
    static function index(){
        $modelo = new Modelo();
        $datos = $modelo->mostrar("usuarios","*", "1");
        require_once("vista/login.php");
    }

    /**
     * Regresa a la vista de bienvenida
     */
    function volver()
    {
        $dni = $_SESSION['dni'];
        $redireccion = $_GET['redireccion'];
        $data = " dni= '" . $dni. "'";
        $volver = new Modelo();
        $usuario = $volver->mostrar('usuarios',"*", $data);
        echo " DATA: ".$data;
        
        echo " DATA SESSION: ".$_SESSION['dni'];
        if($redireccion == 'reserva'){
            require_once("vista/bienvenida.php");
        }else{
            require_once("vista/bienvenida_admin.php");
        }
        
    }

    /**
     *valida el login corercto del usuario
     *devuelve mensaje en caso de no encontrarse el ususario registrado 
     */
    static function validar_login(){
        $validar_modelo = new Modelo();
        //recuperamos las variables
        $dni = $_REQUEST['dni'];
        $password = $_REQUEST['password'];
        $data = "dni= '" . $dni . "' and password ='" . $password . "'";


        $usuario = $validar_modelo->mostrar("usuarios","*", $data);
        $menu = $validar_modelo->mostrar("menu","*", 1);

        if (empty($usuario)) {
            //devolvemos mensje a la vuista en caso de no estar el ususio que se intenta logear
            $resVacia = "El Dni o la contraseña no son correctos, registrese o intentelo nuevamente...";
            header("location:".urlsite);
        } else {
            foreach ($usuario as $key => $value) :
                foreach ($value as $v) :
                    if($v['tipo_usuario']  == 'n'){
                        echo " normal: ".$v['tipo_usuario'] ;
                        require_once("vista/bienvenida.php");
                    } else {
                        echo " admin: ".$v['tipo_usuario'] ;
                        require_once("vista/bienvenida_admin.php");
                    }
                endforeach;
            endforeach;
        }
    }
    /**
     * Registramos un nuevo cliente
     */
    function alta_cliente(){
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
        $usuario = $registrar->mostrar("usuarios","*","dni=".$dni);
        if ($usuario != null) {
            echo "usuario ".$usuario;
            $resExiste = "El usuario con dni: " . $dni . " ya está registrado, intentelo nuevamente...";
            header("location:".urlsite);
        } else {
            
            $registrar->insertar(" usuarios ",$campos, $data );
            $usuario = $registrar->mostrar("usuarios","*","dni=".$dni);
            echo"sin usuario, se crea: ". print_r($usuario)." <br>";
            require_once("vista/bienvenida.php");
        }

    }

    /**
     * Reservar muestra html de formulario para crear reservas o menu
     */
    function nueva_transaccion(){
        $redireccion = $_GET['redireccion'];
        $dni = $_SESSION['dni'];
        $data = " dni= '" . $dni. "'";
        echo "DNI: ".$dni;
        $reservar = new Modelo();
        $usuario = $reservar->mostrar('usuarios', "*", $data);
        $menu = $reservar->mostrar('menu', "*", 1);
        if($redireccion == 'reserva'){
            require_once("vista/crear_reserva.php");
        }else{
            require_once("vista/crear_menu.php");
        }
    }

        /**
     * Recupera el listado de reservas y las envia a la vista por usuario logeado
     */
    static function mostrar_listas(){
        
        $redireccion = $_GET['redireccion'];
        $listar = new Modelo();
        $campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, menu ";

        if($redireccion == 'reserva'){
            //$campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, menu ";
            $dni = $_SESSION['dni'];
            $condicion_reserva = " dni_usuario= '" . $dni. "'";
            $dato = $listar->mostrar("reservas ","*", $condicion_reserva );
            require_once("vista/mostrar_reservas.php");
        }else if($redireccion == 'menu'){
            $id_admin = $_GET['id_admin'];
            $condicion_menu = " id_admin= '" . $id_admin. "'";
            $menus = $listar->mostrar(" menu ", " * ", $condicion_menu);
            $creador = $listar->mostrar(" usuarios ", " * ", "id = '" . $id_admin . "'");
            require_once("vista/mostrar_menu.php");
        }else{{
                $id_admin = $_GET['id_admin'];
                //$menus = $listar->mostrar(" menu ", " * ", $condicion_menu);
                $menus = $listar->mostrar_reservas_admin();
                $creador = $listar->mostrar(" usuarios ", " * ", "id = '" . $id_admin . "'");
                require_once("vista/mostrar_reservas_admin.php");
            }
        }

    }


        /**
     * Formulario de registro de una nueva reserva
     */
    function insertar_reserva(){
        $id_usuario = $_POST['id_res'];
        $nombre = $_POST['nombre_res'] . " " . $_POST['apellido_res'];
        $dni_usuario = $_POST['dni_res'];
        $id_menu = $_POST['sel_menu'];
        //formateo fecha
        $fecha = date_create($_POST['fecha_reserva_res']);
        $fecha_formateada = date_format($fecha, 'Y-m-d');
        $fecha_reserva = $fecha_formateada;

        $menu_email_res = $_POST['menu_email_res'];
        $dni = $_SESSION['dni'];
        $campos = " (id_usuario ,dni_usuario, id_menu, nombre, fecha_reserva, email_usuario) ";

        $data = $id_usuario . ", '" . $dni_usuario . "' ,'" . $id_menu . "','" . $nombre . "', '" . $fecha_reserva . "', '" . $menu_email_res . "'";
        //$data2 = " dni= '" . $dni. "'";
        $reserva = new Modelo();

        $reserva->insertar(" reservas ", $campos, $data);

        //volvemos a mostrar reservas una vez hecha la reserva
        $campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, email_usuario ";
        $dato = $reserva->mostrar("reservas ", $campos, " dni_usuario = '" . $dni . "'");
        //$menu = $reserva->mostrar("menu ", "*", " id_usuario = '" . $id_usuario . "'");
        require_once("vista/mostrar_reservas.php");
    }


    /**
     * Envia a la vista de actualizar o modificar reserva
     */
    function editar_reserva()
    {
        $id_reserva = $_GET['id'];
        $reserva = new Modelo();
        $reservaEditar = $reserva->mostrar(" reservas ","*", "id = " . $id_reserva);
        require_once("vista/actualizar_reserva.php");
    }

    /**
     * Formulario para actualizar la reserva
     */
    function actualizar_reserva()
    {
        $nombre = $_GET['nombre'];
        $fecha = $_GET['fecha_reserva'];
        $email_usuario = $_GET['email_usuario'];
        $dni = $_GET['dni_usuario'];
        $id = $_GET['id'];
        $data = " nombre , fecha_reserva , email_usuario values ('" . $nombre . "','" . $fecha . "','" . $email_usuario . "') ";
        $condicion = "id = " . $id;

        $update = new Modelo();

        $data = array("nombre" => $nombre, "fecha_reserva" => $fecha, "email_usuario" => $email_usuario);

        $update->actualizar(" reservas ", $data, $condicion);

        //volvemos a mostrar reservas una vez hecha la reserva
        $campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, email_usuario ";
        $dato = $update->mostrar("reservas ", $campos, " dni_usuario = '" . $dni . "'");
        require_once("vista/mostrar_reservas.php");
    }
    /**
     * Elimina un registro de una tabla dada
     */
    function eliminar(){   

        $id = $_GET['id'];
        $tabla  = $_GET['tabla'];
        $redireccion = $_GET['redireccion'];
        $condicion = "id=".$id;
        $delete = new Modelo;
        $resultado =  $delete->eliminar($tabla, $condicion);

        //REDIRECCIONAR AL ELIMINAR
        if ($resultado == 1) { // 1 se elimina OK
            if($redireccion == 'reserva'){
                $dni = $_SESSION['dni'];
                $campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, email_usuario ";
                $dato = $delete->mostrar("reservas ", $campos, " dni_usuario = '" . $dni . "'");
                require_once("vista/mostrar_reservas.php");
            }else if ($redireccion == 'reserva_admin'){
                $dni = $_SESSION['dni'];
                $menus = $delete->mostrar_reservas_admin();
                $creador = $delete->mostrar(" usuarios ", " * ", "dni = '" . $dni . "'");
                require_once("vista/mostrar_reservas_admin.php");
            }    
            else{
                $dni = $_SESSION['dni'];
                $id_admin = $_GET['id_admin'];
                echo " aqui ";
                $menus = $delete->mostrar(" menu ", " * ", " id_admin = '" . $id_admin . "'");
                $creador = $delete->mostrar(" usuarios ", " * ", "id = '" . $id_admin . "'");
                require_once("vista/mostrar_menu.php");
            }

        }
    }




    function insertar_menu(){
        $id_admin = $_POST['id_menu_usuario'];
        $dni_admin = $_POST['dni_menu_usuario'];
        $nombre_menu = $_POST['nombre_menu'];
        $entrante = $_POST['entrante_menu'];
        $principal = $_POST['principal_menu'];

        $camposMenu = " (id_admin ,nombre_menu, entrante, plato_principal) ";
        $data = $id_admin . ", '" . $nombre_menu . "' ,'" . $entrante . "', '" . $principal . "'";
        $menu = new Modelo();
        echo " LLAMADA A INSERTAR ";
        $menu->insertar(" menu ", $camposMenu, $data);

        //volvemos a mostrar reservas una vez hecha la reserva
        $menus = $menu->mostrar(" menu ", " * ", " id_admin = '" . $id_admin . "'");
        $creador = $menu->mostrar(" usuarios ", " * ", "dni = '" . $dni_admin . "'");

        require_once("vista/mostrar_menu.php");
    }

    function editar_menu(){
        $id_menu = $_GET['id'];
        $menu = new Modelo();
        $menuEditar = $menu->mostrar(" menu ","*", "id = " . $id_menu);
        require_once("vista/actualizar_menu.php");
    }


    function actualizar_menu(){
        $id = $_GET['id'];
        $id_admin = $_GET['id_admin'];
        $nombre_menu = $_GET['nombre_menu'];
        $entrante = $_GET['entrante'];
        $plato_principal = $_GET['plato_principal'];
        $data = " nombre_menu , entrante , plato_principal values ('" . $nombre_menu . "','" . $entrante . "','" . $plato_principal . "') ";
        $condicion = "id = " . $id;

        $update = new Modelo();

        $data = array("nombre_menu" => $nombre_menu, "entrante" => $entrante, "plato_principal" => $plato_principal);

        $update->actualizar(" menu ", $data, $condicion);
        //volvemos a mostrar menu una vez hecha la reserva
        $menus = $update->mostrar(" menu ", " * ", " id_admin = '" . $id_admin . "'");
        $creador = $update->mostrar(" usuarios ", " * ", "id = '" . $id_admin . "'");
        require_once("vista/mostrar_menu.php");
    }

  










}


?>