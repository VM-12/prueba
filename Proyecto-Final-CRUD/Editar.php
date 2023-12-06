<?php
$conexion = mysqli_connect("localhost", "root", "", "crud");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT ID, Nombre, Descripcion, PrecioPublico, PrecioMayoreo, Costo FROM Productos WHERE ID = $id";
    $result = mysqli_query($conexion, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $producto = mysqli_fetch_assoc($result);
        } else {
            echo "No se encontró el producto.";
            exit();
        }
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
        exit();
    }
} else {
    echo "Parámetros de solicitud incorrectos.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["idProducto"];
    $nuevoNombre = $_POST["nuevoNombre"];
    $nuevaDescripcion = $_POST["nuevaDescripcion"];
    $nuevoPrecioPublico = $_POST["nuevoPrecioPublico"];
    $nuevoPrecioMayoreo = $_POST["nuevoPrecioMayoreo"];
    $nuevoCosto = $_POST["nuevoCosto"];

    $updateSql = "UPDATE Productos SET Nombre = '$nuevoNombre', Descripcion = '$nuevaDescripcion', 
                  PrecioPublico = $nuevoPrecioPublico, PrecioMayoreo = $nuevoPrecioMayoreo, 
                  Costo = $nuevoCosto WHERE ID = $id";

    $updateResult = mysqli_query($conexion, $updateSql);

    if ($updateResult) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conexion);
    }

    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h2>Editar Producto</h2>

<form method="post">
    <label for="nuevoNombre">Nombre:</label>
    <input type="text" name="nuevoNombre" value="<?php echo $producto['Nombre']; ?>" required>

    <label for="nuevaDescripcion">Descripción:</label>
    <input type="text" name="nuevaDescripcion" value="<?php echo $producto['Descripcion']; ?>" required>

    <label for="nuevoPrecioPublico">Precio público:</label>
    <input type="text" name="nuevoPrecioPublico" value="<?php echo $producto['PrecioPublico']; ?>" required>

    <label for="nuevoPrecioMayoreo">Precio mayoreo:</label>
    <input type="text" name="nuevoPrecioMayoreo" value="<?php echo $producto['PrecioMayoreo']; ?>" required>

    <label for="nuevoCosto">Costo:</label>
    <input type="text" name="nuevoCosto" value="<?php echo $producto['Costo']; ?>" required>

    <input type="hidden" name="idProducto" value="<?php echo $producto['ID']; ?>"> 

    <input type="submit" value="Guardar cambios">
</form>

</body>
</html>

<?php
mysqli_close($conexion);
?>
