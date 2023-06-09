<?php

require_once("modelo/session.php");
include("layouts/header.php");

require_once("controlador/utils.php");
?>

<?php
if (!empty($creador)) { ?>


<?php
    foreach ($creador as $key => $value) :
        foreach ($value as $v) :

            if (isset($v['id']) && isset($v['nombre']) && isset($v['apellido'])) {
                $id = $v['id'];
                $nombre = $v['nombre'];
                $apellido = $v['apellido'];
    ?>
<header>
    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/HostApp.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" class="btn"
                href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=menu"
                class="btn">Inicio</a>
            <a id="submit_a" href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menu</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=menu&id_admin=<?php echo $id; ?>"
                class="btn">Ver Menu</a>
            <ul id="submit_a" class="main-links btn">
                <li class="dropdown-li">
                    Opciones
                    <ul class="dropdown">
                        <li><br></li>
                        <li><?php echo $v['nombre'] . " ";?></li>
                        <li><br></li>
                        <li><?php echo $v['apellido'] . " ";?></li>
                        <li><br></li>
                        <!--<li><?php echo $v['dni'] . " ";?></li>
                        <li><br></li>-->
                        <li><a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>


</header>



<?php  }
        endforeach;
    endforeach;

    ?>
<?php
}
?>

<section class="seccion1" id="section1">
    <section class="wrap">
        <div class="contenedorReservas">
            <div class="muestraReservas">
                <?php

                if (!empty($_SESSION['dni'])) { ?>
                <br>
                <h2><?php echo @$_SESSION['nombre']; ?> <?php echo @$_SESSION['apellido']; ?></h2>
                <br>
                <h3>Todas las reservas</h3>
                <br>
                <?php
                } ?>
                <table class="reservas">
                    <br>
                    <thead>
                        <tr>
                            <td>Nombre reserva</td>
                            <td>Fecha reserva</td>
                            <td>Email reserva</td>
                            <td>Usuario titular</td>
                            <td>Dni titular</td>
                            <td>Email titular</td>
                            <td>Menú</td>
                            <td>Entrante</td>
                            <td>Principal</td>
                            <td colspan="3">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($menus)) {
                            foreach ($menus as $key => $value) {
                                foreach ($value as $valor) : ?>
                        <tr>
                            <td><?php echo $valor['nombre_reserva']; ?></td>
                            <td><?php echo $valor['fecha_reserva']; ?></td>
                            <td><?php echo $valor['email_reserva']; ?></td>
                            <td><?php echo $valor['nombre_usuario']; ?> <?php echo $valor['apellido']; ?></td>
                            <td><?php echo $valor['dni_usuario']; ?></td>
                            <td><?php echo $valor['email_usuario']; ?></td>
                            <td><?php echo $valor['nombre_menu']; ?></td>
                            <td><?php echo $valor['entrante']; ?></td>
                            <td><?php echo $valor['plato_principal']; ?></td>
                            <td><a class="btn"
                                    href="index.php/?opcion=eliminar&id_eliminar=<?php echo $valor['id']; ?>&tabla=reservas&redireccion=reserva_admin"
                                    class="btn">Cancelar reserva</a></td>
                            <!--<td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $valor['dni_usuario']; ?>" class="btn">Volver</a></td>-->

                        </tr>


                        <?php endforeach;
                            }
                        } else { ?>
                        <tr>
                            <td colspan="10"> No hay reservas...</td>
                        </tr>

                        <?php
                        } ?>


                    </tbody>
                </table>


            </div>

        </div>



    </section>
</section>

<?php
include("layouts/footer.php");
?>