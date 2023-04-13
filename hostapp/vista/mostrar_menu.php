<?php
   
   require_once("modelo/session.php");
   include("layouts/header.php");
   require_once("controlador/utils.php");

    ?>

<?php
if (!empty($creador)) { ?>
<?php
    foreach ($creador as $key => $value) :
        foreach ($value as $v) : 
        $id_menu = $v['id'];
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
                <img src="<?php print HTTP; ?>vista/res/LogoCXC.png">
            </a>
        </div>
        <div class="opcionMenuDiv">
            <a id="submit_a" class="btn"
                href="index.php/?opcion=volver&id=<?php echo  @$_SESSION['dni']; ?>&redireccion=menu"
                class="btn">Inicio</a>
            <a id="submit_a" href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menu</a>
            <a id="submit_a"
                href="index.php?opcion=mostrar_listas&redireccion=reservas_admin&id_admin=<?php echo $id_menu; ?>"
                class="btn">Mostrar Reservar</a>
            <a id="submit_a" href="index.php?opcion=salir" class="btn">Cerrar sesión</a>
            <div>
                <?php echo $nom. " ";
                echo $ape . " ";
                echo $dni;  ?>
            </div>

        </div>

    </nav>
    </nav>

</header>

<div class="contenedorReservas">
    <div class="muestraReservas">
        <?php 
    
    if(!empty($_SESSION['dni'])){?>

        <h2><?php echo @$_SESSION['nombre']; ?> <?php echo @$_SESSION['apellido']; ?></h2>
        <br>
        <!--<a  href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menú</a>-->
        <!--<td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>&redireccion=menu" class="btn">Volver</a>-->
        </td>
        <br>
        <?php
    } ?>
        <table>
            <br>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Entrante</td>
                    <td>Principal</td>
                    <td>Precio €</td>
                    <td>Creador</td>
                    <td colspan="3">Acciones</td>

                </tr>
            </thead>
            <tbody>
                <?php
            if (!empty($menus)) {
                foreach ($menus as $key => $value) {
                    foreach ($value as $menu) : ?>
                <tr>
                    <td><?php echo $menu['nombre_menu']; ?></td>
                    <td><?php echo $menu['entrante']; ?></td>
                    <td><?php echo $menu['plato_principal']; ?></td>
                    <td><?php echo format_decimal($menu['precio']); ?></td>
                    <?php foreach ($creador as $key => $value) {
                        foreach ($value as $user) : ?>

                    <?php if(isset($user['nombre'])){?>
                    <td><?php echo $user['nombre'];?> </td>
                    <?php }
                    
                     endforeach; 
                } ?>
                    <td><a class="btn"
                            href="index.php/?opcion=editar_menu&id=<?php echo $menu['id']; ?>&id_admin=<?php echo $menu['id_admin']; ?>">Editar</a>
                    </td>
                    <td><a class="btn"
                            href="index.php/?opcion=eliminar&id=<?php echo $menu['id']; ?>&tabla=menu&redireccion=menu&id_admin=<?php echo $menu['id_admin']; ?>">Eliminar</a>
                    </td>
                    <!--<td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $menu['dni_usuario']; ?>" class="btn">Volver</a></td>-->

                </tr>

                <?php endforeach;
                }
                $_SESSION['dni'] = $user['dni'];
            } else { ?>
                <tr>
                    <td colspan="5"> No hay Menú...</td>
                </tr>

                <?php
            } ?>


            </tbody>
        </table>
    </div>

</div>




<?php
    include("layouts/footer.php");
    ?>