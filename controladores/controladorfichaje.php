<?php
require_once '../controladores/VerificarSesion.php';

class FichajeController { 
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionDB();
    }

    public function procesarEntrada() {

        VerificadorSesion::verificarSesion();

        if(isset($_POST['boton_entrada'])){
            date_default_timezone_set('Europe/Madrid');
            $tiempo_entrada = date('Y-m-d H:i:s');
            $usuario_id = $_SESSION["id"];

            $query = "INSERT INTO entrada_fichaje (id_usuario, entrada_trabajo, nombre_fk) 
            SELECT ?, ?, nombre_usuario 
            FROM usuarios 
            WHERE id = $usuario_id";
            $stmt = $this->conexion->con->prepare($query);
            $stmt->bind_param("is", $usuario_id, $tiempo_entrada);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $successMessage = true;
            } else {
                $errorMessage = true;
            }
            // Cerrar la declaración
            $stmt->close();
        }
    }

    public function procesarSalida() {

        if (!isset($_SESSION["id"])) {
            header("Location: /PROYECTODAW_MVC/vistas/login.php");
            exit();
        }

        if(isset($_POST['boton_salida'])){
            date_default_timezone_set('Europe/Madrid');
            $tiempo_salida = date('Y-m-d H:i:s');
            $usuario_id = $_SESSION["id"];

            $query = "INSERT INTO salida_fichaje (id_usuario, salida_trabajo, nombre_fk) 
            SELECT ?, ?, nombre_usuario 
            FROM usuarios 
            WHERE id = $usuario_id";
            $stmt = $this->conexion->con->prepare($query);
            $stmt->bind_param("is", $usuario_id, $tiempo_salida);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $successMessage = true;
            } else {
                $errorMessage = true;
            }

            // Cerrar la declaración
            $stmt->close();
        }
    }
}

?>
