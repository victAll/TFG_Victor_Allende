<?php
   include("layouts/header.php");
   require_once("modelo/session.php");
   
   
?>


<h1>Modifica tu reserva</h1>

<div class="wraper_modificar">
    <form class="formLoginModificar" action="" method="get">
        <?php
        if (!empty($reservaEditar)) {
            foreach ($reservaEditar as $key => $value) {
                foreach ($value as $valor) : ?>
        <input type="hidden" value="<?php echo $valor['id']; ?>" name="id"></input>
        <input type="hidden" value="<?php echo $valor['dni_usuario']; ?>" name="dni_usuario"></input>
        <label class="fieldsForm ">Nombre:</label>
        <input class="fieldsForm" type="text" value="<?php echo $valor['nombre']; ?>" name="nombre"></input>
        <label class="fieldsForm ">Email:</label>
        <input class="fieldsForm" type="email" value="<?php echo $valor['email_usuario']; ?>" name="email_usuario"></input>
        <label class="fieldsForm ">Fecha:</label>
        <input class="fieldsForm" type="date" value="<?php echo $valor['fecha_reserva']; ?>"
            name="fecha_reserva"></input>

        <?php endforeach;
            }
        } ?>
        <input id="submit" type="submit" name="btn" value="Modificar">
        <input id="submit" type="hidden" name="opcion" value="actualizar_reserva">
    </form>
</div>
<div class="wraper_modificar">
    <td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>" class="btn">Volver</a></td>
</div>


<?php
include("layouts/footer.php");
?>