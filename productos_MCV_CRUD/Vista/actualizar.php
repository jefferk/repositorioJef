<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar producto</title>
    </head>
    <body>
        <?php
        include '../Modelo/Producto.php';
        session_start();
        $producto=$_SESSION['producto'];
        ?>
      
      <form action="../Controlador/Controller.php">
          <input type="hidden" value=" <?php echo $producto->getCodigo(); ?> " name="codigo">
            <input type="hidden" value="actualizar" name="opcion">
            Codigo:<b> <?php echo $producto->getCodigo(); ?> </b><br>
            Nombre:<input type="text" name="nombre" value="<?php echo $producto->getNombre(); ?> "><br>
            Precio:<input type="text" name="precio" value="<?php echo $producto->getPrecio(); ?> "><br>
            Cantidad:<input type="text" name="cantidad" value="<?php echo $producto->getCantidad(); ?> "><br>
            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>
