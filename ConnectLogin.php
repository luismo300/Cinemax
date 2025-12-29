<?php
// Inicia la sesión
session_start();
date_default_timezone_set('America/Panama');


$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

try {
    // Conexión a la base de datos
    $con = mysqli_connect("localhost", "root", "", "cinemax");

    if (!$con) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }

    //SQL
    $sql = "SELECT * FROM cliente WHERE correo_c = ? ";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $correo,);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificamos si hay algún resultado
    if ($result->num_rows > 0) {
        // Obtenemos los datos del usuario
        $user = $result->fetch_assoc();
        $hashAlmacenado = $user['contrasena_c'];

        if (password_verify($contrasena, $hashAlmacenado)) {
        // Sesion
        $_SESSION['usuario'] = $user['nombre_c']; 
        $_SESSION['id'] = $user['id']; 
        $_SESSION['tipo'] = 'cliente';

        //  cookie
        $fecha_hora = date('Y-m-d H:i:s'); // Formato de fecha y hora
        setcookie("ultimo_acceso", $fecha_hora, time() + 3600 * 24 * 30, "/"); // La cookie expira en 30 días

        // Redirige
        header("Location: HOME.php");
        exit();
        } 


    } 
    
    if (strpos($correo, '@cinemax') !== false) {
    $sql_emp = "SELECT * FROM empleado WHERE correo = ? AND contrasena_e = ?";
    $stmt_emp = $con->prepare($sql_emp);
    $stmt_emp->bind_param("ss", $correo, $contrasena);
    $stmt_emp->execute();
    $result_emp = $stmt_emp->get_result();

    // Verificamos si hay algún resultado
    if ($result_emp->num_rows > 0) {
        // Obtenemos los datos del usuario
        $user = $result_emp->fetch_assoc();
        // Sesion
        $_SESSION['usuario'] = $user['nombre_e']; 
        $_SESSION['id'] = $user['id']; 
        $_SESSION['tipo'] = 'empleado';

        //  cookie
        $fecha_hora = date('Y-m-d H:i:s'); // Formato de fecha y hora
        setcookie("ultimo_acceso", $fecha_hora, time() + 3600 * 24 * 30, "/"); // La cookie expira en 30 días

        // Redirige
        header("Location: HOME.php");
        exit();
    } 

}
    

        $_SESSION['error'] = 'Datos incorrectos'; // Almacena el mensaje en la sesión
        header("Location: Login.php"); // Redirige al login
        exit();


    // Cerramos la conexión
    $stmt->close();
    $con->close();
} catch (Exception $e) {
    // Manejamos errores de conexión
    echo "Error en el proceso de autenticación: " . $e->getMessage();
}
?>
