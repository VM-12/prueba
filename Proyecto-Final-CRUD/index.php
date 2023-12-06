<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Supermercado Online BY VM</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header >
        <h1>Market Fresh</h1>
        <h2>Bodega</h2>
    </header>
    

    <div class="navigation">
        <a href="#">Inicio</a>
        <a href="nuevoProducto.php"> Agregar Productos</a>
        <a href="#">Carrito</a>
        <a href="#">Iniciar Sesión</a>
    </div>
    
    

    <section class="container">
        <div id="productos-container">
            <?php include('obtener-datos.php'); ?>
        </div>

    </section>



    

    <footer>
        <p>&copy; Proyecto Final Programacion de redes grupo IRD-42. By VictorGonzalez</p>
    </footer>
</body>

</html>
