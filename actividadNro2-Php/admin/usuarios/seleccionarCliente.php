<?php

require '../../includes/funciones.php';

$db=mysqli_connect('localhost','root','','proyectoBD');


$consulta = 'SELECT * FROM tb_cliente';

$resultadoSentecia = mysqli_query($db,$consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/seleccionarCliente.css">
    <title>Seleccionar Clientes</title>
</head>
<body>
    <h3>Gestion de Clientes - Hotel Pegasus</h3>
    <table border="1">
        <th>
            <tr>
                <th>Numero de Documento</th>
                <th>Tipo de Documento</th>
                <th>Correo Electronico</th>
                <th>Nombres del Cliente</th>
                <th>Apellidos del Cliente</th>
                <th>Opciones</th>
            </tr>
        </th>
        <?php while ($cliente = mysqli_fetch_assoc($resultadoSentecia)){?>
            <tr>
                <td><?php echo $cliente['numeroDoc_per'];?></td>
                <td><?php echo $cliente['tipoDoc_per'];?></td>
                <td><?php echo $cliente['email_per'];?></td>
                <td><?php echo $cliente['nombre_per'];?></td>
                <td><?php echo $cliente['apellido_per'];?></td>
                <td>
                    <a class="a2" href="eliminarCliente.php">Eliminar</a>
                    <a class="a2" href="/admin/usuarios/actualizar.php?id=<?php echo $cliente['numeroDoc_per']?>">Actualizar</a>
                    <?php } ?>
                </td>
            </tr>
            <a  class="a1" href="../../index.php">Inicio</a>
    </table>
</body>
</html>