<?php
require_once("../model/ProductoModel.php");

$objProducto = new ProductoModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    //print_r($_POST);
    $codigo =  $_POST['codigo'];
    $nombre =  $_POST['nombre'];
    $detalle =  $_POST['detalle'];
    $precio =  $_POST['precio'];
    $stock =  $_POST['stock'];
    $id_categoria =  $_POST['id_categoria'];
    $imagen =  $_POST['imagen'];
    $id_proveedor =  $_POST['id_proveedor'];


    /* validar que los campos no esten vacios*/
    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $imagen == "" || $id_proveedor == "") {

        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        // validar si existe producto con el mismo 
        $existeProducto = $objProducto->existeProducto($codigo);
        if ($existeProducto > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error: codigo ya existe');
        } else {
            $respuesta = $objProducto->registrar($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $imagen, $id_proveedor);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'REGISTRADO CORRECTAMENTE');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'ERROR: FALLO AL REGISTAR');
            }
        }
    }
    echo json_encode($arrResponse);
}


/* ver productos registrados
if ($tipo == "ver_productos") {
    $usuarios = $objPersona->verUsuarios();
    echo json_encode($usuarios);
}*/



/* Ver productos registrados */
if ($tipo == "ver_productos") {
    $productos = $objProducto->verProductos();
    echo json_encode($productos);
    exit;
}

/* Ver para editar */
if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'] ?? '';
    
    if ($id_producto == "") {
        $respuesta['msg'] = 'Error, ID vacío';
        echo json_encode($respuesta);
        exit;
    }
    
    $producto = $objProducto->ver($id_producto);
    if ($producto) {
        $respuesta['status'] = true;
        $respuesta['data'] = $producto;
    } else {
        $respuesta['msg'] = 'Error, producto no existe';
    }
    echo json_encode($respuesta);
    exit;
}

/* Para crear nuevo producto */
if ($tipo == "crear") {
    $codigo = $_POST['codigo'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $marca = $_POST['marca'] ?? '';
    $estado = $_POST['estado'] ?? '';

    // Validar campos obligatorios
    if ($codigo == "" || $nombre == "" || $precio == "" || $stock == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos obligatorios vacíos');
        echo json_encode($arrResponse);
        exit;
    }

    // Crear producto
    $crear = $objProducto->crear($codigo, $nombre, $descripcion, $precio, $stock, $categoria, $marca, $estado);
    if ($crear) {
        $arrResponse = array('status' => true, 'msg' => "Producto creado correctamente");
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Error al crear producto');
    }
    echo json_encode($arrResponse);
    exit;
}

/* Para actualizar */
if ($tipo == "actualizar") {
    $id_producto = $_POST['id_producto'] ?? '';
    $codigo = $_POST['codigo'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $stock = $_POST['stock'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $marca = $_POST['marca'] ?? '';
    $estado = $_POST['estado'] ?? '';

    if ($id_producto == "" || $codigo == "" || $nombre == "" || $precio == "" || $stock == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos obligatorios vacíos');
        echo json_encode($arrResponse);
        exit;
    }

    $existeID = $objProducto->ver($id_producto);
    if (!$existeID) {
        $arrResponse = array('status' => false, 'msg' => 'Error, producto no existe en BD');
        echo json_encode($arrResponse);
        exit;
    }

    $actualizar = $objProducto->actualizar($id_producto, $codigo, $nombre, $descripcion, $precio, $stock, $categoria, $marca, $estado);
    if ($actualizar) {
        $arrResponse = array('status' => true, 'msg' => "Producto actualizado correctamente");
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Error al actualizar producto');
    }
    echo json_encode($arrResponse);
    exit;
}

/* Método para Eliminar producto */
if ($tipo == "eliminar") {
    $id_producto = $_POST['id'] ?? '';

    if ($id_producto == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, ID vacío');
        echo json_encode($arrResponse);
        exit;
    }

    $existeId = $objProducto->ver($id_producto);
    if (!$existeId) {
        $arrResponse = array('status' => false, 'msg' => 'Error, producto no existe en Base de Datos');
        echo json_encode($arrResponse);
        exit;
    }

    $eliminar = $objProducto->eliminar($id_producto);
    if ($eliminar) {
        $arrResponse = array('status' => true, 'msg' => "Producto eliminado correctamente");
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar producto');
    }
    echo json_encode($arrResponse);
    exit;
}
