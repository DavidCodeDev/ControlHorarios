<?php
class Logout {
    public function __construct() {
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit; // Para detener la ejecución después de redirigir
    }
}

// Uso de la clase
$logout = new Logout();
?>
