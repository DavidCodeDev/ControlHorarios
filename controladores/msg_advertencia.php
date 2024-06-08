<script>
    <?php
    if (isset($result) && is_array($result)) {
        echo "var result = " . json_encode($result) . ";";
        echo "document.addEventListener('DOMContentLoaded', function() { displayMessage(result); });";
    }
    ?>

    function displayMessage(result) {
        var mensajeAdvertencia = document.getElementById('mensaje-advertencia');

        if (result) {
            mensajeAdvertencia.innerHTML = "<p>" + result.mensaje + "</p>";
            mensajeAdvertencia.classList.add(result.exito ? 'exito' : 'error');
            mensajeAdvertencia.style.display = 'block';
        } else {
            mensajeAdvertencia.style.display = 'none';
        }
    }
</script>