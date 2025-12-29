<?php
header('Content-Type: application/json'); // Asegúrate de que la respuesta sea en formato JSON

session_start();
$usuario = $_SESSION['usuario'];
$id = $_SESSION['id']; 
$tipo = $_SESSION['tipo'];

if (!isset($id)) {
    echo json_encode(["error" => "Usuario no autenticado"]);
    exit;
}

// Conexión a la base de datos
$db = "cinemax";
$host = "localhost";
$pw = "";
$user = "root";

$con = mysqli_connect($host, $user, $pw, $db);

if (!$con) {
    echo json_encode(["error" => "Error en la conexión a la base de datos"]);
    exit;
}

$query = "SELECT * FROM boletos WHERE cliente_id='$id'";
$resultado = $con->query($query);

$boletos = [];
if ($resultado->num_rows > 0) {
    while ($boleto = $resultado->fetch_assoc()) {
        $boletos[] = $boleto;
    }
}

$con->close();

// Retorna los boletos en formato JSON
echo json_encode(["boletos" => $boletos]);
?>
