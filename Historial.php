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
    <title>CinemaX-Mi historial</title>
    <link rel="stylesheet" href="Estilo.css">
    <link rel="icon" href="imagen/logo.jfif" type="image/x-icon">


<!--Link de fuentes de letra -->

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
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
    <p class="titulo">Mi historial</p>
    <hr>
    <script src="javaScript.js"></script>
    
</header>



<section>

    <div class="historial-boletos">
        <h3>Historial de Boletos Comprados</h3>
        

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

    $query = "SELECT * FROM boletos WHERE cliente_id='$id'";
    $resultado = $con->query($query);
    if ($resultado->num_rows > 0) {
        echo "<div class='boleto-h'>
        <table border='1' style='width: 100%;'>
                <tr>
                    <th style='background-color: black;'>ID Boleto</th>
                    <th style='background-color: black;'>Película</th>
                    <th style='background-color: black;'>Fecha</th>
                    <th style='background-color: black;'>Asiento</th>
                    <th style='background-color: black;'>Precio</th>
                </tr>";
        while ($boleto = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$boleto['id_boleto']}</td>
                    <td>{$boleto['pelicula']}</td>
                    <td>{$boleto['fecha']}</td>
                    <td>{$boleto['asiento']}</td>
                    <td>{$boleto['precio']}</td>
                  </tr>";
        }
        echo "</table></div>";
    } else {
        echo "No hay boletos registrados.";
    }
    

    // Cerrar conexión
    $con->close();
    ?>




</section>

 <!--Barra inferior-->
<footer>
    <div style="background-color: black;">
        <ul>
             <li><a href="HOME.php">INICIO</a></li>
             <li><a href="Pelicula.php">PELÍCULAS</a></li>
             <li><a href="SobreNosotros.php">SOBRE NOSOTROS</a></li>  
             <li><a href="Historial_api.php">API</a></li>  
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