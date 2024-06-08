<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" type="text/css" href="diseño/style.css" />
</head>
<body>


<form class="form">
    <h2 class="form__title">Recuperar Contraseña</h2>
    

    <div class="form__container">
    <div class="form__group">
        <input type="text" id="name" class="form__input" placeholder="   Correo electrónico o Usuario">
       
        <span class="form__line"></span>
    </div>
    
    <div class="form__group">
        <input type="password" id="password" class="form__input" placeholder="   Nueva contraseña">
       
        <span class="form__line"></span>
    </div>

    <div class="form__group">
        <input type="password" id="password" class="form__input" placeholder="   Confirmar contraseña">
       
        <span class="form__line"></span>
    </div>

    <input type="submit" class="form__submit" value="Enviar">
    <p class="form__paragraph"><a href="login.php" class="form__link">Volver a Inicio</a></p>
    </div>
</form>


</body>
</html>