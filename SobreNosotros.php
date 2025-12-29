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
    <p class="titulo">SOBRE NOSOTROS</p>
    <hr>
</header>

<section>

   <div class="nosotros-container" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">

    <!--Javier Cuello -->
    <div class="left-side2" >
        <h2>JAVIER CUELLO</h2>
        <img src="imagen/Estudiante/Javier Cuello.jpg" style="width: 250px; height: 300px; object-fit: cover; object-position: center;">
        <ul style="margin-left: 0;">
            <li><p><span>Cédula:</span> 20-70-6032 </p></li>
            <li><p><span>Carrera: </span>ingeniería de Software  </p></li>
            <li><p><span>Resumen: </span>La aplicación de la lógica y el pensamiento crucial a la hora de tomar decisiones e importar 
                las mismas como instrucciones para su procesamiento ponderan como un factor importante el desarrollo
                 de uno mismo, siendo así diría que mi experiencia como desarrollador no solo complementa mi habilidades
                  como programador sino como pensador critico y para la toma de decisiones, la evaluación de aspectos y 
                  aplicaciones prácticas. </p></li>
        </ul>
    </div>

    <!--Luis Mo -->
    <div class="right-side2">
        <h2>LUIS MO</h2>
        <img src="imagen/Estudiante/Luis Mo.jpg" style="width: 250px; height: 300px; object-fit: cover; object-position: center;">
        <ul style="margin-left: 0;">
            <li><p><span>Cédula:</span> 3-752-562 </p></li>
            <li><p><span>Carrera: </span>ingeniería de Software  </p></li>
            <li><p><span>Resumen: </span>Como estudiante de Ingeniería de Software, mi experiencia como desarrollador 
                ha sido fundamental no solo para mejorar mis habilidades de programación, sino también para fortalecer
                 mi capacidad de pensamiento crítico y toma de decisiones. La aplicación de la lógica y el pensamiento 
                 crítico al tomar decisiones y traducirlas en instrucciones procesables es un aspecto crucial en mi desarrollo
                  personal y profesional. He trabajado en diversos proyectos que requieren evaluar aspectos prácticos y aplicar
                   soluciones innovadoras, lo que me ha permitido crecer tanto en el ámbito técnico como en la toma de decisiones 
                   informadas. </p></li>
        </ul>
    </div>

    <!--José Herazo -->
    <div class="right-side2">
        <h2>JOSÉ HERAZO</h2>
        <img src="imagen/Estudiante/Jose Herazo.jpg" style="width: 250px; height: 300px; object-fit: cover; object-position: center;">
        <ul style="margin-left: 0;">
            <li><p><span>Cédula:</span> 8-986-2492</p></li>
            <li><p><span>Carrera: </span>ingeniería de Software  </p></li>
            <li><p><span>Resumen: </span>Mi nombre es Jose Raul Herazo. Tengo conocimientos en dos lenguajes de
programación: C++ y Java. También sé un poco de JavaScript y HTML. Mis aspiraciones en este curso es aprender cómo
hhacer software en el cual cualquier persona pueda entender y usar lo que hago. Me gusta cocinar, leer, hacer ejercicio y
conocer nuevas personas. </p></li>
        </ul>
    </div>

    <!--Carlos Zhong -->
    <div class="left-side2">
        <h2>CHRISTOPHER CHAVARRÍA</h2>
        <img src="imagen/Estudiante/Christopher Chavarria.jpg" style="width: 250px; height: 300px; object-fit: cover; object-position: center;">
        <ul style="margin-left: 0;">
            <li><p><span>Cédula:</span> 8-1002-376 </p></li>
            <li><p><span>Carrera: </span>ingeniería de Software  </p></li>
            <li><p><span>Resumen: </span>Me llamo Christopher Chavarria y tengo 21 años.
             Soy estudiante de la carrera de ingeniería de software.
              Actualmente me he interesado por la programación web y el uso de tecnologías como PHP, C# .NET,
               Tailwind CSS y JS React. Aparte, estoy aprendiendo igualmente Unity como hobbie en la creación de juegos. 
               Me gusta mucho el front-end y el diseño</p></li>
        </ul>
    </div>

    <!--Esteban Ariza -->
    <div class="right-side2">
        <h2>MARY GUARDIA</h2>
        <img src="imagen/Estudiante/Mary Guardia.jpg" style="width: 250px; height: 300px; object-fit: cover; object-position: center;">
        <ul style="margin-left: 0;">
            <li><p><span>Cédula:</span> 8-1000-1974</p></li>
            <li><p><span>Carrera: </span>ingeniería de Software  </p></li>
            <li><p><span>Resumen: </span>Soy Mary Jane Guardia (8-1000-1974), me ha gustado mucho trabajar con
             PHP ya que es flexible y se integra rápidamente al HTML de una manera más dinámica de 
             la mano de un buen CSS. Estos conocimientos me permiten crear páginas web funcionales, 
             interactivas y bien diseñadas.
    </div>

</div>

    
<br>        
<br>






  

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