


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-image: url('imagen/165143.jpg');">

<?php
session_start();
if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>"; 
    unset($_SESSION['error']); 
}
?>

<div id="loginForm">

    <h1><center>Bienvenidos</center></h1>
    <form action="ConnectLogin.php" method="post">
        <div class="input-gruop" id="nameInput">
            <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input  id="correo" type="email" placeholder="Correo" name="correo" required>
            </div>
            <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input  id="contrasena" type="password" placeholder="Contraseña"  name="contrasena" required>
            </div>
            <p>Olvidaste tu contraseña <a href="OlvidoPassword.php">click aqui</a></p>
            <p>¿No tienes cuenta? <a href="Registro.php">Registrate</a></p>            
              </div>

              <div class="btn-field">
                <button  id="signIn" type="submit">Login</button>
              </div>
    </form>
  </div>

  
</body>
</html>
