<?php
require_once("modelo/modelo.php");
require_once("modelo/session.php");
require_once("utils.php");

class ModeloController
{
    private $model;

    function __construct()
    {
        $this->model = new Modelo(); // Modelo de la carpeta modelo o bbdd
    }

    // mostrar inicio
    static function index()
    {
        try {
            $modelo = new Modelo();
            $datos = $modelo->mostrar("usuarios", "*", "1");
            require_once("vista/login.php");
        } catch (PDOException $err) {
            return "Error al conectar con base de datos: " . $err;
            echo $err;
        }
    }

    /**
     * Regresa a la vista de bienvenida
     */
    function volver()
    {
        $dni = $_SESSION['dni'];
        $redireccion = $_GET['redireccion'];
        $data = " dni= '" . $dni . "'";
        $volver = new Modelo();
        $usuario = $volver->mostrar('usuarios', "*", $data);
        $menu = $volver->mostrar(" menu ", " * ", 1);

        if ($redireccion == 'reserva') {
            require_once("vista/bienvenida.php");
        } else {
            require_once("vista/bienvenida_admin.php");
        }
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
        $password = md5($_REQUEST['password']);
        $data = "dni= '" . $dni . "' and password ='" . $password . "'";

        $usuario = $validar_modelo->mostrar("usuarios", "*", $data);
        $menu = $validar_modelo->mostrar("menu", "*", 1);

        if (empty($usuario)) {
            //devolvemos mensje a la vuista en caso de no estar el ususio que se intenta logear
            $resVacia = "El Dni o la contraseña no son correctos, registrese o intentelo nuevamente...";
            // header("location:" . urlsite);
            require_once("vista/login.php");
        } else {
            foreach ($usuario as $key => $value) :
                foreach ($value as $v) :
                    if ($v['tipo_usuario']  == 'n') {
                        require_once("vista/bienvenida.php");
                    } else {
                        require_once("vista/bienvenida_admin.php");
                    }
                endforeach;
            endforeach;
        }
    }

    function registro()
    {
        require_once("vista/registro.php");
    }

    function volverLogin()
    {
        require_once("vista/login.php");
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
        $password = md5($_POST['password']);

        $tipo = $_POST['tipo'];
        $campos = " (nombre, apellido, dni, email, password, tipo_usuario) ";

        $data = "'" . $nombre . "' ,'" . $apellido . "','" . $dni . "','" . $correo . "','" . $password . "','" . $tipo . "'";

        $registrar = new Modelo();

        $errores = validateRegistro($nombre,$apellido,$dni,$correo, $password);
        

        // Si han habido errores se muestran
        if (isset($errores)) {
            $resExiste = $errores; // pasamos los errores de falla de formulario a la vista
            require_once("vista/registro.php");
        } else {
            //validar si el usuario existe antes de registrar
            $usuario = $registrar->mostrar("usuarios", "*", " dni='" . $dni."'");
            if ($usuario != null) {
                $resExiste = "El usuario con dni: " . $dni . " ya está registrado, inténtalo nuevamente...";require_once("vista/registro.php");
            } else {

                $registrar->insertar(" usuarios ", $campos, $data);
                $usuario = $registrar->mostrar("usuarios", "*", "dni='" . $dni."'");
                $menu = $registrar->mostrar("menu", "*", 1);
                require_once("vista/bienvenida.php");
            }
        }
    }

    /**
     * Reservar muestra html de formulario para crear reservas o menu
     */
    function nueva_transaccion()
    {
        $redireccion = $_GET['redireccion'];
        $dni = $_SESSION['dni'];
        $data = " dni= '" . $dni . "'";

        $reservar = new Modelo();
        $usuario = $reservar->mostrar('usuarios', "*", $data);
        $menu = $reservar->mostrar('menu', "*", 1);
        if ($redireccion == 'reserva') {
            require_once("vista/crear_reserva.php");
        } else {
            require_once("vista/crear_menu.php");
        }
    }

