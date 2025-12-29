<?php
session_start();
date_default_timezone_set('America/Panama');
$id = $_SESSION['id']; 
$id_pelicula1= 1; 
$id_pelicula2= 2; 

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


// Verificar si se enviaron sillas seleccionadas
if (isset($_POST['sillas_seleccionadas'])) {
    // Obtener las sillas seleccionadas
    $sillas_seleccionadas = $_POST['sillas_seleccionadas'];

    // Actualizar el estado de las sillas seleccionadas como 'Ocupado'
    foreach ($sillas_seleccionadas as $silla_id) {
        $query = "UPDATE silla SET status = 'Ocupado' WHERE id = '$silla_id'";
        $fecha_actual = date('Y-m-d');
        if ($silla_id >= 1 && $silla_id <= 25) {
            $pelicula = 'Inside Out';
        } elseif ($silla_id >= 26 && $silla_id <= 50) {
            $pelicula = 'The Garfield Movie';
        } 
        $query2 = "INSERT INTO boletos (pelicula, fecha, cliente_id, asiento, precio) 
          VALUES ('$pelicula', '$fecha_actual', '$id', '$silla_id', 7.00)";
        if ($con->query($query) === TRUE && $con->query($query2) === TRUE) {

        } else {
            echo "Error al actualizar la silla $silla_id: " . $con->error . "<br>";
        }
    }
    header("Location: HOME.php");
    exit();


} else {
    echo "No se seleccionaron sillas.";
}

// Cerrar la conexión
$con->close();
?>
