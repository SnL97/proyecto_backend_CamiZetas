<?php

    $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_backend");

    if($conexion === false){
        echo "Hubo un error de conexión a la base de datos!";
        echo "<br>";
    }
    else{
        echo "Se conectó adecuadamente a la base de datos!";
        echo "<br>";
    }


    $imagen_producto = $_FILES["imagen_producto"];

    $type = pathinfo($imagen_producto["name"], PATHINFO_EXTENSION);

    $data = file_get_contents($imagen_producto["tmp_name"]);

    $imagen_base64 = "data:image/".$type.";base64,".base64_encode($data);

    $producto = $_POST["nuevo_nombreProducto"];
    $marca = $_POST["nueva_marcaProducto"];
    $precio = $_POST["nuevo_precioProducto"];

    $query = "INSERT INTO productos (nombre_producto, marca_producto, precio_producto, imagen_producto) VALUES ('".$producto."', '".$marca."', '".$precio."', '".$imagen_base64."')";
    $resultado = mysqli_query($conexion, $query);

    if($resultado){
        echo "El producto fue agregado correctamente";
        echo "<br>";
        header('Location: ../Productos/productos.php');
        
    }
    else{
        echo "¡Error!. El producto no fue agregado correctamente";
        echo "<br>";
    }

    if (isset($_POST["nuevo_nombreProducto"])) {
        $producto = $_POST["nuevo_nombreProducto"];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($producto)) {
                echo "El campo 'Nombre del Producto' es obligatorio.";
                echo "<br>";
            } else {
                echo "Nombre del Producto: <strong>" . $producto . "</strong>";
                echo "<br>";
            }
        }
    }
    else {
        echo "Algo salió mal!";
        echo "<br>";
    }

    if (isset($_POST["nueva_marcaProducto"])) {
        $marca = $_POST["nueva_marcaProducto"];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($marca)) {
                echo "El campo 'Marca' es obligatorio.";
                echo "<br>";
            } else {
                echo "Marca: <strong>" . $marca . "</strong>";
                echo "<br>";
            }
        }
    }
    else {
        echo "Algo salió mal!";
        echo "<br>";
    }

    if (isset($precio) && !empty($precio)) {
        $precio = $_POST["nuevo_precioProducto"];
        if (is_numeric($precio)) {
            echo "Precio: <strong>" . $precio . "</strong>";
            echo "<br>";
        }
        else {
            echo "Por favor, ingresa sólo valor numérico (números).";
            echo "<br>";
        }
    }
    else {
        echo "El campo 'Precio' es obligatorio.";
        echo "<br>";
    }

    mysqli_close($conexion);

?>