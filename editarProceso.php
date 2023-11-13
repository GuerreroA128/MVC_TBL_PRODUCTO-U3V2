<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $idproveedor = $_POST['idproveedor'];
    $cantidad = $_POST['cantidad'];

    $sentencia = $bd->prepare("UPDATE tbl_producto SET
    nombre = ?,
    stock = ?,
    descripcion = ?,
    categoria = ?,
    marca = ?,
    idproveedor = ?,
    cantidad = ?   where id = ?;");
     $resultado = $sentencia->execute([$nombre,$stock,$descripcion,$categoria,$marca,$idproveedor,$cantidad,$id]);
     
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>