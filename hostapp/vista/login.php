<?php

include("layouts/header.php");
?>

<?php if (!empty($resVacia)) { ?>
    <!--en caso de no encontrar usuario-->
    <h2 class="aviso"><?php echo $resVacia; ?> </h2>

<?php } ?>

<header>

<nav class="menuNav">
    <div class="icon">
        <a class="navbar-logo" href="#">
            <img src="<?php print HTTP; ?>vista/res/LogoCXC.png">
        </a>
    </div>
</nav>

</header>

<div class="wraper_form">
    <form class=" formLogin mb-3" action="" method="post">
        <h2>Inicia sesión:</h2>
        <label class="fieldsForm ">*Dni:</label>
        <input class="fieldsForm " type="text" name="dni" required />
        <label class="fieldsForm ">*Contraseña:</label>
        <input class="fieldsForm " type="password" name="password" required />
        <!--<div>
        <input class="fieldsForm " id="aceptar"type="checkbox" name="aceptarPoliticas" required />
        <label for="aceptar" class="fieldsForm "> Acepta nuestra politica de privacidad</label>
        </div>-->
        <input class="btn" type="submit" name="btn" value="Entrar">
        <input type="hidden" name="opcion" value="validar_login">
        <?php
        if (isset($_POST["login"])) {

            $_SESSION['dni'] = $_POST['dni'];
            $_SESSION['password'] = $_POST['password'];
            echo $_SESSION['dni'] ;
            echo $_SESSION['password'];
        }
        ?>

    </form>

    <form action="" class=" formLogin" method="get">
        
    <label class="fieldsForm ">Si no tienes cuenta registrate:</label>
        <input class="btn" type="submit" name="btn" value="Registrate">
        <input type="hidden" name="opcion" value="registro">
    </form>




</div>

<?php
include("layouts/footer.php");
?>