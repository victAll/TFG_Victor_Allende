<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    // session_start(); // inicie la sesion

}
include("layouts/header.php");
//require_once("controlador/utils.php");

if (!empty($usuario)) { 
foreach ($usuario as $key => $value) :
        foreach ($value as $v) :
            $id = $v['id'];
            $nombre = $v['nombre'];
            $apellido = $v['apellido'];
            $dni = $v['dni'];
            $_SESSION['tipo_usuario'] = $v['tipo_usuario'];

        endforeach;
    endforeach;
}
?>

<?php
if (!empty($usuario)) { ?>
<header>

    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/HostApp.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" href="index.php?opcion=nueva_transaccion&redireccion=reserva" class="btn">Reservar</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=reserva&id=<?php echo $id ?>"
                class="btn">Mis Reservas</a>
            <ul id="submit_a" class="btn">
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
<h3>Bienvenido/a:</h3>
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
<section class="seccion1" id="section1">

    <section class="wrap">
        <?php
                foreach ($usuario as $key => $value) :
                    foreach ($value as $v) :
                        $_SESSION['dni'] = $v['dni'];
                        $_SESSION['nombre'] = $v['nombre'];
                        $_SESSION['apellido'] = $v['apellido']; ?>
        <br>
        <?php
                    endforeach;
                endforeach;

                ?>
        <div>
            <h2>Nuestra carta</h2>
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
                    <!--<p><?php /*echo format_decimal($menus['precio']);*/ ?> €</p>-->
                    <p><?php echo $menus['precio']; ?> €</p>
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

<a id="submit_a" href="index.php?opcion=index" class="btn">Registate y disfruta!!!</a>

<?php
} ?>

<?php
    include("layouts/footer.php");
    ?>