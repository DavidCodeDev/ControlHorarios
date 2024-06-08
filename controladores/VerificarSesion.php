<?php

class VerificadorSesion {
    public static function verificarSesion() {
        if (!isset($_SESSION["id"])) {
            header("Location: /PROYECTODAW_MVC/vistas/login.php");
            exit();
        }
    }
}
