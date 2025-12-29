<?php
ob_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

        try {

          
                // Capturar datos del formulario de cliente
                $nombre_p = $_POST['nombre_p'];
                $fecha = $_POST['fecha'];
                $genero = $_POST['genero'];

                // Consulta SQL
                $sql = "INSERT INTO peliculas (nombre_p, fecha, genero) 
                        VALUES ('$nombre_p', '$fecha', '$genero')";

if ($con->query($sql) === TRUE) {
    header("Location: Registro_pelicula.php");
    exit();
    ob_end_flush();
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


          


        }
         catch (Exception $e) {
            echo "Registro fallido: " . $e->getMessage();
        }

        // Cerrar la conexión
        mysqli_close($con);
   
    }
?>

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
    <title>CINEMAX-REGISTRO</title>
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
                                <a href="Logout.php" style="display: inline-block; margin-top: 0;">Logout</a>
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
    <p class="titulo">REGISTROS PELÍCULAS</p>
    <hr>
</header>



<section class="margen">
    <div> 
        <form action="Registro_pelicula.php" method="post" class="form-registro">
            <div class="form-group">
                <label for="nombre_p">Nombre de Pelicula:</label>
                <input type="text" id="nombre_p" name="nombre_p" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha estreno:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" required>
            </div>
            <div class="form-group">
                <button type="submit">Registrar</button>
            </div>
        </form>


    </div>


    <div class="historial-boletos">
        <h3>REGISTRO DE PELICULAS</h3>
        

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

    $query = "SELECT * FROM peliculas";
    $resultado = $con->query($query);
    if ($resultado->num_rows > 0) {
        echo "<div class='boleto-h'>
        <table border='1' style='width: 100%;'>
                <tr>
                    <th style='background-color: black;'>ID Peliculas</th>
                    <th style='background-color: black;'>Nombre</th>
                    <th style='background-color: black;'>Fecha</th>
                    <th style='background-color: black;'>Genero</th>
                </tr>";
        while ($registro_peliculas = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$registro_peliculas['id']}</td>
                    <td>{$registro_peliculas['nombre_p']}</td>
                    <td>{$registro_peliculas['fecha']}</td>
                    <td>{$registro_peliculas['genero']}</td>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const clientRadio = document.getElementById('client');
        const employeeRadio = document.getElementById('employee');
        const divCliente = document.getElementById('div-cliente');
        const divEmpleado = document.getElementById('div-empleado');

        function toggleDivs() {
            if (clientRadio.checked) {
                divCliente.style.display = 'block';
                divEmpleado.style.display = 'none';
            } else if (employeeRadio.checked) {
                divCliente.style.display = 'none';
                divEmpleado.style.display = 'block';
            }
        }

        // Agregar eventos de cambio a los radio buttons
        clientRadio.addEventListener('change', toggleDivs);
        employeeRadio.addEventListener('change', toggleDivs);

        // Inicialmente mostrar empleado
        divCliente.style.display = 'none';
        divEmpleado.style.display = 'block';
    });
</script>

 <!--Barra inferior-->
<footer>
    <div style="background-color: black;">
        <ul>
             <li><a href="HOME.php">INICIO</a></li>
             <li><a href="Pelicula.php">PELÍCULAS</a></li>
             <li><a href="CONTACTO.php">COTÁCTANOS</a></li>  
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