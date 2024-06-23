<?php

    session_start();

    //Si no existe
    if (!isset($_SESSION['usuario'])) {
        echo '
            <script>
                alert("Por favor debes iniciar sesión ");
                window.location = "../index.html";
            </script>
        ';
        //Para que el codigo de abajo no se ejecute
        session_destroy();
        die();
        
    }
   /* session_destroy();*/

   else { 
    header("Location: ../pagina_principal.html");
   }
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketCol</title>
</head>
<body>
    <h1>bienvenido a nuestro Marketplace</h1>
    <a href="../php/cerrar_sesion.php">Cerrar sesión</a>
</body>
</html> -->