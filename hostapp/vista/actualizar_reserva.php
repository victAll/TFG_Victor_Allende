<?php
   include("layouts/header.php");
   require_once("modelo/session.php");
   
   
?>
<header>
    <?php foreach ($usuario as $key => $value) :
        foreach ($value as $v) :
            if(isset($v['id']) && isset($v['nombre'])&& isset($v['apellido'])){
                $id = $v['id'];
                $nombre = $v['nombre'];
                $apellido = $v['apellido'];
            }
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
            <a id="submit_a" class="btn" href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=reserva" class="btn">Inicio</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=reserva&id=<?php echo $id ?>" class="btn">Mostrar Reservar</a>
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

<h1>Modifica tu reserva</h1>

<div class="wraper_modificar">
    <form class="formLoginModificar" action="" method="get">
        <?php
        if (!empty($reservaEditar)) {
            foreach ($reservaEditar as $key => $value) {
                foreach ($value as $valor) : ?>
        <input type="hidden" value="<?php echo $valor['id']; ?>" name="id"></input>
        <input type="hidden" value="<?php echo $valor['dni_usuario']; ?>" name="dni_usuario"></input>
        <input type="hidden" value="<?php echo $id; ?>" name="id_usuario"></input>
        <label class="fieldsForm ">Nombre:</label>
        <input class="fieldsForm" type="text" value="<?php echo $valor['nombre']; ?>" name="nombre"></input>
        <label class="fieldsForm ">Email:</label>
        <input class="fieldsForm" type="email" value="<?php echo $valor['email_usuario']; ?>" name="email_usuario"></input>
        <label class="fieldsForm ">Fecha:</label>
        <input class="fieldsForm" type="date" value="<?php echo $valor['fecha_reserva']; ?>"
            name="fecha_reserva"></input>

        <?php endforeach;
            }
        } ?>


        <input id="submit" class="btn" type="submit" name="btn" value="Modificar">
        <input id="submit" type="hidden" name="opcion" value="actualizar_reserva">
    </form>
</div>
<!--<div class="wraper_modificar">
    <td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>" class="btn">Volver</a></td>
</div>-->


<?php
include("layouts/footer.php");
?>