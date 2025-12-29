<?php
// Inicia la sesión
session_start();
date_default_timezone_set('America/Panama');

// Obtener datos del formulario
$contrasena = $_POST['contrasena'];
$cedula = $_POST['cedula'];
$id = $_POST['id'];
$new_contrasena = $_POST['new_contrasena'];
$contrasena_hash = password_hash($new_contrasena, PASSWORD_DEFAULT);

try {
    // Conexión a la base de datos
    $con = new mysqli("localhost", "root", "", "cinemax");

    if ($con->connect_error) {
        die("Error en la conexión a la base de datos: " . $con->connect_error);
    }

    // Verificar si las contraseñas coinciden
    if ($contrasena !== $new_contrasena) {
        $_SESSION['error'] = 'Las contraseñas no coinciden.';
        header("Location: OlvidoPassword.php");
        exit();
    }

    // Verificar si la cédula existe en cliente
    $sql_check_cliente = "SELECT * FROM cliente WHERE id = ? AND cedula_c = ?";
    $stmt_cliente = $con->prepare($sql_check_cliente);
    $stmt_cliente->bind_param("ss", $id, $cedula);
    $stmt_cliente->execute();
    $result_cliente = $stmt_cliente->get_result();

    // Verificar si la cédula existe en empleado
    $sql_check_empleado = "SELECT * FROM empleado WHERE id = ? AND cedula_e = ?";
    $stmt_empleado = $con->prepare($sql_check_empleado);
    $stmt_empleado->bind_param("ss", $id, $cedula);
    $stmt_empleado->execute();
    $result_empleado = $stmt_empleado->get_result();

    if ($result_cliente->num_rows > 0) {
        // Actualizar la contraseña en cliente
        $sql_update_cliente = "UPDATE cliente SET contrasena_c = ? WHERE id = ? AND cedula_c = ?";
        $stmt_update_cliente = $con->prepare($sql_update_cliente);
        $stmt_update_cliente->bind_param("sss", $contrasena_hash, $id, $cedula);
        if ($stmt_update_cliente->execute()) {
            $_SESSION['success'] = 'Contraseña actualizada con éxito.';
            header("Location: Login.php");
            exit();
        } else {
            $_SESSION['error'] = 'Hubo un problema al actualizar la contraseña del cliente.';
            header("Location: OlvidoPassword.php");
            exit();
        }
    } elseif ($result_empleado->num_rows > 0) {
        // Actualizar la contraseña en empleado
        $sql_update_empleado = "UPDATE empleado SET contrasena_e = ? WHERE id = ? AND cedula_e = ?";
        $stmt_update_empleado = $con->prepare($sql_update_empleado);
        $stmt_update_empleado->bind_param("sss", $new_contrasena, $id, $cedula);
        if ($stmt_update_empleado->execute()) {
            $_SESSION['success'] = 'Contraseña actualizada con éxito.';
            header("Location: Login.php");
            exit();
        } else {
            $_SESSION['error'] = 'Hubo un problema al actualizar la contraseña del empleado.';
            header("Location: OlvidoPassword.php");
            exit();
        }
    } else {
        // Si no existe ni en cliente ni en empleado
        $_SESSION['error'] = 'La cédula no existe en nuestros registros.';
        header("Location: OlvidoPassword.php");
        exit();
    }

    // Cerrar conexiones
    $stmt_cliente->close();
    $stmt_empleado->close();
    $con->close();
} catch (Exception $e) {
    echo "Error en el proceso de actualización: " . $e->getMessage();
}
?>
