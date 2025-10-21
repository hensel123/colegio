<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "escuela");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener todos los registros
$sql = "SELECT * FROM alumnos";
$resultado = $conexion->query($sql);

// Mostrar los datos en una tabla HTML con estilo
echo "<h2 style='text-align:center; color:#007BFF;'>Listado de Alumnos</h2>";

if ($resultado->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; width: 100%;'>";
    
    // Encabezado con color
    echo "<tr style='background-color:#007BFF; color:white; text-align:center;'>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Promedio</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Ciudad</th>
          </tr>";

    // Filas alternadas con color
    $color_fila = "#f2f2f2"; // Color inicial
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr style='background-color: $color_fila; text-align:center;'>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["apellido"] . "</td>";
        echo "<td>" . $fila["promedio"] . "</td>";
        echo "<td>" . $fila["correo"] . "</td>";
        echo "<td>" . $fila["telefono"] . "</td>";
        echo "<td>" . $fila["fecha_nacimiento"] . "</td>";
        echo "<td>" . $fila["ciudad"] . "</td>";
        echo "</tr>";
        
        // Cambiar color de fila para efecto alternado
        $color_fila = ($color_fila == "#f2f2f2") ? "#ffffff" : "#f2f2f2";
    }

    echo "</table>";
} else {
    echo "<p style='color:red; text-align:center;'>No hay registros en la tabla.</p>";
}

// Cerrar conexión
$conexion->close();
?>
