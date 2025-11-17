<?php
require_once("../library/conexion.php");
class ProductoModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrar($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $imagen, $id_proveedor)
    {
        $codigo = $this->conexion->real_escape_string($codigo);
        $nombre = $this->conexion->real_escape_string($nombre);
        $detalle = $this->conexion->real_escape_string($detalle);
        $precio = floatval($precio);
        $stock = intval($stock);
        $id_categoria = intval($id_categoria);
        $fecha_vencimiento = $this->conexion->real_escape_string($fecha_vencimiento);
        $id_proveedor = intval($id_proveedor);
        $imagen = $this->conexion->real_escape_string($imagen);
        $consulta = "INSERT INTO producto (codigo, nombre, detalle, precio, stock, id_categoria, fecha_vencimiento, imagen, id_proveedor) VALUES ('$codigo', '$nombre', '$detalle', $precio, $stock, $id_categoria, '$fecha_vencimiento', '$imagen', '$id_proveedor')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            return $this->conexion->insert_id;
        }
        return 0;
    }
    /*
    public function registrar($codigo, $nombre, $detalle, $precio, $stock, $id_categoria,$fecha_vencimiento, $imagen, $id_proveedor){
        $consulta = "INSERT INTO producto (codigo, nombre, detalle, precio, stock, id_categoria, fecha_vencimiento, imagen, id_proveedor) VALUES ('$codigo', '$nombre', '$detalle', '$precio', '$stock', '$id_categoria', $fecha_vencimiento, $imagen '$id_proveedor')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            $sql = $this->conexion->insert_id;
        }else{
            $sql = 0;
        }
        return $sql;
    }*/

    public function existeProducto($codigo)
    {
        $consulta = "SELECT* FROM producto where codigo = '$codigo'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }


    /*metodo para buscar una producto atraves de codigo */
    public function buscarProductoPorNroCodigo($codigo)
    {
        $consulta = "SELECT codigo from producto where codigo = '$codigo' limit 1;";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    //metodo para listar producto
    public function verProductos()
    {
        $arr_productos = array();
        $consulta = "SELECT * from producto";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_productos, $objeto);
        }
        return $arr_productos;
    }

    public function existProducto($codigo, $id_excluir = null)
    {
        $consulta = "SELECT * FROM producto WHERE codigo = '$codigo'";
        if ($id_excluir !== null) {
            $consulta .= " AND id_producto != '$id_excluir'";
        }
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }


    //metodo para ver producto
    public function ver($id)
    {
        $consulta = "SELECT * FROM producto WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }


    /*metodo para actualizar
    public function actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento,  $id_proveedor)
    {
        $consulta = "UPDATE producto SET codigo = '$codigo', nombre = '$nombre', detalle = '$detalle', precio = '$precio', stock = '$stock',id_categoria = '$id_categoria', fecha_vencimiento = '$fecha_vencimiento' id_proveedor = '$id_proveedor'  WHERE id = '$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }*/


    public function actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $id_proveedor, $imagen = null)
    {
        $consulta = "UPDATE producto SET codigo='$codigo', nombre='$nombre', detalle='$detalle', precio='$precio', stock='$stock', id_categoria='$id_categoria', fecha_vencimiento='$fecha_vencimiento', id_proveedor='$id_proveedor'";

        if (!empty($imagen)) {
            $consulta .= ", imagen='$imagen'";
        }
        $consulta .= " WHERE id='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }


    /*public function actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $imagen, $id_proveedor)
    {
        $id_producto         = intval($id_producto);
        $codigo              = $this->conexion->real_escape_string($codigo);
        $nombre              = $this->conexion->real_escape_string($nombre);
        $detalle             = $this->conexion->real_escape_string($detalle);
        $precio              = floatval($precio);
        $stock               = intval($stock);
        $id_categoria        = intval($id_categoria);
        $fecha_vencimiento   = $this->conexion->real_escape_string($fecha_vencimiento);
        $imagen              = $this->conexion->real_escape_string($imagen);
        $id_proveedor        = intval($id_proveedor);

        $consulta = "UPDATE producto SET 
                codigo = '$codigo', 
                nombre = '$nombre', 
                detalle = '$detalle', 
                precio = $precio, 
                stock = $stock, 
                id_categoria = $id_categoria, 
                fecha_vencimiento = '$fecha_vencimiento', 
                imagen = '$imagen', 
                id_proveedor = $id_proveedor 
                WHERE id_producto = $id_producto";

        $sql = $this->conexion->query($consulta);
        if ($sql) {
            return true;
        }
        return false;
    }*/



    //metodo para eliminar
    public function eliminar($id_producto)
    {
        $consulta = "DELETE FROM producto WHERE id='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }



    //buscar producto por nombre o codigo
    public function buscarProductoByNombreOrCodigo($dato){
        $arr_productos = array();
        $consulta = "SELECT * FROM producto WHERE codigo LIKE '$dato%' OR nombre LIKE '%$dato%' OR detalle LIKE '%$dato%'";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_productos, $objeto);
        }
        return $arr_productos;
    }
    

}

