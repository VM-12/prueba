
<?php
$conexion = mysqli_connect("localhost", "root", "", "crud");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $verificacionSql = "SELECT ID FROM Productos WHERE ID = $id";
    $verificacionResult = mysqli_query($conexion, $verificacionSql);

    if ($verificacionResult && mysqli_num_rows($verificacionResult) > 0) {
        $eliminarSql = "DELETE FROM Productos WHERE ID = $id";
        $eliminarResult = mysqli_query($conexion, $eliminarSql);

        if ($eliminarResult) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al eliminar el producto: " . mysqli_error($conexion);
        }
    } else {
        echo "El producto no existe.";
    }

    
    echo "<br>Redireccionando a la página principal...";
    header("refresh:3;url=index.php"); 
    exit();
} else {
    echo "Parámetros de solicitud incorrectos.";
    exit();
}

mysqli_close($conexion);
?>
