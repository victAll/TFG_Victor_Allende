<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    //session_start(); // inicie la sesion

}
include("layouts/header.php");
?>
<header>
    <?php foreach ($usuario as $key => $value) :
        foreach ($value as $v) :
            $id = $v['id'];
            $nombre = $v['nombre'];
            $apellido = $v['apellido'];
            $dni = $v['dni'];
        endforeach;
    endforeach;

    ?>
    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/HostApp.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" class="btn"
                href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=reserva">Inicio</a>
            <a id="submit_a" class="btn"
                href="index.php?opcion=mostrar_listas&redireccion=reserva&id=<?php echo  $id; ?>">Mostrar
                Reservar</a>
            <ul id="submit_a" class="main-links btn">
                <li class="dropdown-li">
                    Opciones
                    <ul class="dropdown">
                        <li><br></li>
                        <li><?php echo $nombre . " ";?></li>
                        <li><br></li>
                        <li><?php echo $apellido. " ";?></li>
                        <li><br></li>
                        <!--<li><?php echo $dni . " ";?></li>
                                    <li><br></li>-->
                        <li><a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
</header>

<div class="wraper_form">
    <h1 class="text_center">Haz tu reserva!</h1>
    <form class="formLogin mb-3" name="crear_reserva_form" method="post">
        <?php
        if (!empty($usuario[0])) { ?>
        <?php
                foreach ($usuario as $key => $value) :
                    foreach ($value as $v) : ?>
        <h2><?php echo $v['nombre'] . " "; echo $v['apellido']; ?></h2>
        
        <input class="" type="hidden" name="id_res" value="<?php echo $v['id']; ?>" /><br>
        <input class="" type="hidden" name="dni" value="<?php echo $v['dni']; ?>" /><br>
        <input class="" type="hidden" name="menu_email_usuario" value="<?php echo $v['email']; ?>" /><br>
        <label class="fieldsForm" for="">Nombre reserva:</label> <br>
        <input class="fieldsForm" type="text" name="nombre_res" value="<?php echo $v['nombre']; ?>" /><br>
        <label class="fieldsForm" for="">Apellido reserva:</label> <br>
        <input class="fieldsForm" type="text" name="apellido_res" value="<?php echo $v['apellido']; ?>" /><br>
        <label class="fieldsForm" for="">Dni titular:</label> <br>
        <input class="fieldsForm" type="text" name="dni_res" value="<?php echo $v['dni']; ?>" readonly /><br>
        <label class="fieldsForm" for="">Email reserva:</label><br>
        <input class="fieldsForm" type="email" name="menu_email_res" value="<?php echo $v['email']; ?>" /><br>
        <?php
                    endforeach;
                endforeach;

                ?>
        <label class="fieldsForm" for="">Seleccione menú:</label> <br>
        <select class="select" id="sel_menu" name="sel_menu" required>
            <?php   
                    foreach ($menu as $key => $value) :
                        foreach ($value as $v) :
                            if(isset($v['id'])){
                                echo '<option value="' . $v['id'] . '">' . $v['nombre_menu']."         ". $v['entrante'] ."         ". $v['plato_principal'] . '</option>';
                            }
                    ?>
            <?php
                        endforeach;
                    endforeach;

                    ?>
        </select>
        <!-- <input class="" type="hidden" name="id_menu" value="<?php //echo $v['id_menu']; 
                                                                            ?>" /><br>-->


        <?php

        } ?>
        <!-- Campos libres de edición sin información desde base de datos a introducir por el ususario que hce la reserva-->
        <label class="fieldsForm" for="">Fecha</label><br>
        <input class="select" type="date" name="fecha_reserva_res" required /><br>


        <input class="btn" type="submit" name="btn" value="Reservar">
        <input id="submit" type="hidden" name="opcion" value="insertar_reserva">
        <input class="btn" type="reset" name="btn" value="Borrar" />

    </form>

</div>
<!--<div class="wraper_reserva">
    <a class="btn" href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=reserva" class="btn">Volver</a>
</div>-->



<?php
include("layouts/footer.php");
?>