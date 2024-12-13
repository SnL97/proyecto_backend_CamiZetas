<?php
    if(isset($_POST["id_producto"])){
        $id_producto = $_POST["id_producto"];
        if(!empty($id_producto)){

            $editar_producto = $_POST["editar_nombreProducto"];
            $editar_marca = $_POST["editar_marcaProducto"];
            $editar_precio = $_POST["editar_precioProducto"];

        $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_backend");
        
        if(!empty($_FILES["editar_imagenProducto"]["name"])){
            $editar_imagen = $_FILES["editar_imagenProducto"];

            $type_editar = pathinfo($editar_imagen["name"], PATHINFO_EXTENSION);

            $data_editar = file_get_contents($editar_imagen["tmp_name"]);

            $imagenEditar_base64 = "data:image/".$type_editar.";base64,".base64_encode($data_editar);

        $query = "UPDATE productos SET nombre_producto = '".$editar_producto."', marca_producto = '".$editar_marca."', precio_producto = '".$editar_precio."', imagen_producto = '".$imagenEditar_base64."' WHERE id_producto =".$id_producto;
        $resultado = mysqli_query($conexion, $query);
        }
        else {
        $query = "UPDATE productos SET nombre_producto = '".$editar_producto."', marca_producto = '".$editar_marca."', precio_producto = '".$editar_precio."' WHERE id_producto =".$id_producto;
        $resultado = mysqli_query($conexion, $query);
        }

        if($resultado){
            echo "Se conectó adecuadamente a la base de datos";
            echo "<br>";
            header('Location: ../Productos/productos.php');
        }
        else{
            echo "¡Hubo un error de conexión a la base de datos!";
            echo "<br>";
        }
        
        mysqli_close($conexion);
        }
    }
?>