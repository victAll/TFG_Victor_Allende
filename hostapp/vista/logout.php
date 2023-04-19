<?php
//include("session.php");
/*if(session_status() !== 0){ 
    session_start();//Se genera un id  de session != 0

}*/
require_once('modelo/session.php');




include("layouts/header.php");

?>
<header>
<nav class="menuNav">
    <div class="icon">
        <a class="navbar-logo" href="#">
            <img src="<?php print HTTP; ?>vista/res/HostApp.png">
        </a>
    </div>
    <div class="opcionMenuDiv">
    </div>
</nav>
</header>
<h1>Adios:</h1>
<h2><?php echo @$_SESSION['nombre']; ?> <?php echo @$_SESSION['apellido']; ?> </h2>
<br>
<div class="section_controles">
    <a id="submit_a" href="index.php?opcion=cerrar" class="btn">Salir</a>
    <?php if(@$_SESSION['tipo_usuario'] == 'n'){?>
        <a id="submit_a" class="btn" href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=reserva" class="btn">Inicio</a>

    <?php } else{ ?>
        <a id="submit_a" class="btn"
                href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=menu"
                class="btn">Inicio</a>

    <?php } ?>


</div>

<?php
include("layouts/footer.php");
?>