<?php
include 'Database.php';
include 'Producto.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoModel
 *
 * @author antho_000
 */
class ProductoModel {
    public function getValorProductos(){
        $listado=  $this->getProductos();
        $suma=0;
        foreach ($listado as $prod){
            $suma+=$prod->getPrecio()*$prod->getCantidad();
        }
        return $suma;
    }

    public function getProductos($orden) {
     $pdo= Database::connect();
     if ($orden==true)
         $sql="select * from producto order by nombre";
     else
         $sql="select * from producto order by nombre desc";
     
     $resultado=$pdo->query($sql);
     $listado=array();
     foreach ($resultado as $res){
         $producto=new Producto();
         $producto->setCodigo($res['codigo']);
         $producto->setNombre($res['nombre']);
         $producto->setPrecio($res['precio']);
         $producto->setCantidad($res['cantidad']);
         array_push($listado, $producto);
                 }
                 Database::disconnect();
                 return $listado;
    }
    public function getProducto($codigo) {
     $pdo= Database::connect();
     $sql="select * from producto where codigo=?";
     $consulta=$pdo->prepare($sql);
     $consulta->execute(array($codigo));
     $dato=$consulta->fetch(PDO::FETCH_ASSOC);
         $producto=new Producto();
         $producto->setCodigo($dato['codigo']);
         $producto->setNombre($dato['nombre']);
         $producto->setPrecio($dato['precio']);
         $producto->setCantidad($dato['cantidad']);
                 Database::disconnect();
                 return $producto;
    }
    public function crearProducto($codigo, $nombre, $precio, $cantidad) {
     $pdo= Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql="insert into producto (codigo,nombre,precio,cantidad) values(?,?,?,?)";
     $consulta=$pdo->prepare($sql);
     try{
     $consulta->execute(array($codigo, $nombre, $precio, $cantidad));}
     catch(PDOException $e){
         Database::disconnect();
         throw new Exception($e->getMessage());
     }             
     Database::disconnect();
    }
    public function eliminarProducto($codigo) {
     $pdo= Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql="delete from producto where codigo=?";
     $consulta=$pdo->prepare($sql);
     $consulta->execute(array($codigo));
                 Database::disconnect();
    }
    public function actualizarProducto($codigo, $nombre, $precio, $cantidad) {
     $pdo= Database::connect();
     $sql="update producto set nombre=?,precio=?,cantidad=? where codigo=?";
     $consulta=$pdo->prepare($sql);
     $consulta->execute(array($nombre, $precio, $cantidad, $codigo));
                 Database::disconnect();
    }
}
