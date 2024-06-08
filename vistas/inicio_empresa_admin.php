<?php
require_once '../controladores/VerificarSesion.php';
session_start();
VerificadorSesion::verificarSesion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track your journey</title>
    <link rel="stylesheet" type="text/css" href="diseño/acerca_de.css" />
</head>
<body>
<header>
        <div class="container">
            
            <nav>
                <ul>
                    <li><a href="inicio_empresa_admin.php">Inicio</a></li>
                    <li><a href="admin_info_user.php">Gestionar Trabajadores</a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
        
    </header>
    <div class="container">
        <h1>Track your jouney</h1>
        <div class="intro">
            <h2>Bienvenido a Track your journey</h2>
            <p>Gestiona la entrada y salida de usuarios de forma fácil y eficiente.</p>
        </div>
        <div class="info">
            <h2>Sobre Track your journey</h2>
            <p>Track your journey es una plataforma diseñada para ayudarte a gestionar la entrada y salida de usuarios de tu sitio web o aplicación. Ya sea que estés administrando un sitio web personal, una pequeña empresa o una empresa a gran escala, nuestra herramienta está diseñada para adaptarse a tus necesidades.</p>
            <p>Con Track your journey, puedes:</p>
            <ul>
                <li>Llevar un registro de los usuarios que acceden a tu sitio.</li>
                <li>Gestionar los permisos de acceso de los usuarios.</li>
                <li>Analizar datos de uso para mejorar la experiencia del usuario.</li>
                <li>Consultar tus registros propios de trabajo.</li>
                <li>Rellenar las nóminas de tus trabajadores desde el perfil de administrador.</li>
            </ul>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Track your journey. Todos los derechos reservados.</p>
    </footer>
</body>
</html>