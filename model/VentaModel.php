<?php
require_once("../library/conexion.php");
class VentaModel
{

    private $conexion;
    function __construct()
    {

        $this->conexion = new Conexion();

        $this->conexion = $this->conexion->connect();
    }
    public function registrar_temporal($id_producto, $precio, $cantidad){
        $consulta = "INSERT INTO temporal_venta (id_producto, precio, cantidad) VALUES ('$id_producto', '$precio', '$cantidad')";
          $sql = $this->conexion->query($consulta);
          if ($sql) {
        return $this->conexion->insert_id;
        }
        return 0;
    
    }
    public function actualizarCantidadTemporal($id_producto, $cantidad){
         $consulta = "UPDATE temporal_venta SET cantidad='$cantidad' WHERE id_producto='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function buscarTemporales()
    {
        $arr_temporal = array();
        $consulta = "SELECT t.id, t.id_producto, t.cantidad, t.precio,
                    p.nombre, p.imagen
                FROM temporal_venta t
                INNER JOIN producto p ON t.id_producto = p.id";
        $sql= $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_temporal, $objeto);
        }
        return $arr_temporal;
    }
      public function buscarTemporal($id_producto)
    {
        $consulta = "SELECT * FROM temporal_venta WHERE id_producto='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
       
    }

      public function eliminarTemporal($id)
    {
       $consulta = "DELETE FROM temporal_venta WHERE id='$id'";
       $sql =  $this->conexion->query($consulta);
        return $sql;
    }

      public function eliminarTemporales()
    {
       $consulta = "DELETE FROM temporal_venta";
       $sql =  $this->conexion->query($consulta);
        return $sql;
    }
         //------------------------------VENTAS REGISTRADAS--------------------
public function insertarTemporal($id_producto)
{
    // Verificar si ya existe en temporal
    $consulta = "SELECT id, cantidad FROM temporal_venta WHERE id_producto = '$id_producto'";
    $sql = $this->conexion->query($consulta);

    if ($sql->num_rows > 0) {
        // Ya existe → aumentar cantidad
        $temporal = $sql->fetch_object();
        $nueva_cantidad = $temporal->cantidad + 1;

        $update = "UPDATE temporal_venta SET cantidad='$nueva_cantidad' WHERE id_producto='$id_producto'";
        return $this->conexion->query($update);

    } else {
        // No existe → insertar
        $insert = "INSERT INTO temporal_venta(id_producto, cantidad) VALUES('$id_producto', 1)";
        return $this->conexion->query($insert);
    }
}


 }