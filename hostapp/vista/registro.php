<?php

include("layouts/header.php");
?>


<h1>ALGO</h1>

<?php if (!empty($resVacia)) { ?>
    <!--en caso de no encontrar usuario-->
    <h2 class="aviso"><?php echo $resVacia; ?> </h2>

<?php } ?>



<div class="wraper_form">


<aside class="">
        <?php if (!empty($resExiste)) { ?>
            <!--en caso de no encontrar usuario-->
            <h3 class="aviso" ><?php echo $resExiste; ?></h3>
            <br><br>

        <?php } ?>
        <h2>Registrate:</h2><br>
        

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
            <form action="" class=" formRegistrate" method="get">
        
            <input id="submit" type="submit" name="btn" value="Volver">
            <input type="hidden" name="opcion" value="volverLogin">
        </form>
        

    </aside>
</div>







<?php
include("layouts/footer.php");
?>