<?php

//Para inicializar con sesiones 
session_start();

    include 'conexion.php';

    $nombreComprador = $_POST['nombre_comprador'];
    $contraseña = $_POST['contraseña'];

    $validarLogin = mysqli_query($conexion, "SELECT * FROM login_comprador WHERE nombre_comprador= '$nombreComprador'
    and contraseña= '$contraseña' ");

    if (mysqli_num_rows($validarLogin) > 0) {
        $_SESSION['usuario'] = $nombreComprador;
        header("location: ../Paginaprincipal/bienvenida.php");
        exit();
    }else {
        echo '
            <script>
                alert("Usuario no existe, porfavor verifique los datos introducidos");
                window.location= "../index.php";
            </script>
        ';
        exit();
    }
?>