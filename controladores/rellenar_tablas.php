<?php
require '../modelos/conexionbbdd.php';

session_start();

// Verificar si la sesión tiene un ID de usuario
if (isset($_SESSION["id"])) {
    $usuario_id = $_SESSION["id"];

    $conexion = new ConexionDB();
    $login = new Login();

    // Obtener datos de la tabla 1
    $table1_content = '';
    $query2 = "SELECT id_nomina, fecha_pago, salario_base, bonificaciones, deducciones, total_bruto, total_neto, comentarios FROM nomina WHERE usuario_id = ?";
    $stmt2 = $conexion->con->prepare($query2);
    $stmt2->bind_param('i', $usuario_id);
    $stmt2->execute();
    $resultado2 = $stmt2->get_result();

    if ($resultado2->num_rows > 0) {
        $table1_content .= "<table class='table1'>";
        $table1_content .= "<tr><th>ID NOMINA</th><th>FECHA PAGO</th><th>SALARIO BASE</th><th>BONIFICACIONES</th><th>DEDUCCIONES</th>
              <th>TOTAL BRUTO</th><th>TOTAL NETO</th><th>COMENTARIOS</th></tr>";
        while ($row2 = $resultado2->fetch_assoc()) {
            $table1_content .= "<tr>";
            $table1_content .= "<td>".$row2['id_nomina']."</td>";
            $table1_content .= "<td>".$row2['fecha_pago']."</td>";
            $table1_content .= "<td>".$row2['salario_base']."</td>";
            $table1_content .= "<td>".$row2['bonificaciones']."</td>";
            $table1_content .= "<td>".$row2['deducciones']."</td>";
            $table1_content .= "<td>".$row2['total_bruto']."</td>";
            $table1_content .= "<td>".$row2['total_neto']."</td>";
            $table1_content .= "<td>".$row2['comentarios']."</td>";

            $table1_content .= "</tr>";
        }
        $table1_content .= "</table>";
    } 

    // Obtener datos de la tabla 2
    $table2_content = '';
    $query = "SELECT id, nombre_usuario, email, id_rol, fecha_nacimiento, genero, apellidos FROM usuarios WHERE id = ?";
    $stmt = $conexion->con->prepare($query);
    $stmt->bind_param('i', $usuario_id); // 'i' indica que $usuario_id es de tipo entero
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $table2_content .= "<table class='table2'>";
        $table2_content .= "<tr><th>ID</th><th>Nombre Usuario</th><th>Email</th><th>ID Rol</th><th>Fecha Nacimiento</th><th>Género</th><th>Apellidos</th></tr>";
        while ($row = $resultado->fetch_assoc()) {
            $table2_content .= "<tr>";
            $table2_content .= "<td>".$row['id']."</td>";
            $table2_content .= "<td>".$row['nombre_usuario']."</td>";
            $table2_content .= "<td>".$row['email']."</td>";
            $table2_content .= "<td>".$row['id_rol']."</td>";
            $table2_content .= "<td>".$row['fecha_nacimiento']."</td>";
            $table2_content .= "<td>".$row['genero']."</td>";
            $table2_content .= "<td>".$row['apellidos']."</td>";
            $table2_content .= "</tr>";
        }
        $table2_content .= "</table>";
    } 

    // Obtener datos de la tabla 3
    $table3_content = '';
    $query1 = "SELECT DISTINCT e.entrada_trabajo, s.salida_trabajo 
    FROM entrada_fichaje e 
    INNER JOIN salida_fichaje s ON e.id = s.id 
    WHERE e.id_usuario = ? AND s.id_usuario = ?";

    $stmt1 = $conexion->con->prepare($query1);
    $stmt1->bind_param('ii', $usuario_id, $usuario_id);
    $stmt1->execute();
    $resultado1 = $stmt1->get_result();

    if ($resultado1->num_rows > 0) {
        $table3_content .= "<table class='table3'>";
        $table3_content .= "<tr><th>ENTRADA TRABAJO</th><th>SALIDA TRABAJO</th></tr>";
        while ($row1 = $resultado1->fetch_assoc()) {
            $table3_content .= "<tr>";
            $table3_content .= "<td>".$row1['entrada_trabajo']."</td>";
            $table3_content .= "<td>".$row1['salida_trabajo']."</td>";

            $table3_content .= "</tr>";
        }
        $table3_content .= "</table>";
    } 
    
    $stmt->close();
    $stmt1->close();
    $stmt2->close();
    $conexion->con->close();

    // Imprimir contenido dentro de contenedores div
    echo "<div class='container'>";
    echo "<div class='table1-container'>$table1_content</div>";
    echo "<div class='table2-container'>$table2_content</div>";
    echo "<div class='table3-container'>$table3_content</div>";
    echo "</div>";
}
?>