<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" type="text/css" href="./CSS/editarProducto_Style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
    <div class="contenedorFondoh2">
        <h2>Editar Producto</h2>
    </div>
    <?php
        $producto = array();

        if(isset($_GET["id"])){
            $id_producto = $_GET["id"];
            //todo bien, puedo seguir con el proceso!
            if(!empty($id_producto)){
                //todo bien, puedo seguir con el proceso!
                $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_backend");
    
                $query = "SELECT * FROM productos WHERE id_producto = ".$id_producto;
                $resultado = mysqli_query($conexion, $query);
    
                $producto = mysqli_fetch_assoc($resultado);
    
                mysqli_close($conexion);
            }
        }
    ?>

    <form method="post" action="./editar_producto.php" enctype="multipart/form-data">
    <label for="id_producto"></label><input type="hidden" id="id_producto" name="id_producto" value="<?php echo ((isset($producto["id_producto"])) ? ($producto["id_producto"]) : ("")) ?>">
    <label for="editar_producto">Nombre del producto: </label><input type="text" name="editar_nombreProducto" autocomplete="off" value="<?php echo ((isset($producto["nombre_producto"])) ? ($producto["nombre_producto"]) : (""));?>"><i class="las la-tshirt"></i>
    <label for="editar_marca">Marca: </label><input type="text" id="editar_marcaProducto" name="editar_marcaProducto" autocomplete="off" value="<?php echo ((isset($producto["marca_producto"])) ? ($producto["marca_producto"]) : (""));?>"><i class="las la-tag"></i>
    <label for="editar_precio" class="editar_precio">Precio: </label><input type="text" id="editar_precioProducto" name="editar_precioProducto" autocomplete="off" value="<?php echo ((isset($producto["precio_producto"])) ? ($producto["precio_producto"]) : (""));?>"><i class="las la-dollar-sign"></i>
    <!-- Comento el <img> porque algo me esta jodiendo en el CSS y el label "Precio" se me va para arriba -->
    <!--<img class="imagen-preview" src="<?php /*echo ((isset($producto["imagen_producto"])) ? ($producto["imagen_producto"]) : ("")) */?>-->
    <label for="editar_imagen">Imagen:</label><input type="file" id="editar_imagenProducto" name="editar_imagenProducto"></i>
    <button>Editar</button>
    <a class="volverListaProducto" href="../Productos/productos.php">⬅ Volver a Productos</a>
    </form>
</body>
</html>