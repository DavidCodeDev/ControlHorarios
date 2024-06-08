<?php
require '../controladores/controlador_login.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="diseño/style.css" />

</head>
<body>

<form class="form" method="POST" action="login.php">
    <h2 class="form__title">Inicia Sesión</h2>
    <div class="form__container">
        <div class="form__group">
            <input type="text" id="email" name="email" class="form__input" placeholder="Correo electrónico">
            <span class="form__line"></span>
        </div>
        <div class="form__group">
            <input type="password" id="password" name="password" class="form__input" placeholder="Contraseña">
            <span class="form__line"></span>
        </div>

        
        <input type="submit" name="submit" class="form__submit" value="Entrar">
        <p class="form__paragraph">¿No tienes una cuenta?<a href="index.php" class="form__link">Entra aquí</a></p>
        <p class="form__paragraph">Recuperar contraseña<a href="passwordolvidada.php" class="form__link">Recuperar</a></p>
    </div>
</form>


</body>
</html>