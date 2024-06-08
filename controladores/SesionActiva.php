<?php

class SesionActiva {
    public static function verificarSesionActiva() {
        return isset($_SESSION["id"]);
    }
}
