<?php

require '../modelos/conexionbbdd.php';
require_once '../controladores/VerificarSesion.php';
require_once '../controladores/controladorfichaje.php';

session_start();
VerificadorSesion::verificarSesion();

$fichajeController = new FichajeController();

if(isset($_POST['boton_entrada'])){
    $fichajeController->procesarEntrada();
}

if(isset($_POST['boton_salida'])){
    $fichajeController->procesarSalida();
}

if(isset($_POST['boton_entrada']) || isset($_POST['boton_salida'])){
    // Mensaje de éxito
    $successMessage = "Hora registrada con éxito";
}

?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        <?php if (isset($successMessage)): ?>
            // Muestra mensaje de éxito
            document.getElementById('successMessage').style.display = 'block';
            // Oculta el mensaje después de 5 segundos
            setTimeout(function(){
                document.getElementById('successMessage').style.display = 'none';
                // Envía el formulario después de que el mensaje haya desaparecido
                document.querySelector('form').submit();
            }, 7000); // 7 segundos de espera
        <?php endif; ?>

        <?php if (isset($errorMessage)): ?>
            console.log("No se pudo grabar");
        <?php endif; ?>
    });
    
</script>


<?php
if(isset($_POST['boton_entrada'])){
    // para el boton entrada
    
    // inhabilitar el botón
    echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var botonEntrada = document.querySelector(\'button[name="boton_entrada"]\');
                botonEntrada.disabled = true;
                setTimeout(function() {
                    botonEntrada.disabled = false; 
                }, 9000); // 15000 milisegundos = 15 segundos
            });
          </script>';
}
?>

<?php
if(isset($_POST['boton_salida'])){
    // para el boton salida
    
    // inhabilitar el botón
    echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var botonSalida = document.querySelector(\'button[name="boton_salida"]\');
                botonSalida.disabled = true;
                setTimeout(function() {
                    botonSalida.disabled = false; 
                }, 9000);
            });
          </script>';
}
?>
