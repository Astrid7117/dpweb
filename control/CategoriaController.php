<?php
require_once("../model/CategoriaModel.php");

$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

if ($tipo == 'registrar') {
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacíos');
    } else {
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, el nombre de la categoría ya existe');
        } else {
            $respuesta = $objCategoria->registrar($nombre, $detalle);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Categoría registrada correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, fallo en el registro');
            }
        }
    }
    echo json_encode($arrResponse);
}
