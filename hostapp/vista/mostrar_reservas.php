<?php

require_once("modelo/session.php");
include("layouts/header.php");
require_once("controlador/utils.php");
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
                href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=reserva"
                class="btn">Inicio</a>
            <a id="submit_a" href="index.php/?opcion=nueva_transaccion&redireccion=reserva" class="btn">Reservar</a>
            
                <?php
                foreach ($usuario as $key => $value) :
                    foreach ($value as $v) : 
                        if(isset($v['dni'])){?>
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
                <?php } ?>

                <?php endforeach;
                endforeach;
                ?>
            

        </div>
    </nav>


</header>

<section class="parallax" id="section1">
    <section class="wrap">


        <div class="contenedorReservas">
            <div class="muestraReservas">
                <?php

                if (!empty($_SESSION['dni'])) {
                     ?>

                <h2><?php echo @$_SESSION['nombre']; ?> <?php echo @$_SESSION['apellido']; ?></h2>
                <br>
                <!--<a href="index.php/?opcion=nueva_transaccion&redireccion=reserva" class="btn">Reservar</a>
            <td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>&redireccion=reserva" class="btn">Volver</a></td>-->
                <br>
                <?php
                } ?>
                <table class="reservas">
                    <br>
                    <thead>
                        <tr>
                            <td>Dni</td>
                            <td>Nombre</td>
                            <td>Fecha</td>
                            <td>Email</td>
                            <td>Menú</td>
                            <td>Entrante</td>
                            <td>Principal</td>
                            <td>Precio</td>
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
                            <td><?php echo $valor['nombre_reserva']; ?></td>
                            <td><?php echo $valor['fecha_reserva']; ?></td>
                            <td><?php echo $valor['email_usuario']; ?></td>
                            <td><?php echo $valor['nombre_menu']; ?></td>
                            <td><?php echo $valor['entrante_menu']; ?></td>
                            <td><?php echo $valor['principal_menu']; ?></td>
                            <td><?php echo format_decimal($valor['precio_menu']); ?></td>
                            <td><a class="btn" href="index.php/?opcion=editar_reserva&id=<?php echo $valor['id']; ?>"
                                    class="btn btn-primary">Editar</a></td>
                            <td><a class="btn"
                                    href="index.php/?opcion=eliminar&id_eliminar=<?php echo $valor['id']; ?>&tabla=reservas&redireccion=reserva&id=<?php echo $valor['id_usuario_res']; ?>"
                                    class="btn btn btn-primary">Eliminar</a></td>
                                    
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

    </section>
</section>


<?php
include("layouts/footer.php");
?>