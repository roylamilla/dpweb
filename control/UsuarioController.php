<?php
require_once("../model/UsuarioModel.php");

$objPersona = new UsuarioModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    //print_r($_POST);
    $nro_identidad =  $_POST['nro_identidad'];
    $razon_social =  $_POST['razon_social'];
    $telefono =  $_POST['telefono'];
    $correo =  $_POST['correo'];
    $departamento =  $_POST['departamento'];
    $provincia =  $_POST['provincia'];
    $distrito =  $_POST['distrito'];
    $cod_postal =  $_POST['cod_postal'];
    $direccion =  $_POST['direccion'];
    $rol =  $_POST['rol'];
    //ENCRIPTANDO nro_identidad PARA USAR COMO CONTRASEÑA
    $password = password_hash($nro_identidad, PASSWORD_DEFAULT);

    /* validar que los campos no esten vacios*/
    if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {

        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        // validar si existe persona con el mismo nro_documento
        $existePersona = $objPersona->existePersona($nro_identidad);
        if ($existePersona > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error: nro documento ya existe');
        } else {
            $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito,       $cod_postal, $direccion, $rol, $password);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'REGISTRADO CORRECTAMENTE');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'ERROR: FALLO AL REGISTAR');
            }
        }
    }
    echo json_encode($arrResponse);
   
}
/* para iniciar sesion*/
if ($tipo == "iniciar_sesion") {
    $nro_identidad = $_POST['username'];
    $password = $_POST['password'];
    if ($nro_identidad== "" || $password== "") {
        $respuesta = array('status' => false, 'msg' => 'ERROR: campos vacios');
    }else {
        $existePersona= $objPersona->existePersona($nro_identidad);
        if (!$existePersona) {
            $respuesta = array('status' => false, 'msg' => 'ERROR: usuario no registrado');
        }else {
            $persona = $objPersona->buscarPersonaPorNroIdentidad($nro_identidad); 
            if (password_verify($password,$persona->password)) {
                session_start();
                $_SESSION['ventas_id']=$persona->id;
                $_SESSION['ventas_usuario']=$persona->razon_social;
                $respuesta = array('status' => true, 'msg' => 'bienvenido');
            }else {
                $respuesta = array('status' => false, 'msg' => 'ERROR: contraseña incorrecta');
            }
        }
    }
    echo json_encode($respuesta);
}