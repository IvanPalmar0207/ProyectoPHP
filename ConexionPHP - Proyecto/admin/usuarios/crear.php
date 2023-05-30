<!Doctype html>
<html lang='en'>
    <head>
        <meta charset = 'UTF-8'/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/crear.css">
        <title>Insertar Usuarios</title>
    </head>
    <body>
        <aside class='aside'>
            <form class="formulario" action="crear.php" method="post">
                    <h1 class ='title'>Datos Personales del Usuario</h1>
                    <input class="input1" type="text" name="id" id="id" placeholder="Ingresa tu Documento" required>

                    <input class="input1" type="text" name="tipoDoc" id="tipoDoc" placeholder="Ingresa el tipo de documento" required>

                    <input class="input1" type="email" name="email" id="email" placeholder="Ingresa tu E-mail" required>

                    <input class="input1" type="text" name="nombre" id="nombre" placeholder="Ingresa tu Nombre" required>

                    <input class="input1" type="text" name="apellido" id="apellido" placeholder="Ingresa tu Apellido" required><br>
                    <br>

                    <input class="buton" type="submit" value="Ingresar Usuario"><br>
                    <a class="a1" href="../../index.php">Volver a Inicio</a>
            </form>
        </aside> 
    </body>
<?php
require '../../includes/funciones.php';

$db=mysqli_connect('localhost','root','','hotelpegasusprueba');

$errores = [];

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

    if (empty($errores)){
        $sql = "INSERT INTO tb_persona 
        VALUES ('$id','$tipoDoc','$email','$nombre','$apellido')";

        echo $sql;
        
        $resultadoSentecia = mysqli_query($db, $sql);
        if ($resultadoSentecia){
            header('location: ../../index.php');
        }
    }
}
?>