<?php
$conexion = mysqli_connect("localhost", "root", "", "crud");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT ID, Nombre, Descripcion, PrecioPublico, PrecioMayoreo, Costo FROM Productos";
$result = mysqli_query($conexion, $sql);

//echo '<h1> Lista de Productos a la venta </h1>';
echo '<h1> Lista de productos a la venta </h1>';

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="contenedor-productos">'; // Contenedor principal
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="producto">';
            echo '<h2>' . $row['Nombre'] . '</h2>';
            echo '<p>' . $row['Descripcion'] . '</p>';
            echo '<p>Precio público: $' . number_format($row['PrecioPublico'], 2) . '</p>';
            echo '<p>Precio mayoreo: $' . number_format($row['PrecioMayoreo'], 2) . '</p>';
            echo '<p>Costo: $' . number_format($row['Costo'], 2) . '</p>';
            echo '<a href="Editar.php?id=' . $row['ID'] . '"><button onclick="editar(' . $row['ID'] . ')">Editar</button></a>';
            echo '<a href="Eliminar.php?id=' . $row['ID'] . '"><button onclick="eliminar(' . $row['ID'] . ')">Eliminar</button></a>';
            echo '</div>';
        }
echo '</div>'; // Cierra el contenedor principal

    } else {
        echo "No hay productos disponibles.";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
