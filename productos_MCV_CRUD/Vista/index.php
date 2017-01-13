<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Productos</title>
    </head>
    <body>
        <table>
                    <tr><td>
                            <form action="../Controlador/Controller.php">
                                <input type="hidden" value="listar" name="opcion">
                                <input type="submit" value="Consultar listado">
                            </form>
                        </td>
                    <td>
                            <form action="../Controlador/Controller.php">
                                <input type="hidden" value="listardesc" name="opcion">
                                <input type="submit" value="Consultar listado descendente">
                            </form>
                        </td>
                    <td>
                            <form action="../Controlador/Controller.php">
                                <input type="hidden" value="crear" name="opcion">
                                <input type="submit" value="Crear Producto">
                            </form>
                        </td></tr></table>
        <table border="1">
            <tr>
                <th>Codigo</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
            <?php 
            session_start();
            include '../Modelo/Producto.php';
            if (isset($_SESSION['listado'])) {
                $listado=  unserialize($_SESSION['listado']);
                foreach ($listado as $prod){
                    echo "<tr>";
                    echo "<td>".$prod->getCodigo()."</td>";
                    echo "<td>".$prod->getNombre()."</td>";
                    echo "<td>".$prod->getPrecio()."</td>";
                    echo "<td>".$prod->getCantidad()."</td>";
                    echo "<td><a href='../Controlador/controller.php?opcion=eliminar&codigo=".$prod->getCodigo()."'>eliminar</a></td>";
                    echo "<td><a href='../Controlador/controller.php?opcion=cargar&codigo=".$prod->getCodigo()."'>actualizar</a></td>";
                    echo "<tr>";                    
                }
            }else{echo "No se han cargado datos.";}
            ?>
        </table>
<?php 
            if (isset($_SESSION['valorTotal'])) {
             echo "VALOR TOTAL DE PRODUCTOS: <b>".$_SESSION['valorTotal']."</b>";     
}
if (isset($_SESSION['mensaje'])) {
    echo "<br>MENSAJE DEL SISTEMA: <font color='red'>".$_SESSION['mensaje']."</font><br>";
}
?>
        
    </body>
</html>
