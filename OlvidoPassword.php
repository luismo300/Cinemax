<?php
// Iniciar la sesión para acceder a las variables de sesión
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recuperar  Contraseña</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-image: url('imagen/165143.jpg');">

<div id="loginForm">
<a href="Login.php" style="margin-bottom: 0; font-size: 30px;">&lt;</a>
    <h2><center>Recuperar  Contraseña</center></h2>
    <form action="ConnectPassword.php" method="post" onsubmit="return validarContrasenas()">
        <div class="input-gruop" id="nameInput">
        <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input  id="id" type="text" placeholder="ID" name="id" required>
            </div>
            <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input  id="cedula" type="text" placeholder="Cédula" name="cedula" required>
            </div>
            <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input  id="contrasena" type="password" placeholder="Nuevo contraseña"  name="contrasena" required>
            </div>
            <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input  id="new contrasena" type="password" placeholder="Verificar contraseña"  name="new_contrasena" required>
            </div>
            <?php
                // Verificar si hay un mensaje de error almacenado en la sesión
                if (isset($_SESSION['error'])) {
                    echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);  // Limpiar el mensaje después de mostrarlo
                }
                ?>
              </div>

              <div class="btn-field">
                <button  id="signIn" type="submit">Cambiar Contraseña</button>
              </div>
    </form>
  </div>

</body>
</html>
