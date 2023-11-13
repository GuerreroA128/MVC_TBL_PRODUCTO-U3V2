<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) ||
    empty($_POST["nombre"]) ||
    empty($_POST["stock"]) ||
    empty($_POST["descripcion"])||
    empty($_POST["categoria"]) ||
    empty($_POST["marca"]||
    empty($_POST["idproducto"]) ||
    empty($_POST["cantidad"]))){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["nombre"];
    $stock = $_POST["stock"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $marca = $_POST["marca"];
    $idproveedor = $_POST["idproveedor"];
    $cantidad = $_POST["cantidad"];
    
    $sentencia = $bd->prepare("INSERT INTO tbl_producto(nombre,stock,descripcion,categoria,marca,idproveedor,cantidad) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$stock,$descripcion,$categoria,$marca,$idproveedor,$cantidad]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>