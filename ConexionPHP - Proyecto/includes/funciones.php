<?php
function conectarBD(){
    $db=mysqli_connect('localhost','root','','hotelpegasusprueba');

    if(!$db){
        return 'No se pudo realizar la conexion a la base de datos';
    }
    else{
        return 'La conexion a la base de datos fue exitosa';
    }
}

$prueba=conectarBD();
?>