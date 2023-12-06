<?php
$conexion = mysqli_connect("localhost", "root", "", "crud");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precioPublico = $_POST["precioPublico"];
    $precioMayoreo = $_POST["precioMayoreo"];
    $costo = $_POST["costo"];

    $insertarSql = "INSERT INTO Productos (Nombre, Descripcion, PrecioPublico, PrecioMayoreo, Costo)
                    VALUES ('$nombre', '$descripcion', $precioPublico, $precioMayoreo, $costo)";

    $insertarResult = mysqli_query($conexion, $insertarSql);

    if ($insertarResult) {
        $idNuevoProducto = mysqli_insert_id($conexion); // Obtiene el ID del nuevo producto
        echo "Producto agregado correctamente. Nuevo ID: $idNuevoProducto";

        echo "<br>Redireccionando a la página principal...";
        header("refresh:3;url=index.php"); 
    } else {
        echo "Error al agregar el producto: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h2>Nuevo Producto</h2>

<form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <label for="descripcion">Descripción:</label>
    <input type="text" name="descripcion" required>

    <label for="precioPublico">Precio público:</label>
    <input type="text" name="precioPublico" required>

    <label for="precioMayoreo">Precio mayoreo:</label>
    <input type="text" name="precioMayoreo" required>

    <label for="costo">Costo:</label>
    <input type="text" name="costo" required>

    <input type="submit" value="Agregar Producto">
</form>

</body>
</html>
