<?php
   include("layouts/header.php");
   require_once("modelo/session.php");
   
   
?>


<h1>Modificar Menú</h1>

<div class="wraper_modificar">
    <form class="formLoginModificar" action="" method="get">
        <?php
        if (!empty($menuEditar)) {
            foreach ($menuEditar as $key => $value) {
                foreach ($value as $valor) : ?>
        <input type="hidden" value="<?php echo $valor['id']; ?>" name="id"></input>
        <input type="hidden" value="<?php echo $valor['id_admin']; ?>" name="id_admin"></input>
        <label class="fieldsForm ">Nombre menú:</label>
        <input class="fieldsForm" type="text" value="<?php echo $valor['nombre_menu']; ?>" name="nombre_menu"></input>
        <label class="fieldsForm ">Entrante:</label>
        <input class="fieldsForm" type="text" value="<?php echo $valor['entrante']; ?>" name="entrante"></input>
        <label class="fieldsForm ">Plato principal:</label>
        <input class="fieldsForm" type="text" value="<?php echo $valor['plato_principal']; ?>"
            name="plato_principal"></input>

        <?php endforeach;
            }
        } ?>
        <input id="submit" type="submit" name="btn" value="Modificar">
        <input id="submit" type="hidden" name="opcion" value="actualizar_menu">
    </form>
</div>
<div class="wraper_modificar">
    <td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>" class="btn">Volver</a></td>
</div>


<?php
include("layouts/footer.php");
?>