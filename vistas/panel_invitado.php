<?php
require '../controladores/control_entrada_salida.php';
require_once '../controladores/VerificarSesion.php';
VerificadorSesion::verificarSesion();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="diseño/style_invitado.css" />
    <title>Panel Invitado</title>
</head>


<body>

<header>
        <div class="container">
            
            <nav>
                <ul>
                    <li><a href="inicio_empresa.php">Inicio</a></li>
                    <li><a href="info_user.php">Información laboral</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <h1 id="welcome" name="bienvenido"> BIENVENIDO A TRACK YOUR JOURNEY </h1>

<form method="POST">
    <div name="botones">
        <button type="submit" name="boton_entrada">Entrada</button>
        <button type="submit" name="boton_salida">Salida</button>

    </div>
</form>
<h3 id="successMessage" style="display: none;">
    Hora registrada exitosamente.
</h3>

<footer>
    <p>&copy; 2024 Track your journey. Todos los derechos reservados.</p>
    </footer>
</body>
</html>