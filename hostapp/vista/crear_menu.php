<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    //session_start(); // inicie la sesion

}
include("layouts/header.php");



if (!empty($usuario[0])) { 
    foreach ($usuario as $key => $value) :
        foreach ($value as $v) : 
            $id= $v['id'];
        endforeach;
    endforeach;
    } ?>


<header>
    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/LogoCXC.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" class="btn"
                href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=menu"
                class="btn">Inicio</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=menu&id_admin=<?php echo $id; ?>"
                class="btn">Ver Menu</a>
            <a id="submit_a"
                href="index.php?opcion=mostrar_listas&redireccion=reservas_admin&id_admin=<?php echo $id; ?>"
                class="btn">Ver Reservar</a>
            <a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a>
            <div>
                <?php echo $_SESSION['nombre'] . " ";
                echo $_SESSION['apellido'] . " ";
                echo $_SESSION['dni'];  ?>
            </div>

        </div>
    </nav>

</header>
<div class="wraper_reserva">
    <form class=" formLogin2" method="post">

        <h1 class="text_center">Crear menú</h1>
        <?php
        if (!empty($usuario[0])) { ?>
        <h2><?php
        foreach ($usuario as $key => $value) :
            foreach ($value as $v) : ?>
            <h2><?php echo $v['nombre']." ";
                    echo $v['apellido']; ?></h2>
            <br>
            <input class="" type="hidden" name="id_menu_usuario" value="<?php echo $v['id']; ?>" /><br>
            <input class="" type="hidden" name="dni_menu_usuario" value="<?php echo $v['dni']; ?>" /><br>
            <label class="fieldsForm" for="">Nombre Menú</label> <br>
            <input class="fieldsForm" type="text" name="nombre_menu" /><br>
            <label class="fieldsForm" for="">Entrante</label> <br>
            <input class="fieldsForm" type="text" name="entrante_menu" /><br>
            <label class="fieldsForm" for="">Principal</label> <br>
            <input class="fieldsForm" type="text" name="principal_menu" /><br>
            <label class="fieldsForm" for="">Precio €</label> <br>
            <input class="fieldsForm" type="decimal" name="precio_menu" /><br>
            <label class="fieldsForm" for="">Creado por</label> <br>
            <input class="fieldsForm" type="text" name="dni_res"
                value="Nombre <?php echo $v['nombre'];?>  <?php echo $v['apellido']; ?>  DNI: <?php echo $v['dni']; ?>"
                readonly /><br>
            <?php
            endforeach;
        endforeach;

        ?>
        </h2>
        <?php

        } ?>

        <input id="submit" type="submit" name="btn" value="Crear">
        <input id="submit" type="hidden" name="opcion" value="insertar_menu">
        <input id="submit" type="reset" name="btn" value="Borrar" />


    </form>

</div>




<?php
include("layouts/footer.php");
?>