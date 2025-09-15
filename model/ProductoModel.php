<?php
require_once("../library/conexion.php");
class ProductoModel{
    private $conexion;
    function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrar($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $imagen, $id_proveedor){
        $consulta = "INSERT INTO producto (codigo, nombre, detalle, precio, stock, id_categoria, imagen, id_proveedor) VALUES ('$codigo', '$nombre', '$detalle', '$precio', '$stock', '$id_categoria', '$imagen', '$id_proveedor')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            $sql = $this->conexion->insert_id;
        }else{
            $sql = 0;
        }
        return $sql;
    }

    public function existeProducto($codigo){
        $consulta = "SELECT* FROM producto where codigo = '$codigo'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }

    /*metodo para listar 
    public function verProductos(){
        $arr_productos = array();
        $consulta = "SELECT* from producto";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_productos, $objeto);
        }
        return $arr_productos;
    }


    metodo para ver  
    public function ver($id){
        $consulta = "SELECT * FROM producto WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }*/


    /* Método para listar productos */
    public function verProductos(){
        $arr_productos = array();
        $consulta = "SELECT * FROM producto";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_productos, $objeto);
        }
        return $arr_productos;
    }

    /* Método para ver un producto específico */
    public function ver($id){
        $consulta = "SELECT * FROM producto WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }
    
    /* Método para crear nuevo producto */
    public function crear($codigo, $nombre, $descripcion, $precio, $stock, $categoria, $marca, $estado){
        $consulta = "INSERT INTO productos (codigo, nombre, detalle, precio, stock) 
                     VALUES ('$codigo', '$nombre', '$descripcion', '$precio', '$stock', '$categoria', '$marca', '$estado')";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    /* Método para actualizar producto */
    public function actualizar($id_producto, $codigo, $nombre, $descripcion, $precio, $stock, $categoria, $marca, $estado){
        $consulta = "UPDATE productos SET 
                    codigo = '$codigo', 
                    nombre = '$nombre', 
                    descripcion = '$descripcion', 
                    precio = '$precio', 
                    stock = '$stock', 
                    categoria = '$categoria', 
                    marca = '$marca', 
                    estado = '$estado' 
                    WHERE id = '$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    /* Método para eliminar producto */
    public function eliminar($id_producto){
        $consulta = "DELETE FROM productos WHERE id='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
}
