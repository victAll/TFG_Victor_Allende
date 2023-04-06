<?php
require_once("config.php");
var_dump(urlsite);
//phpinfo();

require_once("controlador/controlador.php");


if(isset($_POST['opcion'])):
    echo("1");
    $metodo =   $_POST['opcion'];
    if(method_exists("modeloController",$metodo)):
        echo("2");
        modeloController::{$metodo}();
    endif;
elseif(isset($_GET['opcion'])):
        echo("2");
        $metodo =   $_GET['opcion'];
        if(method_exists("modeloController",$metodo)):
            echo("3");
            modeloController::{$metodo}();
        endif;
else:
    echo("4");
    modeloController::index();
endif;
?>

