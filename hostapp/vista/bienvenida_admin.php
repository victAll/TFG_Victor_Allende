<?php
if (session_status() !== 0) { //si es 1 es que no hay session
    // session_start(); // inicie la sesion

}
include("layouts/header.php");
?>


<?php
if (!empty($usuario)) { ?>
<?php
    foreach ($usuario as $key => $value) :
        foreach ($value as $v) :
            $_SESSION['dni'] = $v['dni'];
            $_SESSION['nombre'] = $v['nombre'];
            $_SESSION['apellido'] = $v['apellido']; ?>
<br>
<header>

    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/LogoCXC.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menu</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=menu&id_admin=<?php echo $v['id']; ?>"
                class="btn">Ver Menu</a>
            <a id="submit_a"
                href="index.php?opcion=mostrar_listas&redireccion=reservas_admin&id_admin=<?php echo $v['id']; ?>"
                class="btn">Ver Reservar</a>
            <a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a>
            <div>
                <?php echo $v['nombre'] . " ";
                echo $v['apellido'] . " ";
                echo $_SESSION['dni'];  ?>
            </div>

        </div>
    </nav>

</header>




<?php
        endforeach;
    endforeach;

    ?>
<section class="parallax" id="section1">


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

        <?php
        foreach ($menu as $key => $value) :
            foreach ($value as $menus) : 
            
            if(isset($menus['entrante'])){
            ?>
            <div class="wrap column-2 carta">
                    <div class="plato-carta">
                        <div class="img-plato-carta">
                            <img src="<?php print HTTP; ?>vista/res/egg-fried.svg">
                        </div>
                        <div class="title-plato-carta">
                            <p><?php echo $menus['nombre_menu'];?></p>
                        </div>
                        <div class="title-plato-carta">
                            <h4>Entrante</h4>
                            <p><?php echo $menus['entrante'];?></p>
                        </div>
                        <div class="title-plato-carta">
                            <h4>Principal</h4>
                            <p><?php echo $menus['plato_principal'];?></p>
                        </div>
                        <div class="title-plato-carta">
                            <h4>Precio</h4>
                            <p><?php echo $menus['precio'];?></p>
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