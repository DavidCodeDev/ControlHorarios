<?php
require '../modelos/conexionbbdd.php';
session_start();

$conexion = new ConexionDB();
$login = new Login($conexion);


if (isset($_POST["submit"])) {
    $result = $login->login($_POST["email"], $_POST["password"]);

    if ($result == 1) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();

        // Obtén el rol del usuario desde la base de datos
        $rol = $login->obtenerRolFromDatabase($_SESSION["id"]);

        if ($rol === 1) {
            header("Location: /PROYECTODAW_MVC/vistas/inicio_empresa_admin.php");
        } else {
            header("Location: /PROYECTODAW_MVC/vistas/inicio_empresa.php");
        }
        exit();
    } elseif ($result == 10) {
        echo "<script> alert('Contraseña incorrecta');</script>";
    } elseif ($result == 100) {
        echo "<script> alert('Usuario no registrado');</script>";
    }
}

?>