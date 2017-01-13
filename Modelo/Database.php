<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author antho_000
 */
class Database {
private static $dbName="productos";
private static $dbHost = 'mysql23664-vanthony.jl.serv.net.mx';
private static $dbUsername='root';
private static $dbUserPassword='ATQcdm04921 ';
//Propiedad para control de la conexion:     
private static  $conexion = null;
public function __construct() {         
exit('No se permite instanciar esta clase.');     
}
public static function connect() {         
// Una sola conexion para toda la aplicacion (singleton):         
if (null == self::$conexion) {             
try {                 
self::$conexion = new PDO("mysql:host=" . self::$dbHost . ";
" . "dbname=" . self:: $dbName, self::$dbUsername, self::$dbUserPassword);
             } catch (PDOException $e) {                 
 die($e­>getMessage());             } 
         }   
       return self::$conexion;     }
public static function disconnect() {         
self::$conexion = null;     }
    
}
