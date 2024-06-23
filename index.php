<?php

    session_start();

    if(isset($_SESSION['usurio'])){
        header("location: ../Paginaprincipal/bienvenida.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketCol</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Inicio de sesión y registro-->
            <div class="contenedor__login-register">
                    <!--Inicio de sesión-->
                <form action="php/login_comprador.php" method = "POST"  class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Nombre de usuario" name="nombre_comprador">
                    <input type="password" placeholder="Contraseña" name="contraseña">
                    <button>Entrar</button>
                </form>

                <!--Registro-->
                <form action="php/registro_comprador.php" method ="POST" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <input type="number" name="num_de_identificacion" placeholder="Número de identificación" id="">
                    <input type="text" name="nombre_comprador" placeholder="Nombre completo" id="">
                    <input type="date" name="fecha_nacimiento" placeholder="fecha de nacimiento" id="">
                    <input type="text" name="pais" placeholder="País" id="">
                    <input type="tel" name="telefono" placeholder="teléfono" id="">
                    <input type="email" name="correo" placeholder="Correo" id="">
                    <input type="password" name="contraseña" placeholder="Contraseña" id="">
                    <button>Regístrarse</button>
                </form>
            </div>
        </div>

    </main>

<script src="script.js"></script>

</body>
</html>
