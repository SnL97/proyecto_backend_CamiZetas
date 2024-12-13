<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./CSS/productos_style.css">
        <title>Tabla - Productos</title>
    </head>
    <body>
        <div class="productoFondo">
            <h2>Productos</h2>
            <div class="volverInicioContenedor"><a class="volverInicio" href="../index.html">⬅ Volver al Inicio</a></div>
        </div>
        <div class="agregarContenedor">
            <a class="agregar" href="../Agregar Producto/nuevo_producto.php" title="Agregar Producto"><i class="las la-plus"></i></a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th class="productoTh">Producto</th>
                    <th class="marcaTh">Marca</th>
                    <th>Precio</th>
                    <th id="configurar"><i class="las la-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_backend");
                    
                    $query = "SELECT * FROM productos";
                    $resultado = mysqli_query($conexion, $query);
                        
                    while ($unaFila = mysqli_fetch_assoc($resultado)) {
                        echo '<tr>
                                    <tr>
                                        <td class="imagenCamiseta">
                                            <img src="'.$unaFila['imagen_producto'].'">
                                        </td>
                                        <td>
                                            <div>
                                                <span>'.$unaFila["nombre_producto"].'</span>
                                            </div>
                                        </td>
                                        <td class="marca">'.$unaFila["marca_producto"].'</td>
                                        <td class="precio">'.$unaFila["precio_producto"].'</td>
                                        <td class="botonContenedor">
                                            <a href="../Editar Producto/formulario_editar_productos.php?id='.$unaFila["id_producto"].'" class="editar" title="Editar">
                                                <span class="spanEditar" aria-hidden="true"><i class="las la-pen"></i></span>
                                            </a>
                                            <a href="./eliminar_producto.php?id='.$unaFila["id_producto"].'" class="eliminar" title="Eliminar"
                                                <span class="spanEliminar" aria-hidden="true"><i class="las la-times"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                </tr>';
                    }
                    mysqli_close($conexion);
                ?>
            </tbody>
        </table>
    </body>
</html>