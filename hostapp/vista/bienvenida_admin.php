<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    // session_start(); // inicie la sesion

}
include("layouts/header.php");
require_once("controlador/utils.php");

?>


<?php
if (!empty($usuario)) { ?>
    <?php
    foreach ($usuario as $key => $value) :
        foreach ($value as $v) :
            $_SESSION['dni'] = $v['dni'];
            $_SESSION['nombre'] = $v['nombre'];
            $_SESSION['apellido'] = $v['apellido'];
            $_SESSION['tipo_usuario'] = $v['tipo_usuario']; ?>

            <header>

                <nav class="menuNav">
                    <div class="icon">
                        <a class="navbar-logo" href="#">
                            <img src="<?php print HTTP; ?>vista/res/HostApp.png">
                        </a>
                    </div>
                    <div class="opcionMenuDiv">
                        <a id="submit_a" href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menu</a>
                        <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=menu&id_admin=<?php echo $v['id']; ?>" class="btn">Ver Menu</a>
                        <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=reservas_admin&id_admin=<?php echo $v['id']; ?>" class="btn">Ver Reservar</a>
                        <!--<a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a>-->
                        <!--<div>
                <?php /*echo $v['nombre'] . " ";
                echo $v['apellido'] . " ";
                echo $_SESSION['dni']; */ ?>
            </div>-->
                        <ul id="submit_a" class="main-links btn">
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

    <?php
        endforeach;
    endforeach;

    ?>
    <h1>Bienvenido/a:</h1>
    <?php
    foreach ($usuario as $key => $value) :
        foreach ($value as $v) :
            $_SESSION['dni'] = $v['dni'];
            $_SESSION['nombre'] = $v['nombre'];
            $_SESSION['apellido'] = $v['apellido']; ?>
            <h2><?php echo $v['nombre'] . " ";
                echo $v['apellido']; ?></h2>
            <br>
    <?php
        endforeach;
    endforeach;

    ?>
    <section class="parallax" id="section1">
        <section class="wrap">
            <div>
                <h2>Carta disponible</h2>
            </div>
        <br><br>
        <div class="wrap column-2 carta">
            <div class="plato-carta">
                <div class="img-plato-carta">
                </div>
                <div class="title-plato-carta">
                    <p class="titulo_menu">Menu</p>
                    <br>
                </div>
                <div class="title-plato-carta">
                    <p class="titulo_menu">Entrante</p>
                    <br>
                </div>
                <div class="title-plato-carta">
                    <p class="titulo_menu">Principal</p>
                    <br>
                </div>
                <div class="title-plato-carta">
                    <p class="titulo_menu">Precio</p>
                    <br>
                </div>
            </div>
        </div>

            <?php
            foreach ($menu as $key => $value) :
                foreach ($value as $menus) :

                    if (isset($menus['entrante'])) {
            ?>
                        <div class="wrap column-2 carta">
                            <div class="plato-carta">
                                <div class="img-plato-carta">
                                    <img src="<?php print HTTP; ?>vista/res/egg-fried.svg">
                                </div>
                                <div class="title-plato-carta">
                                    <p><?php echo $menus['nombre_menu']; ?></p>
                                </div>
                                <div class="title-plato-carta">
                                    <p><?php echo $menus['entrante']; ?></p>
                                </div>
                                <div class="title-plato-carta">
                                    <p><?php echo $menus['plato_principal']; ?></p>
                                </div>
                                <div class="title-plato-carta">
                                    <p><?php echo format_decimal($menus['precio']); ?> €</p>
                                </div>
                            </div>
                        </div>
                        <br>
            <?php
                    }
                endforeach;
            endforeach;

            ?>

        </section>

    </section>


<?php
} else {
?>
    <h1>Hola, para reservar necesitas registrarte:</h1>
    <br>

    <a id="submit_a" href="index.php?opcion=login" class="btn">Registate y disfruta!!!</a>

<?php
} ?>

<?php

include("layouts/footer.php");
?>