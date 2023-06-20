<?php

require '../../includes/funciones.php';

$documentoEliminar = $_GET['numeroDoc_per'];

if(!$documentoEliminar){
    header('../../index.php');
}

$db=mysqli_connect('localhost','root','','proyectoBD');

    $sql = "DELETE FROM tb_cliente WHERE numeroDoc_per = '$documentoEliminar'";
    echo $sql;

    $resultado = mysqli_query($db,$sql);

    if($resultado){
        header('location: ../../index.php');
    }

?>