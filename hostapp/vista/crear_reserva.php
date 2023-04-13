<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    //session_start(); // inicie la sesion

}
include("layouts/header.php");
?>
<header>
    <?php foreach ($usuario as $key => $value) :
        foreach ($value as $v) :
            $id = $v['dni'];
            $nombre = $v['nombre'];
            $apellido = $v['apellido'];
        endforeach;
    endforeach;

    ?>
    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/LogoCXC.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" class="btn" href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=reserva" class="btn">Inicio</a> <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=reserva" class="btn">Mostrar Reservar</a>
            <a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a>
            <div>
                <?php echo $nombre . " ";
                echo $apellido . " ";
                echo $_SESSION['dni'];  ?>
            </div>

        </div>
    </nav>
</header>

<div class="wraper_reserva">
    <form class=" formLogin2" name="crear_reserva_form" method="post">

        <h1 class="text_center">Haz tu reserva</h1>
        <?php
        if (!empty($usuario[0])) { ?>
            <h2><?php
                foreach ($usuario as $key => $value) :
                    foreach ($value as $v) : ?>
                        <h2><?php echo $v['nombre'] . " ";
                            echo $v['apellido']; ?></h2>
                        <br>
                        <input class="" type="hidden" name="id_res" value="<?php echo $v['id']; ?>" /><br>
                        <input class="" type="hidden" name="dni" value="<?php echo $v['dni']; ?>" /><br>
                        <input class="" type="hidden" name="menu_email_usuario" value="<?php echo $v['email']; ?>" /><br>
                        <label class="fieldsForm" for="">Nombre</label> <br>
                        <input class="fieldsForm" type="text" name="nombre_res" value="<?php echo $v['nombre']; ?>" /><br>
                        <label class="fieldsForm" for="">Apellido</label> <br>
                        <input class="fieldsForm" type="text" name="apellido_res" value="<?php echo $v['apellido']; ?>" /><br>
                        <label class="fieldsForm" for="">Dni</label> <br>
                        <input class="fieldsForm" type="text" name="dni_res" value="<?php echo $v['dni']; ?>" readonly /><br>
                        <label class="fieldsForm" for="">Email</label><br>
                        <input class="fieldsForm" type="email" name="menu_email_res" value="<?php echo $v['email']; ?>" /><br>
                <?php
                    endforeach;
                endforeach;

                ?>
                <label class="fieldsForm" for="">Seleccione menú:</label> <br>
                <select id="sel_menu" name="sel_menu">
                    <!--<option  value="0"></option>-->
                    <?php
                    foreach ($menu as $key => $value) :
                        foreach ($value as $v) :
                            echo '<option value="' . $v['id'] . '">' . $v['entrante'] . $v['plato_principal'] . '</option>';
                    ?>
                    <?php
                        endforeach;
                    endforeach;

                    ?>
                </select>
                <!-- <input class="" type="hidden" name="id_menu" value="<?php //echo $v['id_menu']; 
                                                                            ?>" /><br>-->
            </h2>

        <?php

        } ?>
        <!-- Campos libres de edición sin información desde base de datos a introducir por el ususario que hce la reserva-->
        <label class="fieldsForm" for="">Fecha</label><br>
        <input class="fieldsForm" type="date" name="fecha_reserva_res" /><br>


        <input id="submit" type="submit" name="btn" value="Reservar">
        <input id="submit" type="hidden" name="opcion" value="insertar_reserva">
        <input id="submit" type="reset" name="btn" value="Borrar" />

    </form>

</div>
<!--<div class="wraper_reserva">
    <a class="btn" href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=reserva" class="btn">Volver</a>
</div>-->



<?php
include("layouts/footer.php");
?>