<?php
require_once("../model/CategoriaModel.php");

$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    //print_r($_POST);
    $nombre =  $_POST['nombre'];
    $detalle =  $_POST['detalle'];
    
    /* validar que los campos no esten vacios*/
    if ($nombre == "" || $detalle == "") {

        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        // validar si existe categoria con el mismo nombre
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error: nombre ya existe');
        } else {
            $respuesta = $objCategoria->registrar($nombre,$detalle);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'REGISTRADO CORRECTAMENTE');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'ERROR: FALLO AL REGISTAR');
            }
        }
    }
    echo json_encode($arrResponse);
}
