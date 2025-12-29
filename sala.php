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

$query = "SELECT * FROM silla WHERE id_sala = '$sala_id' ORDER BY fila, columna";
$resultado = $con->query($query);

echo "<form action='ConnectSillas.php' method='POST'>"; // Formulario para enviar las sillas seleccionadas

if ($resultado->num_rows > 0) {
    echo "<div class='sillas'>
    <table border='1' style='width: 80%; text-align: center;'>
    <tr>
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
    while ($silla = $resultado->fetch_assoc()) {
        // Si la fila cambia, crear una nueva fila en la tabla
        if ($silla['fila'] != $fila_actual) {
            echo "</tr>";  // Cerrar la fila anterior
            $fila_actual = $silla['fila'];  // Actualizar la fila actual
            $columna_actual = 1;  // Reiniciar las columnas
        }

        // Crear la celda para la silla
        if ($columna_actual == 1) {
            echo "<tr>";  // Iniciar una nueva fila
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
    echo "<input type='submit' value='Confirmar selección de sillas'>";
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

<style>
/* Ajustar estilo para celdas de las sillas */
.silla {
    cursor: pointer;
    padding: 2px; /* Reducir espacio interno */
    text-align: center;
    width: 20px; /* Reducir ancho de la celda */
    height: 20px; /* Reducir alto de la celda */
    font-weight: bold;
    font-size: 10px; /* Reducir tamaño del texto */
    overflow: hidden; /* Evitar que el contenido desborde */
    white-space: nowrap; /* Evitar que el texto se divida en varias líneas */
}

/* Cambiar el color al pasar el mouse */
.silla:hover {
    opacity: 0.8;
}

/* Ajustar la tabla */
table {
    border-collapse: collapse; /* Eliminar espacio entre bordes */
    margin: auto; /* Centrar la tabla */
}

/* Bordes más finos para las celdas */
table td {
    border: 1px solid black; /* Bordes visibles pero delgados */
}

</style>
