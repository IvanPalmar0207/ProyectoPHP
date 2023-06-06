<!Doctype html>
<html lang='en'>
    <head>
        <meta charset = 'UTF-8'/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/crearReserva.css">
        <title>Crear Reserva</title>
    </head>
    <body>
        <aside class='aside'>
            <form class="formulario" action="crearReserva.php" method="post">
                    <h1 class ='title'>Datos de la Reserva</h1>
                    
                    <p class='p1'>Fecha de Llegada</p>
                    <input class="input1" type="date" name="fechaSalida" id='fechaSalida' required>
                    
                    <p class='p2'>Fecha de Salida</p>
                    <input class="input2" type="date" name="fechaLlegada" id='fechaLlegada' required>

                    <p class='p3'>Menores de Edad</p>
                    <input class="input3" type="number" name="numeroJovenes" id="numeroJovenes" required>

                    <p class='p4'>Mayores de Edad</p>
                    <input class="input4" type="number" name="numeroAdultos" id="numeroAdultos" required>
                   
                    <p class="p5">Estado de la Reserva</p>
                    <select class="input5" name="estadoReserva" id="estadoReserva" required>
                        <option value="vacio"></option>
                        <option value="inactivo">Inactivo</option>
                        <option value="activo">Activo</option>
                    </select>

                    <p class='p6'>Nro de Documento</p>
                    <input class="input6" type="text" name="nroDocumento" id="nroDocumento" required>
                    <br>

                    <b><input class="input7" type="submit" value="Enviar Reserva" required></b>
                    <br>

                    <a class="a1" href="../../index.php">Volver a Inicio</a>
            </form>
        </aside> 
    </body>
<?php
require '../../includes/funciones.php';

$db=mysqli_connect('localhost','root','','proyectoBD');

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $fechaLlegada = $_POST['fechaLlegada'];
    $fechaSalida = $_POST['fechaSalida'];
    $numeroJovenes = $_POST['numeroJovenes'];
    $numeroAdultos = $_POST['numeroAdultos'];
    $estadoReserva = $_POST['estadoReserva'];
    $numeroDocumento = $_POST['nroDocumento'];

    if (!$fechaLlegada){
        $errores[] = 'La fecha de llegada es un dato obligatorio';
    }
    if (!$fechaSalida){
        $errores[] = 'La fecha de salida es un dato obligatorio';
    }
    if (!$numeroJovenes){
        $errores[] = 'El numero de jovenes es un dato obligatorio';
    }
    if (!$numeroAdultos){
        $errores[] = 'El numero de Adultos es un dato obligatorio';
    }
    if (!$estadoReserva){
        $errores[] = 'El estado reserva es un dato obligatorio';
    }
    if (!$numeroDocumento){
        $errores[] = 'El numero de Documentos es un dato obligatorio';
    }

    if (empty($errores)){
        $sql = "INSERT INTO tb_reserva(fechaInicio,fechaSalida,cantidadJovenes,
                                        cantidadAdultos,numeroDoc_per,estado_res)
        VALUES ('$fechaLlegada','$fechaSalida','$numeroJovenes','$numeroAdultos','$numeroDocumento','$estadoReserva')";

        echo $sql;
        
        $resultadoSentecia = mysqli_query($db, $sql);
        if ($resultadoSentecia){
            header('location: ../../index.php');
        }
    }
}
?>