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
    <title>SOBRE NOSOTROS</title>
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
<body style="background-image: url('imagen/165143.jpg');">
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


  
<!--TITULO -->
<header style="margin: 0px 0px 0px 0px;">
    <br><br><br><br>
    <p class="titulo">PELÍCULAS</p>
    <hr>   
</header>



<section>

    <select id="selectGenero" onchange="mostrarDivs()">
        <option value="todas" >Todas</option>
        <option value="animacion">Animación/Familiar</option>
        <option value="acción">Acción</option>
        <option value="drama">Drama</option>
    </select>

<!-- Divs que se mostrarán -->
 <div id="genero" class="album-container">

<div class="album-genero" name="animacion">
    <a href="pelicula1.php"> <!-- Enlace que redirige a pelicula1.php -->
        <img src="imagen/pelicula/insideOut2.avif" alt="Película 1">
        <p>Inside Out 2</p>
    </a>
</div>
<div class="album-genero" name="animacion">
    <a href="pelicula2.php"> <!-- Enlace que redirige a pelicula1.php -->
    <img src="imagen/pelicula/The Garfield Movie.avif" alt="Película 2">
    <p>The Garfield Movie</p>
    </a>
</div>
<div class="album-genero" name="animacion">
    <a href="pelicula3.php"> <!-- Enlace que redirige a pelicula1.php -->
    <img src="imagen/pelicula/If.avif" alt="Película 3">
    <p>IF</p>
    </a>
</div>
<div class="album-genero" name="acción">
    <a href="pelicula4.php"> <!-- Enlace que redirige a pelicula1.php -->
    <img src="imagen/pelicula/BadBoy.avif" alt="Película 4">
    <p>Bad Boys: Ride or Die</p>
    </a>
</div>
<div class="album-genero" name="drama">
    <a href="pelicula5.php"> <!-- Enlace que redirige a pelicula1.php -->
    <img src="imagen/pelicula/Kingdom.avif" alt="Película 5">
    <p>Kingdom of the Planet of the Apes</p>
    </a>
</div>
<div class="album-genero" name="drama">
    <a href="pelicula6.php"> <!-- Enlace que redirige a pelicula1.php -->
    <img src="imagen/pelicula/Blue Lock.avif" alt="Película 6">
    <p>Blue Lock The Movie-Episode Nagi</p>
    </a>
</div>
<div class="album-genero" name="drama">
    <a href="pelicula7.php"> <!-- Enlace que redirige a pelicula1.php -->
    <img src="imagen/pelicula/The exorcism.jpg" alt="Película 7">
    <p>The Exorcism</p>
    </a>
</div>
<div class="album-genero" name="drama">
    <a href="pelicula8.php"> <!-- Enlace que redirige a pelicula1.php -->
    <img src="imagen/pelicula/Kinds of Kindness.avif" alt="Película 8">
    <p>Kinds of Kindness</p>
    </a>
</div>
<div class="album-genero" name="drama">
    <a href="pelicula9.php"> <!-- Enlace que redirige a pelicula1.php -->
    <img src="imagen/pelicula/The Watchers.avif" alt="Película 9">
    <p>The Watchers</p>
    </a>
</div>
</div>
<script>
    function mostrarDivs() {
      var select = document.getElementById("selectGenero");
      var generoSeleccionado = select.value;
      
      var todosLosGeneros = document.querySelectorAll('.album-genero');
      todosLosGeneros.forEach(function(div) {
        if (generoSeleccionado === "todas" || div.getAttribute('name') === generoSeleccionado) {
          div.style.display = 'block'; // Mostrar el género seleccionado
        } else {
          div.style.display = 'none'; // Ocultar otros géneros
        }
      });
    }
  </script>


</section>

 <!--Barra inferior-->
<footer>
    <div style="background-color: black;">
        <ul>
             <li><a href="HOME.php">INICIO</a></li>
             <li><a href="Pelicula.php">PELÍCULAS</a></li>
             <li><a href="SobreNosotros.php">SOBRE NOSOTROS</a></li>  
             <?php if ($tipo === 'empleado'): ?>
                <li><a href="Registro_pelicula.php">REGISTRO PELÍCULAS</a></li>
                <?php endif; ?>
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