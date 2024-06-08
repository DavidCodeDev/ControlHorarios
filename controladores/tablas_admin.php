<?php

require '../modelos/conexionbbdd.php';

class mostrarTablas {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionDB();
    }

    public function mostrarTablaFichajes() {
        $query = "SELECT entrada_fichaje.nombre_fk, entrada_fichaje.id_usuario, entrada_fichaje.entrada_trabajo, salida_fichaje.salida_trabajo 
        FROM entrada_fichaje 
        JOIN salida_fichaje ON entrada_fichaje.id_usuario = salida_fichaje.id_usuario 
        AND entrada_fichaje.id = salida_fichaje.id";

        $stmt = $this->conexion->con->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $tabla = "<table class='table1'>";
        $tabla .= "<tr><th>ID TRABAJADOR</th><th>NOMBRE</th><th>ENTRADA TRABAJO</th><th>SALIDA TRABAJO</th></tr>";
        
        while ($row = $resultado->fetch_assoc()) {
            $tabla .= "<tr>";
            $tabla .= "<td>".$row['id_usuario']."</td>";
            $tabla .= "<td>".$row['nombre_fk']."</td>";
            $tabla .= "<td>".$row['entrada_trabajo']."</td>";
            $tabla .= "<td>".$row['salida_trabajo']."</td>";
            $tabla .= "</tr>";
        }
        
        $tabla .= "</table>";
        
        $stmt->close();
        return $tabla;
    }
}

class UsuarioController {
    private $conexion;

    public function __construct() {
        $this->conexion = new ConexionDB();
    }

    public function mostrarTablaUsuarios() {
        $query = "SELECT id, nombre_usuario, email, id_rol, fecha_nacimiento, genero, apellidos FROM usuarios";
        $stmt = $this->conexion->con->prepare($query);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $tabla = "<table class='table'>";
        $tabla .= "<tr><th>ID</th><th>Nombre Usuario</th><th>Email</th><th>ID Rol</th><th>Fecha Nacimiento</th><th>Género</th><th>Apellidos</th></tr>";
        
        while ($row = $resultado->fetch_assoc()) {
            $tabla .= "<tr>";
            $tabla .= "<td>".$row['id']."</td>";
            $tabla .= "<td>".$row['nombre_usuario']."</td>";
            $tabla .= "<td>".$row['email']."</td>";
            $tabla .= "<td>".$row['id_rol']."</td>";
            $tabla .= "<td>".$row['fecha_nacimiento']."</td>";
            $tabla .= "<td>".$row['genero']."</td>";
            $tabla .= "<td>".$row['apellidos']."</td>";
            $tabla .= "</tr>";
        }
        
        $tabla .= "</table>";
        
        $stmt->close();
        return $tabla;
    }
}

session_start();

if (SesionActiva::verificarSesionActiva()) {
    $usuario_id = $_SESSION["id"];

    $mostrarTablas = new mostrarTablas();
    $usuarioController = new UsuarioController();

    echo $mostrarTablas->mostrarTablaFichajes();
    echo $usuarioController->mostrarTablaUsuarios();
}

?>



<?php

class Nomina extends ConexionDB {
    
    public function insertarNomina($id, $fecha_pago, $salario_base, $bonificacion, $deduccion, $bruto, $neto, $comentarios) {
        $stmt = $this->con->prepare("INSERT INTO nomina 
        (usuario_id, fecha_pago, salario_base, bonificaciones, deducciones, total_bruto, total_neto, comentarios) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isiiiiis", $id, $fecha_pago, $salario_base, $bonificacion, $deduccion, $bruto, $neto, $comentarios);
        $stmt->execute();
        $stmt->close();
    }
}
?>