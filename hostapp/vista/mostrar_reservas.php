<?php

require_once("modelo/session.php");
include("layouts/header.php");

?>


<header>
    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/LogoCXC.png">
            </a>
        </div>
        <div class="opcionMenuDiv">

            <a id="submit_a" class="btn" href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=reserva" class="btn">Inicio</a>
            <a id="submit_a" href="index.php/?opcion=nueva_transaccion&redireccion=reserva" class="btn">Reservar</a>
            <a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a>
            <div>
                <?php
                foreach ($usuario as $key => $value) :
                    foreach ($value as $v) :

                        if (isset($v['id']) && isset($v['nombre']) && isset($v['apellido'])) {
                            $id = $v['id'];
                            echo $nombre = $v['nombre'];
                            echo $apellido = $v['apellido'];
                            echo $_SESSION['dni'];
                        }
                    endforeach;
                endforeach;
                ?>
            </div>

        </div>
    </nav>


</header>

<div class="contenedorReservas">
    <div class="muestraReservas">
        <?php

        if (!empty($_SESSION['dni'])) { ?>

            <h2><?php echo @$_SESSION['nombre']; ?> <?php echo @$_SESSION['apellido']; ?></h2>
            <br>
            <a href="index.php/?opcion=nueva_transaccion&redireccion=reserva" class="btn">Reservar</a>
            <td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>&redireccion=reserva" class="btn">Volver</a></td>
            <br>
        <?php
        } ?>
        <table>
            <br>
            <thead>
                <tr>
                    <td>Dni</td>
                    <td>Nombre</td>
                    <td>Fecha</td>
                    <td>Email</td>
                    <td>Nombre menú</td>
                    <td colspan="3">Acciones</td>

                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($dato)) {
                    foreach ($dato as $key => $value) {
                        foreach ($value as $valor) : ?>
                            <tr>
                                <td><?php echo $valor['dni_usuario']; ?></td>
                                <td><?php echo $valor['nombre']; ?></td>
                                <td><?php echo $valor['fecha_reserva']; ?></td>
                                <td><?php echo $valor['email_usuario']; ?></td>
                                <td><a class="btn" href="index.php/?opcion=editar_reserva&id=<?php echo $valor['id']; ?>" class="btn">Editar</a></td>
                                <td><a class="btn" href="index.php/?opcion=eliminar&id=<?php echo $valor['id']; ?>&tabla=reservas&redireccion=reserva" class="btn">Eliminar</a></td>






                        <?php endforeach;
                    } ?>


                            </tr>
                        <?php } else { ?>

                            <tr>
                                <td colspan="6"> No hay reservas...</td>
                            </tr>

                        <?php
                    } ?>


            </tbody>
        </table>
    </div>

</div>




<?php
include("layouts/footer.php");
?>