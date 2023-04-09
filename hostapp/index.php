<?php
require_once("config.php");
require_once("controlador/controlador.php");


if(isset($_POST['opcion'])):
    $metodo =   $_POST['opcion'];
    if(method_exists("modeloController",$metodo)):
        modeloController::{$metodo}();
    endif;
elseif(isset($_GET['opcion'])):
        $metodo =   $_GET['opcion'];
        if(method_exists("modeloController",$metodo)):
            modeloController::{$metodo}();
        endif;
else:
    modeloController::index();
endif;
?>

