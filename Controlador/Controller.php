<?php
require_once '../Modelo/ProductoModel.php';
session_start();
$productoModel =new ProductoModel();
$opcion= $_REQUEST['opcion'];
unset($_SESSION['mensaje']);

switch ($opcion){
    case "listar":
        $listado=$productoModel->getProductos(true);
        $_SESSION['listado']=  serialize($listado);
        $_SESSION['valorTotal']=$productoModel->getValorProductos();
        header('Location: ../Vista/index.php');
        break;
    case "listardesc":
        $listado=$productoModel->getProductos(false);
        $_SESSION['listado']=  serialize($listado);
        $_SESSION['valorTotal']=$productoModel->getValorProductos();
        header('Location: ../Vista/index.php');
        break;
    case "crear":
        header('Location: ../Vista/crear.php');
        break;
    case "guardar":
        $codigo=$_REQUEST['codigo'];
        $nombre=$_REQUEST['nombre'];
        $precio=$_REQUEST['precio'];
        $cantidad=$_REQUEST['cantidad'];
        try{
           $productoModel->crearProducto($codigo, $nombre, $precio, $cantidad);
         
        }  catch (Exception $e){
            $_SESSION['mensaje']=$e->getMessage();
        }
        $listado=$productoModel->getProductos();
        $_SESSION['listado']=  serialize($listado);
        header('Location: ../Vista/index.php');
        break;
    case "eliminar":
        $codigo=$_REQUEST['codigo'];
        $productoModel->eliminarProducto($codigo);
        $listado=$productoModel->getProductos();
        $_SESSION['listado']=  serialize($listado);
        header('Location: ../Vista/index.php');
        break;
    case "cargar":
        $codigo=$_REQUEST['codigo'];
        $producto=$productoModel->getProducto($codigo);
        $_SESSION['producto']=$producto;
        header('Location: ../Vista/actualizar.php');
        break;
    case "actualizar":
        $codigo=$_REQUEST['codigo'];
        $nombre=$_REQUEST['nombre'];
        $precio=$_REQUEST['precio'];
        $cantidad=$_REQUEST['cantidad'];
        $productoModel->actualizarProducto($codigo, $nombre, $precio, $cantidad);
        $listado=$productoModel->getProductos(true);
        $_SESSION['listado']=  serialize($listado);
        header('Location: ../Vista/index.php');
        break;
    default : header('Location: ../Vista/index.php');
        
        
}
