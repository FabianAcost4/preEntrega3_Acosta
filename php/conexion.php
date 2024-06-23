<?php

    $conexion = mysqli_connect ("localhost", "root", "", "marketplace");

    //Para verificar si esta conectada la BD
 if($conexion) {
        echo 'Conectado exitosamente a la base de datos';
    }else {
        echo 'No se pudo conecctar a la base de datos';
    } 

?>
