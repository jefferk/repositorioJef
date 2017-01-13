<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Producto</title>
    </head>
    <body>
        <form action="../Controlador/Controller.php" >
            <input type="hidden" value="guardar" name="opcion">
            Codigo:<input type="text" name="codigo"><br>
            Nombre:<input type="text" name="nombre"><br>
            Precio:<input type="text" name="precio"><br>
            Cantidad:<input type="text" name="cantidad"><br>
            <input type="submit" value="Crear">
        </form>
          
    </body>
</html>
