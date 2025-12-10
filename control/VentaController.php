<?php
require_once("../model/VentaModel.php");
require_once("../model/ProductoModel.php");

$objProducto= new ProductoModel();
$objVenta = new VentaModel();
$tipo = $_GET['tipo']?? '';

if ($tipo == "registrarTemporal") {
      $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $id_producto = $_POST['id_producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];


    $b_producto = $objVenta->buscarTemporal($id_producto);
    if ($b_producto) 
        {
            $n_cantidad = $b_producto->cantidad+1;     
        $objVenta->actualizarCantidadTemporal($id_producto, $n_cantidad);
        $respuesta = array('status' => true, 'msg' => 'actualizado');
        
    }else {
        $registro = $objVenta->registrar_temporal($id_producto, $precio, $cantidad);
        $respuesta = array('status' => true, 'msg' => 'registrado');
    }
  echo json_encode($respuesta);

    
}

/***** */

// 1. AGREGAR PRODUCTO AL CARRITO TEMPORAL (desde el buscador de venta)
if ($tipo == "agregarTemporal") {
    $data = json_decode(file_get_contents("php://input"), true);
    $idproducto = $data["idproducto"] ?? null;

    if (empty($idproducto) || !is_numeric($idproducto)) {
        echo json_encode(["status" => false, "msg" => "ID inválido"]);
        exit;
    }

    $result = $objVenta->insertarTemporal($idproducto);
    echo json_encode(["status" => $result]);
    exit;
}


// 2. ELIMINAR ITEM DEL CARRITO
if ($tipo == "eliminarTemporal") {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'] ?? $_POST['id'] ?? null;

    if (!$id || !is_numeric($id)) {
        echo json_encode(["status" => false, "msg" => "ID no recibido"]);
        exit;
    }

    $result = $objVenta->eliminarTemporal($id);
    echo json_encode(["status" => $result]);
    exit;
}

// 3. LISTAR CARRITO TEMPORAL
if ($tipo == "listarTemporal") {
    $lista = $objVenta->buscarTemporales();
    echo json_encode(["status" => true, "data" => $lista]);
    exit;
}


// 4. VACIAR CARRITO COMPLETO
if ($tipo == "vaciarTemporal") {
    $result = $objVenta->eliminarTemporales();  
    echo json_encode(["status" => $result]);
    exit;
}


// 5. BUSCAR PRODUCTO PARA VENTA (como en tu producto.php)
if ($tipo == "buscar_Producto_venta") {
    $dato = $_POST['dato'] ?? '';
    $productos = $objProducto->buscarProductoByNombreOrCodigo($dato);
    
    if (count($productos) > 0) {
        echo json_encode(['status' => true, 'data' => $productos]);
    } else {
        echo json_encode(['status' => false, 'msg' => 'No se encontraron productos']);
    }
    exit;
}

/*** */

   // funcion agregar listar temporal
    
    
    if ($tipo == "listarTemporal") {
        $lista = $objVenta->buscarTemporales();
        echo json_encode(["status" => true, "data" => $lista]);
        exit;
    }
