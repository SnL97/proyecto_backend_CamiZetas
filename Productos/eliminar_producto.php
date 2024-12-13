<?php

if(isset($_GET["id"])){
    echo "Se conectó perfectamente";
    echo "<br>";
    $id_producto = $_GET["id"];
    if(!empty($id_producto)) {
        echo "Se conectó nuevamente bien";
        echo "<br>";
        $conexion = mysqli_connect("127.0.0.1:3306", "root", "", "proyecto_backend");

        $query = "DELETE FROM productos WHERE id_producto =".$id_producto;
        $resultado = mysqli_query($conexion, $query);

        mysqli_close($conexion);

        if ($resultado === true){
            echo "El producto se eliminó correctamente";
            header('Location: productos.php');
        }
        else {
            echo "El producto no se eliminó. Algo salió mal";
        }
    }
    else {
        echo "Campo vacío";
        echo "<br>";
    }
}
else {
    echo "No se conectó";
    echo "<br>";
}

?>