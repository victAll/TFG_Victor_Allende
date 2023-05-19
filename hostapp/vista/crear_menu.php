<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    //session_start(); // inicie la sesion

}
include("layouts/header.php");



if (!empty($usuario[0])) {
    foreach ($usuario as $key => $value) :
        foreach ($value as $v) :
            $id = $v['id'];
        endforeach;
    endforeach;
} ?>


<header>
    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/HostApp.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" class="btn" href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=menu" class="btn">Inicio</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=menu&id_admin=<?php echo $id; ?>" class="btn">Ver Menu</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=reservas_admin&id_admin=<?php echo $id; ?>" class="btn">Reservas</a>
            <ul id="submit_a" class="btn">
                <li class="dropdown-li">
                    Opciones
                    <ul class="dropdown">
                        <li><br></li>
                        <li><?php echo $v['nombre'] . " "; ?></li>
                        <li><br></li>
                        <li><?php echo $v['apellido'] . " "; ?></li>
                        <li><br></li>
                        <!--<li><?php echo $v['dni'] . " "; ?></li>
                        <li><br></li>-->
                        <li><a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

</header>

<?php if (isset($resVacia)) { ?>
        <!--en caso de no encontrar usuario-->
        <h3 class="aviso"><?php echo $resVacia; ?></h3>
        <br><br>

    <?php } ?>
<div class="wraper_reserva">

    <form class=" formLogin2" method="post">

        <h1 class="text_center">Crear menú</h1>
        <?php
        if (!empty($usuario[0])) { ?>
            <h2><?php
                foreach ($usuario as $key => $value) :
                    foreach ($value as $v) : ?>
                        <h2><?php echo $v['nombre'] . " ";
                            echo $v['apellido']; ?></h2>
                        <br>
                        <input class="" type="hidden" name="id_menu_usuario" value="<?php echo $v['id']; ?>" /><br>
                        <input class="" type="hidden" name="dni_menu_usuario" value="<?php echo $v['dni']; ?>" /><br>
                        <label class="fieldsForm" for="">Nombre Menú</label> <br>
                        <input class="fieldsForm" type="text" name="nombre_menu" maxlength="50" required /><br>
                        <label class="fieldsForm" for="">Entrante</label> <br>
                        <input class="fieldsForm" type="text" name="entrante_menu" maxlength="50" required /><br>
                        <label class="fieldsForm" for="">Principal</label> <br>
                        <input class="fieldsForm" type="text" name="principal_menu" maxlength="50" required /><br>
                        <label class="fieldsForm" for="">Precio €</label> <br>
                        <input class="fieldsForm" type="number" name="precio_menu" min="0.01" 
                        step="0.01" max="1000.00" required /><br>
                        <label class="fieldsForm" for="">Creado por</label> <br>
                        <input class="fieldsForm" type="text" name="dni_res" value="Nombre <?php echo $v['nombre']; ?>  <?php echo $v['apellido']; ?>  DNI: <?php echo $v['dni']; ?>" readonly /><br>
                <?php
                    endforeach;
                endforeach;

                ?>
            </h2>
        <?php

        } ?>

        <input id="submit" class="btn" type="submit" name="btn" value="Crear">
        <input id="submit" type="hidden" name="opcion" value="insertar_menu">
        <input id="submit" class="btn" type="reset" name="btn" value="Borrar" />


    </form>

</div>




<?php
include("layouts/footer.php");
?>