    /**
     * Recupera el listado de reservas y las envia a la vista por usuario logeado
     */
    static function mostrar_listas()
    {

        $redireccion = $_GET['redireccion'];
        $listar = new Modelo();
        $campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, menu ";

        if ($redireccion == 'reserva') {
            $dni = $_SESSION['dni'];
            $id = $_GET['id'];
            $condicion_reserva = " dni_usuario= '" . $dni . "'";
            $condicion_usuario = " dni= '" . $dni . "'";
            //$dato = $listar->mostrar("reservas ", "*", $condicion_reserva);
            $dato = $listar->mostrar_reservas_usuario($id);
            $usuario = $listar->mostrar("usuarios ", "*", $condicion_usuario);
            require_once("vista/mostrar_reservas.php");
        } else if ($redireccion == 'menu') {
            $id_admin = $_GET['id_admin'];
            $condicion_menu = " id_admin= '" . $id_admin . "'";
            $menus = $listar->mostrar(" menu ", " * ", $condicion_menu);
            $creador = $listar->mostrar(" usuarios ", " * ", "id = '" . $id_admin . "'");
            require_once("vista/mostrar_menu.php");
        } else { {
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
    function insertar_reserva()
    {
        $id_usuario = $_POST['id_res'];
        $nombre = $_POST['nombre_res'] . " " . $_POST['apellido_res'];
        $dni_usuario = $_POST['dni_res'];
        $id_menu = $_POST['sel_menu'];
        //formateo fecha retorna un objeto Date
        $fecha = date_create($_POST['fecha_reserva_res']);
        //Damos el formato 
        $fecha_formateada = date_format($fecha, 'Y-m-d');
        //guardamos fehca formateada
        $fecha_reserva = $fecha_formateada;

        $menu_email_res = $_POST['menu_email_res'];
        $dni = $_SESSION['dni'];
        $campos = " (id_usuario ,dni_usuario, id_menu, nombre, fecha_reserva, email_usuario) ";

        $data = $id_usuario . ", '" . $dni_usuario . "' ,'" . $id_menu . "','" . $nombre . "', '" . $fecha_reserva . "', '" . $menu_email_res . "'";
        $reserva = new Modelo();

        $reserva->insertar(" reservas ", $campos, $data);

        //volvemos a mostrar reservas una vez hecha la reserva
        $campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, email_usuario ";
        $dato = $reserva->mostrar_reservas_usuario($id_usuario);

        $usuario = $reserva->mostrar("usuarios ", "*", " id = '" . $id_usuario . "'");
        require_once("vista/mostrar_reservas.php");
    }


    /**
     * Envia a la vista de actualizar o modificar reserva
     */
    function editar_reserva()
    {
        $id_reserva = $_GET['id'];
        $dni = $_SESSION['dni'];
        $reserva = new Modelo();
        $reservaEditar = $reserva->mostrar(" reservas ", "*", "id = " . $id_reserva);
        $usuario = $reserva->mostrar("usuarios ", "* ", " dni = '" . $dni . "'");
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
        $id_usuario = $_GET['id_usuario'];
        $data = " nombre , fecha_reserva , email_usuario values ('" . $nombre . "','" . $fecha . "','" . $email_usuario . "') ";
        $condicion = "id = " . $id;

        $update = new Modelo();

        $data = array("nombre" => $nombre, "fecha_reserva" => $fecha, "email_usuario" => $email_usuario);

        $update->actualizar(" reservas ", $data, $condicion);

        //volvemos a mostrar reservas una vez hecha la reserva
        $campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, email_usuario ";
        // $dato = $update->mostrar("reservas ", $campos, " dni_usuario = '" . $dni . "'");
        $dato = $update->mostrar_reservas_usuario($id_usuario);

        $usuario = $update->mostrar("usuarios ", "* ", " dni = '" . $dni . "'");
        require_once("vista/mostrar_reservas.php");
    }
    /**
     * Elimina un registro de una tabla dada
     */
    function eliminar()
    {

        $id_eliminar = $_GET['id_eliminar'];
        $tabla  = $_GET['tabla'];
        $redireccion = $_GET['redireccion'];
        $condicion = "id=" . $id_eliminar;
        $delete = new Modelo;
        $resultado =  $delete->eliminar($tabla, $condicion);

        //REDIRECCIONAR AL ELIMINAR
        if ($resultado == 1) { // 1 se elimina OK
            if ($redireccion == 'reserva') {
                $id_usuario = $_GET['id'];
                $dni = $_SESSION['dni'];
                $campos = " id,nombre, dni_usuario, DATE_FORMAT(fecha_reserva,'%d-%m-%Y') AS fecha_reserva, email_usuario ";
                //$dato = $delete->mostrar("reservas ", $campos, " dni_usuario = '" . $dni . "'");
                $dato = $delete->mostrar_reservas_usuario($id_usuario);
                $usuario = $delete->mostrar(" usuarios ", " * ", "dni = '" . $dni . "'");

                require_once("vista/mostrar_reservas.php");
            } else if ($redireccion == 'reserva_admin') {
                $dni = $_SESSION['dni'];
                $menus = $delete->mostrar_reservas_admin();
                $creador = $delete->mostrar(" usuarios ", " * ", "dni = '" . $dni . "'");
                require_once("vista/mostrar_reservas_admin.php");
            } else {
                $dni = $_SESSION['dni'];
                $id_admin = $_GET['id_admin'];

                $menus = $delete->mostrar(" menu ", " * ", " id_admin = '" . $id_admin . "'");
                $creador = $delete->mostrar(" usuarios ", " * ", "id = '" . $id_admin . "'");
                require_once("vista/mostrar_menu.php");
            }
        }
    }




    function insertar_menu()
    {
        $id_admin = $_POST['id_menu_usuario'];
        $dni_admin = $_POST['dni_menu_usuario'];
        $nombre_menu = $_POST['nombre_menu'];
        $entrante = $_POST['entrante_menu'];
        $principal = $_POST['principal_menu'];
        $precio = $_POST['precio_menu'];

        $camposMenu = " (id_admin ,nombre_menu, entrante, plato_principal, precio) ";
        $data = $id_admin . ", '" . $nombre_menu . "' ,'" . $entrante . "', '" . $principal . "', '" . $precio . "'";
        $menu = new Modelo();

        $menu->insertar(" menu ", $camposMenu, $data);

        //volvemos a mostrar reservas una vez hecha la reserva
        $menus = $menu->mostrar(" menu ", " * ", " id_admin = '" . $id_admin . "'");
        $creador = $menu->mostrar(" usuarios ", " * ", "dni = '" . $dni_admin . "'");

        require_once("vista/mostrar_menu.php");
    }

    function editar_menu()
    {
        $id_menu = $_GET['id'];
        $id_admin = $_GET['id_admin'];
        $menu = new Modelo();
        $menuEditar = $menu->mostrar(" menu ", "*", "id = " . $id_menu);
        $creador = $menu->mostrar(" usuarios ", " * ", "id = '" . $id_admin . "'");
        require_once("vista/actualizar_menu.php");
    }


    function actualizar_menu()
    {
        $id = $_GET['id'];
        $id_admin = $_GET['id_admin'];
        $nombre_menu = $_GET['nombre_menu'];
        $entrante = $_GET['entrante'];
        $plato_principal = $_GET['plato_principal'];
        $precio = $_GET['precio_menu'];
        $data = " nombre_menu , entrante , plato_principal, precio values ('" . $nombre_menu . "','" . $entrante . "','" . $plato_principal . "','" . $precio . "') ";
        $condicion = "id = " . $id;

        $update = new Modelo();

        $data = array("nombre_menu" => $nombre_menu, "entrante" => $entrante, "plato_principal" => $plato_principal, "precio" => $precio);

        $update->actualizar(" menu ", $data, $condicion);
        //volvemos a mostrar menu una vez hecha la reserva
        $menus = $update->mostrar(" menu ", " * ", " id_admin = '" . $id_admin . "'");
        $creador = $update->mostrar(" usuarios ", " * ", "id = '" . $id_admin . "'");
        require_once("vista/mostrar_menu.php");
    }

    /**
     * envia a la pagina de logout con el ususario que quiere cerrar sesión
     */
    static function salir()
    {
        $dni = $_SESSION['dni'];
        $volver = new Modelo();
        $usuario = $volver->mostrar("usuarios", "*", "dni=" . $dni);

        require_once("vista/logout.php");
    }

    /**
     * Envia a vsta de despedida 
     */
    static function cerrar()
    {

        require_once("vista/despedida.php");
    }
}
