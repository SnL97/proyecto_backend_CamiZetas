<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" type="text/css" href="./CSS/nuevoProducto_Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
    <div class="contenedorFondoh2">
        <h2>Agregar Producto</h2>
    </div>
    <form method="post" action="./agregar_producto.php" enctype="multipart/form-data">
        <label for="producto_nuevo">Nombre del producto: </label><input type="text" id="nuevo_nombreProducto" name="nuevo_nombreProducto" autocomplete="off" required><i class="las la-tshirt"></i>
        <label for="marca_nueva">Marca: </label><input type="text" id="nueva_marcaProducto" name="nueva_marcaProducto" autocomplete="off" required><i class="las la-tag"></i>
        <label for="precio_nuevo">Precio: </label><input type="text" id="nuevo_precioProducto" name="nuevo_precioProducto" autocomplete="off" required><i class="las la-dollar-sign"></i>
        <label>Imagen:</label><input type="file" id="imagen_producto" name="imagen_producto"><i class="las la-image"></i>
        <button>Agregar</button>
        <a class="volverListaProducto" href="../Productos/productos.php">⬅ Volver a Productos</a>
    </form>
</body>
</html>