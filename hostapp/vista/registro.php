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
                <img src="<?php print HTTP; ?>vista/res/HostApp.png">
            </a>
        </div>
    </nav>

</header>
<div class="divErrores">
            <?php if (!empty($resExiste)) { ?>
                <!--en caso de no encontrar usuario-->
                <h3 class="aviso"><?php echo $resExiste; ?></h3>
                <br><br>

            <?php } ?>
        </div>
<div class="wraper_form">
    <aside class="">


        <h2>Registrate:</h2><br>


        <form class="formRegistrate" action="" method="post">
            <label class="fieldsForm ">*Nombre:</label>
            <input class="fieldsForm " name="nombre" type="text " maxlength="50" required />
            <label class="fieldsForm ">*Apellido:</label>
            <input class="fieldsForm " name="apellido" type="text " maxlength="50" required />
            <label class="fieldsForm ">*Dni:</label>
            <input class="fieldsForm " name="dni" type="text " maxlength="10" required  placeholder="Ej: 53380908-R"/>
            <label class="fieldsForm ">*Correo electrónico:</label>
            <input class="fieldsForm " name="email" type="text" maxlength="30" required />
            <label class="fieldsForm ">*Contraseña:</label>
            <input class="fieldsForm " name="password" type="password" maxlength="30" required />
            <div>
                <input class="fieldsForm " id="aceptar" type="checkbox" name="aceptarPoliticas" required />
                <label for="aceptar" class="fieldsForm ">*Acepta nuestra politica de privacidad</label>
                <br>
            </div>
            <br>
            <input type="hidden" name="tipo" value="n">
            <input id="" class="btn" type="submit" name="btn" value="Registrar">
            <br>
            <input id="" type="hidden" name="opcion" value="alta_cliente">
            <br>
            <input id="" class="btn" type="reset" value="Borrar">

            <?php
            if (isset($_POST["alta_cliente"])) {

                $_SESSION['nombre'] = $_POST['nombre'];
                $_SESSION['apellido'] = $_POST['apellido'];
                $_SESSION['dni'] = $_POST['dni'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];
            }
            ?>

        </form>
        <form action="" class=" formRegistrate" method="get">
            <br>
            <input id="" class="btn" type="submit" name="btn" value="Volver">
            <input type="hidden" name="opcion" value="volverLogin">
        </form>


    </aside>
</div>







<?php
include("layouts/footer.php");
?>