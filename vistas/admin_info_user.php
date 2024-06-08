<?php
require_once '../controladores/SesionActiva.php';
require_once '../controladores/VerificarSesion.php';
require '../controladores/tablas_admin.php';


VerificadorSesion::verificarSesion();

$nomina = new Nomina();

if(isset($_POST["submit"])){

    $result = $nomina->insertarNomina(
        $_POST["id"], 
        $_POST["fecha_pago"], 
        $_POST["salario_base"], 
        $_POST["bonificacion"], 
        $_POST["deduccion"], 
        $_POST["bruto"], 
        $_POST["neto"], 
        $_POST["comentarios"]
    );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track your journey</title>
    <link rel="stylesheet" type="text/css" href="diseño/style_invitado.css" />
    <link rel="stylesheet" type="text/css" href="diseño/tablas_info.css" />
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
<div class="formulario">
    <h3>Insertar nómina</h3>
    <form name="nomina" method="post" action="admin_info_user.php">

        <div class="label">
            <label name="label" for="id">ID USUARIO</label><br>
            <input type="text" id="id" name="id"><br>
            </div>

        <div class="label">
            <label name="label" for="fecha_pago">FECHA PAGO</label><br>
            <input type="date" id="fecha_pago" name="fecha_pago"><br>
            </div>

        <div class="label">
            <label name="label" for="salario_base">SALARIO BASE</label><br>
            <input type="number" id="salario_base" name="salario_base"><br>
        </div>

        <div class="label">
            <label name="label" for="bonificacion">BONIFICACIONES</label><br>
            <input type="number" id="bonificacion" name="bonificacion"><br>
        </div>
    
        <div class="label">
            <label name="label" for="deduccion">DEDUCCIONES</label><br>
            <input type="number" id="deduccion" name="deduccion"><br>
        </div>

        <div class="label">
            <label name="label" for="bruto">TOTAL BRUTO</label><br>
            <input type="number" id="bruto" name="bruto"><br>
        </div>

        <div class="label">
            <label name="label" for="neto">TOTAL NETO</label><br>
            <input type="number" id="neto" name="neto"><br>
        </div>

        <div class="label">
            <label name="label" for="comentarios">COMENTARIOS</label><br>
            <input type="text" id="comentarios" name="comentarios"><br>
        </div>
        
        <input type="submit" class="submit" value="Enviar" name="submit">
    </form>
</div>

    <footer>
        <p>&copy; 2024 Track your journey. Todos los derechos reservados.</p>
    </footer>
</body>
</html>




