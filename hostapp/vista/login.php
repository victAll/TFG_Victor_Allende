<?php

include("layouts/header.php");
?>


<header>

    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/HostApp.png">
            </a>
        </div>
    </nav>

</header>
<div class="wraper_form">
    <?php if (isset($resVacia)) { ?>
        <!--en caso de no encontrar usuario-->
        <h3 class="aviso"><?php echo $resVacia; ?></h3>
        <br><br>

    <?php } ?>
    <form class=" formLogin mb-3" action="" method="post">
        <h2>Inicia sesión:</h2>
        <label class="fieldsForm ">*Dni:</label>
        <input class="fieldsForm " type="text" name="dni" maxlength="10" required placeholder="53380908-R"/>
        <label class="fieldsForm ">*Contraseña:</label>
        <input class="fieldsForm " type="password" name="password" maxlength="30" required />
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
        }
        ?>
    </form>

    <form action="" class=" formLogin" method="get">

        <label class="fieldsForm ">O registrate:</label>
        <input class="btn" type="submit" name="btn" value="Registrate">
        <input type="hidden" name="opcion" value="registro">
    </form>




</div>

<?php
include("layouts/footer.php");
?>