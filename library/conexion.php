<?php
require_once "../config/config.php";

class Conexion{
    public static function connect(){
        $mysql = new mysqli(BD_HOST, BD_USER, BD_PASSWORD, BD_NAME);
    }
}