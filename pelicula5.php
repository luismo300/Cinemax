<?php
session_start();
$usuario = $_SESSION['usuario']; // Recupera el nombre del usuario
$id = $_SESSION['id']; 
$tipo= $_SESSION['tipo']; 

if (isset($_COOKIE['ultimo_acceso'])) {
    $ultimo_acceso = $_COOKIE['ultimo_acceso'];
} else {
    $ultimo_acceso = "No disponible"; // Si no existe la cookie
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSIDE OUT 2</title>
    <link rel="stylesheet" href="Estilo.css">
    <link rel="stylesheet" href="Login.css">
    <link rel="icon" href="imagen/logo.jfif" type="image/x-icon">

<!--Link de fuentes de letra -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<!--Fondo -->
<body style="background-color: black;">
    <script src="javaScript.js"></script>
    <script src="menustate.js"></script>
    <div style="margin-left: 20px;margin-right: 20px;">
        <nav><!--Barra superior-->
            <div>
            <ul>
                <li style="margin-right: 20px;"><p class="poetsen-one-regular"><img src="imagen/logo.jfif" style="width: 150px;"></p></li> 
                <li><a href="HOME.php">INICIO</a></li>
                <li><a href="Pelicula.php">PELÍCULAS</a></li>
                <li><a href="SobreNosotros.php">SOBRE NOSOTROS</a></li>
                <li>
                <div>
                        <p style="display: inline-block; margin-top: 0; margin-bottom: 0;">Último acceso: <?php echo $ultimo_acceso; ?></p>
                    </div>
                    <div class="navegador_derecho">
                        <li>
                            <div class="busqueda">
                                 <form action="https://www.google.com/search" style="display: flex; align-items: center;">
                                     <input type="text" placeholder="Buscas" style="margin-right: 5px; padding: 5px;">
                                      <button type="submit" style="background: none; border: none; cursor: pointer;padding-right: 0px;">
                                      <img src="imagen/icono_busqueda.png" alt="Buscar"style="height: 30px; width: 30px;">
                                      </button>
                                 </form>
                            </div>
                        </li>
                        <img src="imagen/icono_login2.jpg">

                        <div id="cuentaAbierta" style="text-align: center; align-items: flex-start; padding-left: 0; max-width: 200px;">
                            <div style="display: inline-block; margin-bottom: 0px;">
                            <p style="display: inline-block; margin-right: 10px; margin-top: 0; margin-bottom: 0;"><?php echo htmlspecialchars($usuario); ?></p>
                            <p style="display: inline-block; margin-top: 0; margin-bottom: 0;">ID: <?php echo htmlspecialchars($id); ?></p>
                            </div>
                            <div style="display: inline-block; margin-bottom: 0px;">
                            <?php if ($tipo === 'cliente'): ?>
                                <a href="Historial.php" style="display: inline-block; margin-top: 0; margin-right: 10px;">Historial</a>
                            <?php endif; ?>
                            <?php if ($tipo === 'empleado'): ?>
                                <a href="Registro_pelicula.php" style="display: inline-block; margin-top: 0; margin-right: 10px;">Registro Película</a>
                            <?php endif; ?>
                                <a href="Logout.php"  style="display: inline-block; margin-top: 0;">Logout</a>
                            </div>
                        </div>       
                    </div>
                </li>
            </ul>
            <hr>
            <div style="display: flex; align-items: center;">
                <ul style="margin-left: auto; margin-right: 140px;" >
                        <li><a href="https://www.google.com/search"><img src="imagen/icono_ins.jpg" alt="Buscar"style="height: 30px; width: 30px;"></a></li>
                        <li><a href="https://www.google.com/search"><img src="imagen/icono_facebook.jpg" alt="Buscar"style="height: 30px; width: 30px;"></a></li>
                        <li><a href="https://www.google.com/search"><img src="imagen/icono_whatsapp.jpg" alt="Buscar"style="height: 30px; width: 30px;"></a></li>
                        <li><a href="https://www.google.com/search"><img src="imagen/icono_youtube.jpg" alt="Buscar"style="height: 30px; width: 30px;"></a></li>
                        <li><a href="https://www.google.com/search"><img src="imagen/icono_tiktok.jpg" alt="Buscar"style="height: 30px; width: 30px;"></a></li>
                </ul>
               </div>
            </div>
    
        </nav>
    </div>

<!-- Formulario de Inicio de Sesión -->
<div id="loginForm" class="form-container">
    <span class="close" onclick="closeForm()">&times;</span>
    <h1>Bienvenidos</h1>
    <form action="ConnectLogin.jsp" method="post">
        <div class="input-gruop" id="nameInput">
            <div class="input-field">
                <i class="fa-solid fa-user"></i>
                <input  id="nombre" type="text" placeholder="Nombre" name="nombre">
            </div>
            <div class="input-field">
                <i class="fa-solid fa-lock"></i>
                <input  id="contrasena" type="password" placeholder="Contraseña"  name="contrasena">
            </div>
            <p>Olvidaste tu contraseña <a href="#">click aqui</a></p>
    
              </div>
              <div class="btn-field">
                <button  id="signIn" type="submit" class="disable">Login</button>
              </div>
    </form>
  </div>


<!--Registro -->
<div id="registerForm" class="form-container">
    <span class="close" onclick="closeForm()">&times;</span>
    <h2>Register</h2>
    <form action="">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required><br><br>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required><br><br>
      <button type="submit">Register</button>
    </form>
  </div>
  <div class="overlay" id="overlay"></div>
  
  <script>
    function showRegisterForm() {
      var registerForm = document.getElementById('registerForm');
      var loginForm = document.getElementById('loginForm');
      var overlay = document.getElementById('overlay');
      registerForm.style.display = 'block';
      loginForm.style.display = 'none'; // Ocultar formulario de login si está visible
      overlay.style.display = 'block';

    }

    // Función para mostrar el formulario de inicio de sesión
    function showLoginForm() {
      var registerForm = document.getElementById('registerForm');
      var loginForm = document.getElementById('loginForm');
      loginForm.style.display = 'block';
      registerForm.style.display = 'none'; // Ocultar formulario de registro si está visible
      overlay.style.display = 'block';
    }
    // Función para cerrar el formulario de registro
function closeForm() {
    var registerForm = document.getElementById('registerForm');
    var loginForm = document.getElementById('loginForm');
    var loginForm = document.getElementById('loginForm');
    loginForm.style.display = 'none';
    registerForm.style.display = 'none'; // Ocultar formulario de registro si está visible
    overlay.style.display = 'none';
}
  </script>



<!--TITULO -->
<div>

</div>
<header style="margin: 0px 0px 0px 0px;">
    <br><br><br><br>
    
    <hr>
    <div style="display: flex; justify-content: flex-end; align-items: center;">
        <div class="div-pelicula" style="background-image: url(imagen/potka.jpg); position: relative; ">
            <p class="titulo" style="position: absolute;margin-left: 20px; bottom: 100px;">Kingdom of the Planet of the Apes</p>
            <a href="#horario" style="position: absolute; left: 20px; bottom: 90px; padding: 10px;">Ver preventas</a>
        </div>
    </div>
</header>



<section class="margen">
<div class="container" >
    <div class="div-sinopsis">
        <h1>Créditos y reparto</h1>
        <p style="font-weight: normal;">
            Actores:    Owen Teague, Freya Allan, Kevin Durand, Peter Macon, and William H. Macy. 
            <br>
            Director: 	Wes Ball
        </p>
    </div>
    <div class="div-sinopsis" >
        <h1>Sinopsis</h1>
        <p style="font-weight: normal;">
Muchos años después del reinado de César, un joven simio emprende un viaje que 
lo llevará a cuestionar todo lo que le han enseñado sobre el pasado y a tomar decisiones que definirán el futuro tanto de los simios como de los humanos.       </p>
    </div>    
</div>

<div id="horario" class="div-horario">
<h1>Compras de Boleto</h1>
    <hr>

    <?php
// Variables para conexión a la base de datos
$db = "cinemax"; // Nombre de la BD
$host = "localhost"; // Nombre del servidor
$pw = ""; // Contraseña
$user = "root"; // Usuario

// Establecer conexión a la base de datos
$con = mysqli_connect($host, $user, $pw, $db);

if (!$con) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Asumiendo que tienes una sala con un id específico
$sala_id = 1;  // Cambia el id de la sala si es necesario

$query = "SELECT * FROM silla WHERE id_pelicula = '$sala_id' ORDER BY fila, columna";
$resultado = $con->query($query);

echo "<form action='ConnectSillas.php' method='POST'>"; // Formulario para enviar las sillas seleccionadas

if ($resultado->num_rows > 0) {
    echo "<div class='sillas'>
    <table border='1' style='width: 80%; text-align: center; font-size: 25px;'>
    <tr>
        <th style='background-color: black; color: white;'></th>
        <th style='background-color: black; color: white;'>A</th>
        <th style='background-color: black; color: white;'>B</th>
        <th style='background-color: black; color: white;'>C</th>
        <th style='background-color: black; color: white;'>D</th>
        <th style='background-color: black; color: white;'>E</th>
    </tr>";

    // Variables para organizar las filas
    $fila_actual = 'A'; // Suponiendo que las filas van de la A a la E
    $columna_actual = 1;

    // Mostrar las sillas en disposición 5x5
    $fila_num = 1;  // Contador de las filas

    while ($silla = $resultado->fetch_assoc()) {
        // Si la fila cambia, crear una nueva fila en la tabla
        if ($silla['fila'] != $fila_actual) {
            echo "</tr>";  // Cerrar la fila anterior
            $fila_actual = $silla['fila'];  // Actualizar la fila actual
            $columna_actual = 1;  // Reiniciar las columnas
            $fila_num++;  // Incrementar el número de fila
        }

        // Crear la celda para la silla
        if ($columna_actual == 1) {
            echo "<tr style='font-size: 25px;'>";  // Iniciar una nueva fila
            echo "<td style='background-color: black; color: white;'> $fila_num</td>";  // Mostrar el número de fila en la primera columna
        }

        // Mostrar el estado de la silla en cada celda
        $statusColor = ($silla['status'] == 'Disponible' ? 'green' : ($silla['status'] == 'Ocupado' ? 'red' : 'gray'));
        $isSelected = ($silla['status'] == 'Ocupado' ? 'disabled' : '');  // Si la silla está ocupada, no debe ser seleccionable

        echo "<td class='silla' id='silla_{$silla['id']}'
                style='background-color: $statusColor;'
                onclick='seleccionarSilla({$silla['id']}, \"{$silla['status']}\")'>
                <input type='checkbox' name='sillas_seleccionadas[]' value='{$silla['id']}' $isSelected>
                {$silla['status']}
              </td>";

        // Incrementar la columna actual
        $columna_actual++;

        // Si hemos llegado al final de la fila (columna 5), cerramos la fila
        if ($columna_actual > 5) {
            $columna_actual = 1;  // Reiniciar columna
        }
    }

    echo "</table><br>";
    echo "<center><input type='submit' value='Comprar boletos' class='btn-comprar'></center>";
    echo "</form>";

} else {
    echo "No hay sillas registradas en esta sala.";
}

// Cerrar conexión
$con->close();
?>

<script>
// Función para cambiar el color de la silla seleccionada
function seleccionarSilla(id, status) {
    var silla = document.getElementById('silla_' + id);
    var checkbox = silla.querySelector('input[type="checkbox"]');

    // Si la silla está ocupada, no hacer nada
    if (status === 'Ocupado') {
        alert("Esta silla está ocupada y no puede ser seleccionada.");
        return;
    }

    // Si la silla no está ocupada
    if (checkbox.checked) {
        silla.style.backgroundColor = 'green';  // Volver a disponible (verde)
    } else {
        silla.style.backgroundColor = 'yellow';  // Seleccionada (amarillo)
    }

    // Invertir el estado del checkbox
    checkbox.checked = !checkbox.checked;
}
</script>


</section>




<section  style="margin: 0px 0px 0px 0px;">
<script src="javaScript.js"></script>
<div class="contenedor-albumes" style="background-image: url(imagen/165143.jpg); width: 100%;">
    <button class="prev">❮</button>
    <div class="album-wrap" style="margin-top: 50px; width: 100%; padding-bottom: 50px; padding-top: 50px;">
        <div class="album">
            <a href="pelicula1.php"> <!-- Enlace que redirige a pelicula1.php -->
                <img src="imagen/pelicula/insideOut2.avif" alt="Película 1">
                <p>Inside Out 2</p>
            </a>
        </div>
        <div class="album">
            <a href="pelicula2.php"> <!-- Enlace que redirige a pelicula1.php -->
            <img src="imagen/pelicula/The Garfield Movie.avif" alt="Película 2">
            <p>The Garfield Movie</p>
            </a>
        </div>
        <div class="album">
            <a href="pelicula3.php"> <!-- Enlace que redirige a pelicula1.php -->
            <img src="imagen/pelicula/If.avif" alt="Película 3">
            <p>IF</p>
            </a>
        </div>
        <div class="album">
            <a href="pelicula4.php"> <!-- Enlace que redirige a pelicula1.php -->
            <img src="imagen/pelicula/BadBoy.avif" alt="Película 4">
            <p>Bad Boys: Ride or Die</p>
            </a>
        </div>
        <div class="album">
            <a href="pelicula5.php"> <!-- Enlace que redirige a pelicula1.php -->
            <img src="imagen/pelicula/Kingdom.avif" alt="Película 5">
            <p>Kingdom of the Planet of the Apes</p>
            </a>
        </div>
        <div class="album">
            <a href="pelicula6.php"> <!-- Enlace que redirige a pelicula1.php -->
            <img src="imagen/pelicula/Blue Lock.avif" alt="Película 6">
            <p>Blue Lock The Movie-Episode Nagi</p>
            </a>
        </div>
        <div class="album">
            <a href="pelicula7.php"> <!-- Enlace que redirige a pelicula1.php -->
            <img src="imagen/pelicula/The exorcism.jpg" alt="Película 7">
            <p>The Exorcism</p>
            </a>
        </div>
        <div class="album">
            <a href="pelicula8.php"> <!-- Enlace que redirige a pelicula1.php -->
            <img src="imagen/pelicula/Kinds of Kindness.avif" alt="Película 8">
            <p>Kinds of Kindness</p>
            </a>
        </div>
        <div class="album">
            <a href="pelicula9.php"> <!-- Enlace que redirige a pelicula1.php -->
            <img src="imagen/pelicula/The Watchers.avif" alt="Película 9">
            <p>The Watchers</p>
            </a>
        </div>
    </div>
    <button class="next">❯</button>
</div>

</section>


 <!--Barra inferior-->
<footer>
    <div style="background-color: black;">
        <ul>
             <li><a href="HOME.php">INICIO</a></li>
             <li><a href="Pelicula.php">PELÍCULAS</a></li>
             <li><a href="SobreNosotros.php">SOBRE NOSOTROS</a></li>  
             </ul>
        <hr>
    </div>
    
    <div style="background-color: black; display: flex; align-items: center; justify-content: center; ">
        <ul >
                <li><a href="https://www.google.com/search"><img src="imagen/icono_ins.jpg" alt="Buscar"></a></li>
                <li><a href="https://www.google.com/search"><img src="imagen/icono_facebook.jpg" alt="Buscar"></a></li>
                <li><a href="https://www.google.com/search"><img src="imagen/icono_whatsapp.jpg" alt="Buscar"></a></li>
                <li><a href="https://www.google.com/search"><img src="imagen/icono_youtube.jpg" alt="Buscar"></a></li>
                <li><a href="https://www.google.com/search"><img src="imagen/icono_tiktok.jpg" alt="Buscar"></a></li>
        </ul>
    </div>
    <div style="background-color: black;  display: flex; justify-content: flex-end; align-items: center; padding-right: 25px;">
        <img src="imagen/icono_login2.jpg" style="margin-right: 5px;"> 
        <a href="Logout.php" style="display: inline-block; margin-top: 0;">Logout</a>
    </div>

    <div class="footer-copyright">
        © 2024 Cinema X. Todos los derechos reservados. 
        El contenido de este sitio web, incluyendo imágenes, textos y gráficos, está protegido por las leyes de derechos de autor. Queda prohibida la reproducción, distribución o cualquier otro uso sin autorización previa por escrito de Cinema X.
    </div>


</footer>


</body>
</html>