<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    // session_start(); // inicie la sesion
    
}
include("layouts/header.php");
?>


<?php
if (!empty($usuario)) { ?>
<section>
    <h1>Bienvenido/a Administrador:</h1>
    <?php
        foreach ($usuario as $key => $value) :
            foreach ($value as $v) :
                $_SESSION['dni'] = $v['dni'];
                $_SESSION['nombre'] = $v['nombre'];
                $_SESSION['apellido'] = $v['apellido']; ?>
    <h2><?php echo $v['nombre']." ";  echo $v['apellido']." "; echo $_SESSION['dni'];  ?></h2>
    <br>
    <?php
            endforeach;
        endforeach;

        ?>
    <div class="section_controles">
        <a id="submit_a" href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menu</a>
        <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=menu&id_admin=<?php echo $v['id']; ?>" class="btn">Ver Menu</a>
        <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=reservas_admin&id_admin=<?php echo $v['id']; ?>" class="btn">Mostrar Reservar</a>
        <a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a>
    </div>
    <!--<form action="" method="get">
            <a id="submit_a" href="index.php?opcion=nueva_reserva" class="btn">Reservar</a>
            <input id="submit" type="hidden" name="opcion" value="alta_cliente">

            <input type="submit" value="enviar">
        </form>-->


</section>
<?php
} 
else {
?>
<h1>Hola, para reservar necesitas registrarte:</h1>
<br>

<a id="submit_a" href="index.php?opcion=login" class="btn">Registate y disfruta!!!</a>

<?php
} ?>

<?php
include("layouts/footer.php");
?>