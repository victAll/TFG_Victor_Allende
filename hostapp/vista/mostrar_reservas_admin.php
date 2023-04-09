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
        <td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $_SESSION['dni']; ?>&redireccion=menu" class="btn">Volver</a></td>
        <br>
        <?php
    } ?>
        <table>
            <br>
            <thead>
                <tr>
                    <td>Nombre reserva</td>
                    <td>Fecha reserva</td>
                    <td>Email reserva</td>
                    <td>Usuario titular</td>
                    <td>Dni titular</td>
                    <td>Email titular</td>
                    <td>Menú</td>
                    <td>Entrante</td>
                    <td>Principal</td>
                    <td colspan="3">Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php
            if (!empty($menus)) {
                foreach ($menus as $key => $value) {
                    foreach ($value as $valor) : ?>
                <tr>
                    <td><?php echo $valor['nombre_reserva']; ?></td>
                    <td><?php echo $valor['fecha_reserva']; ?></td>
                    <td><?php echo $valor['email_reserva']; ?></td>
                    <td><?php echo $valor['nombre_usuario'];?>  <?php echo $valor['apellido']; ?></td>
                    <td><?php echo $valor['dni_usuario']; ?></td>
                    <td><?php echo $valor['email_usuario']; ?></td>
                    <td><?php echo $valor['nombre_menu']; ?></td>
                    <td><?php echo $valor['entrante']; ?></td>
                    <td><?php echo $valor['plato_principal']; ?></td>
                    <td><a class="btn"
                            href="index.php/?opcion=eliminar&id=<?php echo $valor['id']; ?>&tabla=reservas&redireccion=reserva_admin"
                            class="btn">Cancelar reserva</a></td>
                    <!--<td><a class="btn" href="index.php/?opcion=volver&id=<?php echo $valor['dni_usuario']; ?>" class="btn">Volver</a></td>-->

                </tr>


                <?php endforeach;
                }
            } else { ?>
                <tr>
                    <td colspan="5"> No hay reservas...</td>
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