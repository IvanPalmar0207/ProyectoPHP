<?php

require '../../includes/funciones.php';

$db = mysqli_connect('localhost','root','','proyectoBD');


$consulta = 'SELECT * FROM tb_reserva';

$resultadoSentecia = mysqli_query($db,$consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/seleccionarCliente.css">
    <title>Seleccionar Reservas</title>
</head>
<body>
    <h3>Gestion de Reservas - Hotel Pegasus</h3>
    <table border="1">
        <th>
            <tr>
                <th>Codigo de la Reserva</th>
                <th>Fecha de Llegada</th>
                <th>Fecha de Salida</th>
                <th>Nro. Menores de Edad</th>
                <th>Nro. Mayores de Edad</th>
                <th>Numero de Documento</th>
                <th>Estado de la Reserva</th>
                <th>Opciones</th>
            </tr>
        </th>
        <?php while ($reserva = mysqli_fetch_assoc($resultadoSentecia)){?>
            <tr>
                <td><?php echo $reserva['codigo_res'];?></td>
                <td><?php echo $reserva['fechaInicio'];?></td>
                <td><?php echo $reserva['fechaSalida'];?></td>
                <td><?php echo $reserva['cantidadJovenes'];?></td>
                <td><?php echo $reserva['cantidadAdultos'];?></td>
                <td><?php echo $reserva['numeroDoc_per'];?></td>
                <td><?php echo $reserva['estado_res'];?></td>
                <td>
                    <a class="a2" href="eliminarReserva.php">Eliminar</a>
                    <a class="a2" href="/admin/usuarios/actualizarReserva.php?id=<?php echo $reserva['numeroDoc_per']?>">Actualizar</a>
                    <?php } ?>
                </td>
            </tr>
            <a class="a1" href="../../index.php">Inicio</a>
    </table>
</body>
</html>