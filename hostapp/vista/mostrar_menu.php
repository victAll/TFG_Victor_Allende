<?php

require_once("modelo/session.php");
include("layouts/header.php");
//require_once("controlador/utils.php");

?>

<?php
if (!empty($creador)) { ?>
<?php
    foreach ($creador as $key => $value) :
        foreach ($value as $v) :
            $id_menu = $v['id'];
        endforeach;
    endforeach;
    $nom = $_SESSION['nombre'];
    $ape = $_SESSION['apellido'];
    $dni = $_SESSION['dni'];
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
            <a id="submit_a" href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menu</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=reservas_admin&id_admin=<?php echo $id_menu; ?>" class="btn">Reservas</a>
            <ul id="submit_a" class="main-links btn">
                <li class="dropdown-li">
                    Opciones
                    <ul class="dropdown">
                        <li><br></li>
                        <li><?php echo $nom . " "; ?></li>
                        <li><br></li>
                        <li><?php echo $ape . " "; ?></li>
                        <li><br></li>
                        <!--<li><?php echo $dni . " "; ?></li>
                        <li><br></li>-->
                        <li><a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>

        </div>

    </nav>
    </nav>

</header>


<section class="seccion1" id="section1">
    <section class="wrap">
        <div class="contenedorReservas">
            <div class="muestraReservas">
                <?php

                if (!empty($_SESSION['dni'])) { ?>

                    <h2><?php echo @$_SESSION['nombre']; ?> <?php echo @$_SESSION['apellido']; ?></h2>
                    <br>
                    <!--<a  href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menú</a>-->
                    <!--<td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>&redireccion=menu" class="btn">Volver</a>
                    </td>-->
                    <br>
                <?php
                } ?>
                <table class="reservas">
                    <br>
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Entrante</td>
                            <td>Principal</td>
                            <td>Precio €</td>
                            <td>Creador</td>
                            <td colspan="3">Acciones</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($menus)) {
                            foreach ($menus as $key => $value) {
                                foreach ($value as $menu) : ?>
                                    <tr>
                                        <td><?php echo $menu['nombre_menu']; ?></td>
                                        <td><?php echo $menu['entrante']; ?></td>
                                        <td><?php echo $menu['plato_principal']; ?></td>
                                        <!--<td><?php /*echo format_decimal($menu['precio']);*/ ?></td>-->
                                        <td><?php echo $menu['precio']; ?></td>
                                        <?php foreach ($creador as $key => $value) {
                                            foreach ($value as $user) : ?>

                                                <?php if (isset($user['nombre'])) { ?>
                                                    <td><?php echo $user['nombre']; ?> </td>
                                        <?php }

                                            endforeach;
                                        } ?>
                                        <td><a class="btn" href="index.php/?opcion=editar_menu&id=<?php echo $menu['id']; ?>&id_admin=<?php echo $menu['id_admin']; ?>">Editar</a>
                                        </td>
                                        <td><a class="btn" href="index.php/?opcion=eliminar&id_eliminar=<?php echo $menu['id']; ?>&tabla=menu&redireccion=menu&id_admin=<?php echo $menu['id_admin']; ?>">Eliminar</a>
                                        </td>
                                        <!--<td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $menu['dni_usuario']; ?>" class="btn">Volver</a></td>-->

                                    </tr>

                            <?php endforeach;
                            }
                            $_SESSION['dni'] = $user['dni'];
                        } else { ?>
                            <tr>
                                <td colspan="5"> No hay Menú...</td>
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