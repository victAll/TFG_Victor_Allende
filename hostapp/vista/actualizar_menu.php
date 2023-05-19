<?php
   include("layouts/header.php");
   require_once("modelo/session.php");
   //require_once("controlador/utils.php");

   
?>
<?php
if (!empty($creador)) { ?>
<?php
    foreach ($creador as $key => $value) :
        foreach ($value as $v) : 
        $id_admin = $v['id'];
        endforeach;
    endforeach;
    $nom = $_SESSION['nombre'];
    $ape = $_SESSION['apellido']; 
    $dni = $_SESSION['dni'];
}?>
<header>
    <nav class="menuNav">
        <div class="icon">
            <a class="navbar-logo" href="#">
                <img src="<?php print HTTP; ?>vista/res/HostApp.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" class="btn"
                href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=menu"
                class="btn">Inicio</a>
            <a id="submit_a" href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menu</a>
            <a id="submit_a" href="index.php?opcion=mostrar_listas&redireccion=menu&id_admin=<?php echo $id_admin; ?>"
                class="btn">Ver Menu</a>
            <a id="submit_a"
                href="index.php?opcion=mostrar_listas&redireccion=reservas_admin&id_admin=<?php echo $id_admin; ?>"
                class="btn">Reservas</a>
            <ul id="submit_a" class="btn">
                <li class="dropdown-li">
                    Opciones
                    <ul class="dropdown">
                        <li><br></li>
                        <li><?php echo $nom . " ";?></li>
                        <li><br></li>
                        <li><?php echo $ape. " ";?></li>
                        <li><br></li>
                        <!--<li><?php echo $dni . " ";?></li>
                        <li><br></li>-->
                        <li><a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

</header>
<?php if (isset($resVacia)) { ?>
        <!--en caso de no encontrar usuario-->
        <h3 class="aviso"><?php echo $resVacia; ?></h3>
        <br><br>

    <?php } ?>
<h1>Modificar Menú</h1>

<div class="wraper_reserva">
    <form class="formLoginModificar" action="" method="get">
        <?php
        if (!empty($menuEditar)) {
            foreach ($menuEditar as $key => $value) {
                foreach ($value as $valor) : ?>
        <input type="hidden" value="<?php echo $valor['id']; ?>" name="id"></input>
        <input type="hidden" value="<?php echo $valor['id_admin']; ?>" name="id_admin"></input>
        <label class="fieldsForm ">Nombre menú:</label>
        <input class="fieldsForm" type="text" value="<?php echo $valor['nombre_menu']; ?>" name="nombre_menu" maxlength="50" required></input>
        <label class="fieldsForm ">Entrante:</label>
        <input class="fieldsForm" type="text" value="<?php echo $valor['entrante']; ?>" name="entrante" maxlength="50" required></input>
        <label class="fieldsForm ">Plato principal:</label>
        <input class="fieldsForm" type="text" value="<?php echo $valor['plato_principal']; ?>"
            name="plato_principal" maxlength="50" required></input>
        <label class="fieldsForm" for="">Precio €</label> <br>
        <!--<input class="fieldsForm" type="number" value="<?php //echo format_decimal($valor['precio']); ?>" name="precio_menu" 
        min="0.01" step="0.01" max="1000.00"required/><br>-->
        <input class="fieldsForm" type="number" value="<?php echo $valor['precio']; ?>" name="precio_menu" 
        min="0.01" step="0.01" max="1000.00" required/>

        <?php endforeach;
            }
        } ?>
        <input id="submit" class="btn" type="submit" name="btn" value="Modificar">
        <input id="submit" type="hidden" name="opcion" value="actualizar_menu">
    </form>
</div>
<?php
include("layouts/footer.php");
?>