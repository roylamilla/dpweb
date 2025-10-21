<?php
require_once("../model/ProductoModel.php");
require_once("../model/CategoriaModel.php");

$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    //print_r($_POST);
    $codigo =  $_POST['codigo'];
    $nombre =  $_POST['nombre'];
    $detalle =  $_POST['detalle'];
    $precio =  $_POST['precio'];
    $stock =  $_POST['stock'];
    $id_categoria =  $_POST['id_categoria'];
    $fecha_vencimiento =  $_POST['fecha_vencimiento'];
    //$imagen =  $_POST['imagen'];
    $id_proveedor =  $_POST['id_proveedor'];


    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => false, 'msg' => 'Error, imagen no recibida']);
        exit;
    }
    if ($objProducto->existeProducto($codigo) > 0) {
        echo json_encode(['status' => false, 'msg' => 'Error, el código ya existe']);
        exit;
    }
    $file = $_FILES['imagen'];
    $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $extPermitidas = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $extPermitidas)) {
        echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
        exit;
    }
    if ($file['size'] > 5 * 1024 * 1024) { // 5MB
        echo json_encode(['status' => false, 'msg' => 'La imagen supera 2MB']);
        exit;
    }
    $carpetaUploads = "../uploads/productos/";
    if (!is_dir($carpetaUploads)) {
        @mkdir($carpetaUploads, 0775, true);
    }

    $nombreUnico = uniqid('prod_') . '.' . $ext;
    $rutaFisica  = $carpetaUploads . $nombreUnico;
    $rutaRelativa = "uploads/productos/" . $nombreUnico;

    if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
        echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
        exit;
    }
    $id = $objProducto->registrar($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $rutaRelativa, $id_proveedor);
    if ($id > 0) {
        echo json_encode(['status' => true, 'msg' => 'Registrado correctamente', 'id' => $id, 'img' => $rutaRelativa]);
    } else {
        @unlink($rutaFisica); // revertir archivo si falló BD
        echo json_encode(['status' => false, 'msg' => 'Error, falló en registro']);
    }
    exit;
}


/* Ver productos registrados */
if ($tipo == "ver_productos") {
    $productos = $objProducto->verProductos();
    echo json_encode($productos);
}

/* Ver para editar */
if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'];
    $producto = $objProducto->ver($id_producto);
    if ($producto) {
        $respuesta['status'] = true;
        $respuesta['data'] = $producto;
    } else {
        $respuesta['msg'] = 'Error, producto no existe';
    }
    echo json_encode($respuesta);
}



/* Para actualizar */
if ($tipo == "actualizar") {
    $id_producto = $_POST['id_producto'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    //$imagen = $_POST['imagen'];
    $id_proveedor = $_POST['id_proveedor'];


    if ($id_producto == "" || $codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == "" || $id_proveedor == "") {

        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacíos');
    } else {
        $producto = $objProducto->ver($id_producto);
        if (!$producto) {
            $arrResponse = array('status' => false, 'msg' => 'Error, producto no existe en BD');
            echo json_encode($arrResponse);
            exit;
        } else {
            if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
                //echo "no se envio imagen";
                $imagen = $producto->imagen;
            } else {
                $file = $_FILES['imagen'];
                $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $extPermitidas = ['jpg', 'jpeg', 'png'];

                if (!in_array($ext, $extPermitidas)) {
                    echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
                    exit;
                }
                if ($file['size'] > 5 * 1024 * 1024) { // 5MB
                    echo json_encode(['status' => false, 'msg' => 'La imagen supera 2MB']);
                    exit;
                }
                $carpetaUploads = "../uploads/productos/";
                if (!is_dir($carpetaUploads)) {
                    @mkdir($carpetaUploads, 0775, true);
                }

                $nombreUnico = uniqid('prod_') . '.' . $ext;
                $rutaFisica  = $carpetaUploads . $nombreUnico;
                $rutaRelativa = "uploads/productos/" . $nombreUnico;

                if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
                    echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
                    exit;
                }
                //echo "se envio imagen";
                /*$file = $_FILES['imagen'];
                $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $extPermitidas = ['jpg', 'jpeg', 'png'];
                if (!in_array($ext, $extPermitidas)) {
                    echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
                    exit;
                }
                if ($file['size'] > 5 * 1024 * 1024) { // 5MB
                    echo json_encode(['status' => false, 'msg' => 'La imagen supera 2MB']);
                    exit;
                }
                $carpetaUploads = "../uploads/productos/";
                if (!is_dir($carpetaUploads)) {
                    @mkdir($carpetaUploads, 0775, true);
                }
                $nombreUnico = uniqid('prod_') . '.' . $ext;
                $rutaFisica  = $carpetaUploads . $nombreUnico;
                $imagen = "uploads/productos/" . $nombreUnico;
                if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
                    echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
                    exit;
                }
                //eliminar la imagen anterior
                if (file_exists("../" . $producto->imagen)) {
                    @unlink("../" . $producto->imagen);
                }
                $imagen= $rutaRelativa;*/
            }
            //actualizar
            $actualizar = $objProducto->actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $imagen, $id_proveedor);
            if ($actualizar) {
                $arrResponse = array('status' => true, 'msg' => "Producto actualizado correctamente");
            } else {
                $arrResponse = array('status' => false, 'msg' => $actualizar);
            }
            echo json_encode($arrResponse);
            exit;
        }
    }
}



/* Método para Eliminar producto */
if ($tipo == "eliminar") {
    $id_producto = isset($_POST['id']) ? $_POST['id'] : '';

    if ($id_producto == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, ID vacío');
    } else {
        $existeId = $objProducto->ver($id_producto);
        if (!$existeId) {
            $arrResponse = array('status' => false, 'msg' => 'Error, producto no existe en Base de Datos');
        } else {
            $eliminar = $objProducto->eliminar($id_producto);
            if ($eliminar) {
                $arrResponse = array('status' => true, 'msg' => 'Producto eliminado correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto');
            }
        }
    }
    echo json_encode($arrResponse);
    exit;
}
