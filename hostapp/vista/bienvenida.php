<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    // session_start(); // inicie la sesion

}
include("layouts/header.php");
?>
<h1>Bienvenido/a:</h1>


<?php

if (!empty($usuarioAux)) { ?>
    <section>
        <?php
        foreach ($usuarioAux as $key => $value) :
            foreach ($value as $v) :
                $_SESSION['dni'] = $v['dni'];
                $_SESSION['nombre'] = $v['nombre'];
                $_SESSION['apellido'] = $v['apellido']; ?>
                <h2><?php echo $v['nombre'];
                    echo $v['apellido'];
                    echo $v['dni']; ?></h2>
                <br>
        <?php
            endforeach;
        endforeach;

        ?>
        <div class="section_controles">
            <a id="submit_a" href="index.php/?opcion=nueva_reserva" class="btn">Reservar</a>
            <a id="submit_a" href="index.php/?opcion=mostrar_reservas" class="btn">Mostrar Reservar</a>
            <a id="submit_a" href="index.php/?opcion=salir" class="btn">Cerrar sesión</a>
        </div>


    </section>
<?php
    echo "<br> SESION <br>";
    echo $_SESSION['dni'];
    echo $_SESSION['nombre'];
    echo $_SESSION['apellido'];
} else {
?>
    <h1>Hola, para reservar necesitas registrarte:</h1>
    <br>

    <a id="submit_a" href="index.php/?opcion=login" class="btn">Registate y disfruta!!!</a>

<?php
} ?>



<footer>
    <div class="wraper">
        <div class="avisos">
            <label>Productos:</label>
            <p>Todos los productos son elabrorados de forma tradicional y casera</p>
        </div>
        <div class="avisos">
            <label>Información nutricional:</label>
            <p>Puede consultar nuestra guía nutricional en www.comoxcasa.es</p>
        </div>
        <div class="avisos">
            <label>Ayuda:</label>
            <p>Para cualquier ayuda que necesite pongase en contacto con nosotros.</p>
        </div>
        <div class="avisos">
            <label>Aviso legal:</label>
            <p>Se prohibe la difusión de cualquier imagen o fotografía que se muestre en la web de ComoXCasa </p>
        </div>
    </div>
</footer>
<?php
include("layouts/footer.php");
?>