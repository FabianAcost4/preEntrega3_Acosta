<?php

    //Llamar la conexión para pode utilizarla con la variable ejecutar
    include 'conexion.php';

    //Para cambiar los valores de php a mysql
    $num_de_identificacion = $_POST['num_de_identificacion'];
    $nombre_comprador = $_POST['nombre_comprador'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    //hash() es para el incriptamiento de contraseña
    //Mirar si se cambia por el password_hash() y verificar con password_verify() o por bcrypt o Argon2.
    /* $contraseña = hash('sha512', $contraseña);
    $contraseña = $_POST['contraseña'] */
    //Para insertar los datos en la tabla
    $query = "INSERT INTO login_comprador (num_de_identificacion, nombre_comprador, fecha_nacimiento, pais, telefono, correo, contraseña) 
    VALUES ('$num_de_identificacion', '$nombre_comprador', '$fecha_nacimiento', '$pais', '$telefono', '$correo', '$contraseña')";

    //Verificar que el usuario no se repita en la BD
    $verificarNombreComprador = mysqli_query($conexion, "SELECT * FROM login_comprador WHERE nombre_comprador='$nombre_comprador' ");

    //Si encuentra un fila con el mismo correo que da mensajede error
    if(mysqli_num_rows($verificarNombreComprador) > 0){
        echo '
            <script>
                alert("Este nombre ya esta en uso, intenta conotro diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    //Verificar que el documento del comprador no se repita en la BD
    $verificarIdentificacion = mysqli_query($conexion, "SELECT * FROM login_comprador WHERE num_de_identificacion='$num_de_identificacion' ");

    //Si encuentra un fila con el mismo correo que da mensajede error
    if(mysqli_num_rows($verificarIdentificacion) > 0){
        echo '
            <script>
                alert("Este documento ya esta en uso, intenta conotro diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }   

    //Verificar que el correo no se repita en la BD
    $verificarCorreo = mysqli_query($conexion, "SELECT * FROM login_comprador WHERE correo ='$correo' ");

    //Si encuentra un fila con el mismo correo que da mensaje de error
    if(mysqli_num_rows($verificarCorreo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    //Verificar que el teléfono no se repita en la BD
    $verificarTelefono = mysqli_query($conexion, "SELECT * FROM login_comprador WHERE telefono ='$telefono' ");

    //Si encuentra un fila con el mismo correo que da mensaje de error
    if(mysqli_num_rows($verificarTelefono) > 0){
        echo '
            <script>
                alert("Este teléfono ya esta registrado, intenta con otro diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    //Si funciona crea un alert para mostrar el mensaje
    if ($ejecutar) {
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../index.php";
            </script>
        ';
    }else {
        echo '
            <script>
                alert("Intentalo de nuevo usuario no almacenado");
                window.location = "../index.php";
            </script>
        ';
    }

    //Cerrar conexión de la BD
    mysqli_close($conexion);
?>