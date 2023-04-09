<?php

include("layouts/header.php");
?>


<h1>ALGO</h1>

<?php if (!empty($resVacia)) { ?>
    <!--en caso de no encontrar usuario-->
    <h2 class="aviso"><?php echo $resVacia; ?> </h2>

<?php } ?>

<div class="wraper_form">
    <form class=" formLogin" action="" method="post">
        <h2>Inicia sesión:</h2>
        <label class="fieldsForm ">*Dni:</label>
        <input class="fieldsForm " type="text" name="dni" required />
        <label class="fieldsForm ">*Contraseña:</label>
        <input class="fieldsForm " type="password" name="password" required />
        <input id="submit" type="submit" name="btn" value="Entrar">
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


    <aside class="control_central">
        <?php if (!empty($resExiste)) { ?>
            <!--en caso de no encontrar usuario-->
            <h2 class="aviso" ><?php echo $resExiste; ?> </h2>
            <br><br>

        <?php } ?>
        <h2>Registrate:</h2><br>
        <div>

            <form class="formRegistrate" action="" method="post">
                <label class="fieldsForm ">*Nombre:</label>
                <input class="fieldsForm " name="nombre" type="text " required />
                <label class="fieldsForm ">*Apellido:</label>
                <input class="fieldsForm " name="apellido" type="text " required />
                <label class="fieldsForm ">*Dni:</label>
                <input class="fieldsForm " name="dni" type="text " required />
                <label class="fieldsForm ">*Correo electrónico:</label>
                <input class="fieldsForm " name="email" type="email" required />
                <label class="fieldsForm ">*Contraseña:</label>
                <input class="fieldsForm " name="password" type="password" required />
                <input type="hidden" name="tipo" value="n">
                <input id="submit" type="submit" name="btn" value="Registrar">
                <input id="submit" type="hidden" name="opcion" value="alta_cliente">
                <br>
                <button id="submit" type="reset" value="Borrar">Borrar</button>

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
        </div>

    </aside>

</div>

<?php
include("layouts/footer.php");
?>