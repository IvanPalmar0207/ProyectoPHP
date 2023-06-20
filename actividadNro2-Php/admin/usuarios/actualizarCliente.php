<?php

require '../../includes/funciones.php';

$documentoActualizar = $_GET['numeroDoc_per'];
if(!$documentoActualizar){
    header('../../index.php');
}

$db=mysqli_connect('localhost','root','','proyectoBD');

$consultaClientes = "SELECT * FROM tb_cliente WHERE numeroDoc_per = $documentoActualizar";

$resultado = mysqli_query($db,$consultaClientes);

$clientes = mysqli_fetch_assoc($resultado);

    $id = $clientes['numeroDoc_per'];
    $tipoDoc = $clientes['tipoDoc_per'];
    $email = $clientes['email_per'];
    $nombre = $clientes['nombre_per'];
    $apellido = $clientes['apellido_per'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $tipoDoc = $_POST['tipoDoc'];
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    if (!$id){
        $errores[] = 'El numero de documento es obligatorio';
    }
    if (!$tipoDoc){
        $errores[] = 'El tipo de documento es un campo obligatorio';
    }
    if (!$email){
        $errores[] = 'El email de usuario es un campo obligatorio';
    }
    if (!$nombre){
        $errores[] = 'El nombre es un campo obligatorio';
    }
    if (!$apellido){
        $errores[] = 'El apellido es un campo obligatorio';
    }


if(empty($errores)){
    $sql = "UPDATE tb_cliente SET
    numeroDoc_per = '$id',
    tipoDOC_per = '$tipoDoc',
    email_per = '$email',
    nombre_per = '$nombre',
    apellido_per = '$apellido'
    WHERE numeroDoc_per = '$documentoActualizar'
    ";

    echo $sql;

    $resultado = mysqli_query($db,$sql);

    if($resultado){
        header('location: ../../index.php');
        }
    }
    else{
        foreach($errores as $error){
            echo '<br>'.$error;
        }
    }
}

?>

<!Doctype html>
<html lang='en'>
    <head>
        <meta charset = 'UTF-8'/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/crearCliente.css">
        <title>Actualizar Usuarios</title>
    </head>
    <body>
        <a href="../../index.php"></a>
        <aside class='aside'>
            <form class="formulario" method="POST">
                    <h1 class ='title'>Datos Del Cliente</h1>
                    <input class="input1" type="text" name="id" id="id" value="<?php echo $id?>"><br>

                    <input class="input1" type="text" name="tipoDoc" id="tipoDoc" value="<?php echo $tipoDoc?>">

                    <input class="input1" type="email" name="email" id="email" value='<?php echo $email?>'>

                    <input class="input1" type="text" name="nombre" id="nombre" value='<?php echo $nombre?>'>

                    <input class="input1" type="text" name="apellido" id="apellido" value="<?php echo $apellido?>"><br>
                    <br>

                    <input class="buton" type="submit" value="Ingresar Usuario"><br>
                    <a class="a1" href="seleccionarCliente.php">Volver atras</a>
            </form>
        </aside> 
    </body>
