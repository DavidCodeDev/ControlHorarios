<?php
require '../controladores/rellenar_tablas.php';
require_once '../controladores/VerificarSesion.php';

VerificadorSesion::verificarSesion();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información laboral</title>
    <link rel="stylesheet" type="text/css" href="diseño/style_invitado.css" />
    <link rel="stylesheet" type="text/css" href="diseño/tablas_invitado.css" />

</head>
<body>
    <div class="header-container">
        <header>
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="inicio_empresa.php">Inicio</a></li>
                        <li><a href="panel_invitado.php">Panel de fichaje</a></li>
                        <li><a href="logout.php">Cerrar sesión</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div> 
     
    <div class="container1">

    </div>  
    <footer>
    <p>&copy; 2024 Track your journey. Todos los derechos reservados.</p>
    </footer>
</body>
</html>