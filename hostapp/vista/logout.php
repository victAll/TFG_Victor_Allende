<?php
//include("session.php");
/*if(session_status() !== 0){ 
    session_start();//Se genera un id  de session != 0

}*/
require_once('modelo/session.php');




include("layouts/header.php");

?>
<h1>Adios:</h1>
<h2><?php echo @$_SESSION['nombre']; ?> <?php echo @$_SESSION['apellido']; ?></h2>
<br>
<div class="section_controles">
    <a id="submit_a" href="index.php?opcion=cerrar" class="btn">Salir</a>
</div>

<?php
include("layouts/footer.php");
?>