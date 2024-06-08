<?php

require '../modelos/conexionbbdd.php'; 

$register = new Register(); 

if(isset($_POST["submit"])){

    $result = $register->registration(
        $_POST["nombre"],
        $_POST["apellidos"],
        $_POST["email"],
        $_POST["fecha_nacimiento"],
        $_POST["password"],
        $_POST["password_confirmation"],  
        $_POST["genero"],
        $_POST["rol"]
    );

    if($result == 10){
        echo "<script>alert('Registro exitoso');</script>";
    } 
    elseif($result == 1){
        echo "<script>alert('Email o Usuario no disponibles');</script>";
    }
    elseif($result == 100){
        echo "<script>alert('La contraseña no coincide');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="diseño/style.css" />

    <style>
    .mensaje-advertencia {
        display: none;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 10px;
        margin-top: 10px;
    }
    .mensaje-advertencia.mostrar {
        display: block;
    }

    .mensaje-advertencia.exito {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.mensaje-advertencia.error {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

</style>

</head>
<body>


<form class="form" method="post" action="index.php">
    <h2 class="form__title">Regístrate</h2>

    <div id="mensaje-advertencia" class="mensaje-advertencia">
        <?php
        if (isset($result)) {
            echo "<p>$result</p>";
        }
        ?>
    </div>

    <div class="form__container">
        <div class="form__group">

            <input type="text" id="nombre" class="form__input" placeholder=" Nombre de usuario" name="nombre">
            <span class="form__line"></span>

        </div>

        <div class="form__group">

            <input type="text" id="apellidos" class="form__input" placeholder=" Nombre y apellidos" name="apellidos">
            <span class="form__line"></span>

        </div>

        <div class="form__group">

            <input type="email" id="email" class="form__input" placeholder=" Email" name="email" autocomplete="username">
            <span class="form__line"></span>

        </div>

        <div class="form__group">

            <input type="date" id="fecha_nacimiento" class="form__input" placeholder=" Fecha de nacimiento" name="fecha_nacimiento">
            <span class="form__line"></span>

        </div>

        <div class="form__group">

        <input type="password" id="password" class="form__input" placeholder=" Contraseña" name="password" autocomplete="new-password">
            <span class="form__line"></span>
        </div>

        <div class="form__group">

            <input type="password" id="confirmar_password" class="form__input" placeholder=" Confirmar contraseña" name="password_confirmation" autocomplete="new-password">
            <span class="form__line"></span>

        </div>

        <div class="form__group_generos">

            <input type="radio" id="masculino" name="genero" value="masculino" required name="genero">
            <label for="masculino">Masculino</label>

            <input type="radio" id="femenino" name="genero" value="femenino" required name="genero">
            <label for="femenino">Femenino</label>

            <input type="radio" id="otro" name="genero" value="otro" required name="genero">
            <label for="otro">Otro</label>

        </div>

        <div class="form__group__rol">
            <input type="radio" id="Administrador" name="rol" value="Administrador" required name="rol">
            <label for="masculino">Administrador</label>

            <input type="radio" id="Invitado" name="rol" value="Invitado" required name="rol">
            <label for="femenino">Invitado</label>
        </div>
   
        <input type="submit" class="form__submit" value="Registrarse" name="submit">
        <p class="form__paragraph">¿Ya tienes una cuenta?<a href="login.php" class="form__link">Entra aquí</a></p>

    </div>
</form>

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
</body>
</html>
