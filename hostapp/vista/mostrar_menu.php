<?php
   
   require_once("modelo/session.php");
   include("layouts/header.php");
   
    ?>



<div class="contenedorReservas">
    <div class="muestraReservas">
        <?php 
    
    if(!empty($_SESSION['dni'])){?>

        <h2><?php echo @$_SESSION['nombre']; ?> <?php echo @$_SESSION['apellido']; ?></h2>
        <br>
        <a  href="index.php?opcion=nueva_transaccion&redireccion=menu" class="btn">Crear Menú</a>
        <td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>&redireccion=menu" class="btn">Volver</a>
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
                    <td>Creador</td>
                    <td colspan="3">Acciones</td>

                </tr>
            </thead>
            <tbody>
                <?php
            if (!empty($menus)) {
                foreach ($menus as $key => $value) {
                    foreach ($value as $valor) : ?>
                <tr>
                    <td><?php echo $valor['nombre_menu']; ?></td>
                    <td><?php echo $valor['entrante']; ?></td>
                    <td><?php echo $valor['plato_principal']; ?></td>
                    <?php foreach ($creador as $key => $value) {
                        foreach ($value as $user) : ?>

                    <?php if(isset($user['nombre'])){?>
                    <td><?php echo $user['nombre'];?> </td>
                    <?php }
                     endforeach; 
                } ?>
                    <td><a class="btn" href="index.php/?opcion=editar_menu&id=<?php echo $valor['id']; ?>"
                            class="btn">Editar</a></td>
                    <td><a class="btn"
                            href="index.php/?opcion=eliminar&id=<?php echo $valor['id']; ?>&tabla=menu&redireccion=menu&id_admin=<?php echo $valor['id_admin']; ?>"
                            class="btn">Eliminar</a></td>
                    <!--<td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $valor['dni_usuario']; ?>" class="btn">Volver</a></td>-->

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