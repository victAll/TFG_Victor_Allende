<?php 
if(session_status() !== 0){ //si es 1 es que no hay session
    session_start(); // inicie la sesion

}


$dni=@$_SESSION['dni'];
$password=@$_SESSION['password'];
$nombre=@$_SESSION['nombre'];
$apellido=@$_SESSION['apellido'];
$email=@$_SESSION['email'];

