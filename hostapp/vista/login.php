<?php

include("layouts/header.php");
?>

<?php if (!empty($resVacia)) { ?>
    <!--en caso de no encontrar usuario-->
    <h2 class="aviso"><?php echo $resVacia; ?> </h2>

<?php } ?>

<div class="wraper_form">
    <form class=" formLogin mb-3" action="" method="post">
        <h2>Inicia sesión:</h2>
        <label class="fieldsForm ">*Dni:</label>
        <input class="fieldsForm " type="text" name="dni" required />
        <label class="fieldsForm ">*Contraseña:</label>
        <input class="fieldsForm " type="password" name="password" required />
        <input class="btn btn-primary" type="submit" name="btn" value="Entrar">
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
        <input class="btn btn-primary" type="submit" name="btn" value="Registrate">
        <input type="hidden" name="opcion" value="registro">
    </form>




</div>

<?php
include("layouts/footer.php");
?>