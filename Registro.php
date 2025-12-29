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

            if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
                // Capturar datos del formulario de cliente
                $cedula_c = $_POST['cedula'];
                $nombre_c = $_POST['nombre'];
                $apellido_c = $_POST['apellido'];
                $contrasena = $_POST['contrasena'];
                $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $provincia_c = $_POST['provincia'];
                $distrito_c = $_POST['distrito'];
                $corregimiento_c = $_POST['corregimiento'];
                $correo_c = $_POST['correo'];
                $tel_c = $_POST['celular'];

                // Consulta SQL
                $sql = "INSERT INTO cliente (cedula_c, nombre_c, apellido_c, contrasena_c, provincia_c, distrito_c, corregimiento_c, correo_c, tel_c) 
                        VALUES ('$cedula_c', '$nombre_c', '$apellido_c', '$contrasena_hash', '$provincia_c', '$distrito_c', '$corregimiento_c', '$correo_c', '$tel_c')";

if ($con->query($sql) === TRUE) {
    header("Location: Login.php");
    exit();
    ob_end_flush();
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}

          
            if (isset($_POST['nombre_e']) && !empty($_POST['nombre_e'])) {
                // Capturar datos del formulario de empleado
                $cedula_e = $_POST['cedula_e'];
                $nombre_e = $_POST['nombre_e'];
                $apellido_e = $_POST['apellido_e'];
                $contrasena_e = $_POST['contrasena_e'];
                $contrasena_ehash = password_hash($contrasena_e, PASSWORD_DEFAULT);
                $tel_e = $_POST['tel_e'];
                $cod_cargo = $_POST['cod_cargo'];
                $id_suc = $_POST['id_suc'];

                // Consulta SQL
                $sql = "INSERT INTO Empleado (cedula_e, nombre_e, apellido_e, contrasena_e, tel_e, cod_cargo, id_suc) 
                        VALUES ('$cedula_e', '$nombre_e', '$apellido_e', '$contrasena_e', '$tel_e', '$cod_cargo', '$id_suc')";

                if ($con->query($sql) === TRUE) {
                    header("Location: Login.php");
                    exit(); 
                    ob_end_flush();
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
           
        }


        }
         catch (Exception $e) {
            echo "Registro fallido: " . $e->getMessage();
        }

        // Cerrar la conexión
        mysqli_close($con);
   
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
                <li>
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
                        <div >
                            <a href="Login.php" style="font-size: 20px;">Login</a>
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
    <p class="titulo">REGISTROS</p>
    <hr>
</header>



<section class="margen">
    <div> 
        <div class="form-group" style="margin-left: 60px;">
            <label for="userType" name="userTypeL">Soy:</label>
            <input type="radio" id="client" name="userType" value="client" checked>
            <label for="client" name="userType">Cliente</label>
        </div>
        
            <div id="div-cliente">
                <form action="Registro.php" class="form-registro" method="POST" name="form_registro_cliente">
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" id="cedula_c" name="cedula" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre_c" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido_c" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="apellido">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <label for="Provincia">Provincia:</label>
                <input type="text" id="provincia_c" name="provincia" required>
            </div>
            <div class="form-group">
                <label for="Distrito">Distrito:</label>
                <input type="text" id="distrito_c" name="distrito" required>
            </div>
            <div class="form-group">
                <label for="Corregimiento">Corregimiento:</label>
                <input type="text" id="corregimiento_c" name="corregimiento" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo_c" name="correo" required>
            </div>
            <div class="form-group">
                <label for="celular">Número de Celular:</label>
                <input type="tel" id="celular_c" name="celular" required>
            </div>
            <div class="form-group">
                <button type="submit">Registrar</button>
            </div>

        </form>
        </div id="div-cliente">
    
  

        </form>
    </div>



    </div>
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
             <li><a href="HOME.html">INICIO</a></li>
             <li><a href="Pelicula.html">PELÍCULAS</a></li>
             <li><a href="CONTACTO.html">COTÁCTANOS</a></li>  
             
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
    </div>

    <div class="footer-copyright">
        © 2024 Cinema X. Todos los derechos reservados. 
        El contenido de este sitio web, incluyendo imágenes, textos y gráficos, está protegido por las leyes de derechos de autor. Queda prohibida la reproducción, distribución o cualquier otro uso sin autorización previa por escrito de Cinema X.
    </div>


</footer>


</body>
</html>

