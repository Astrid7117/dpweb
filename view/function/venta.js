let productos_venta = {};
let id = 2;
let id2 = 4;
let producto = {};
producto.nombre = "Producto A";
producto.precio = 100;
producto.cantidad = 2;

let producto2 = {};
producto2.nombre = "Producto B";
producto2.precio = 200;
producto2.cantidad = 1;
//productos_venta.push(producto);
productos_venta[id] = producto;
productos_venta[id2] = producto2;
console.log(productos_venta);


async function agregar_producto_temporal() {
    let id = document.getElementById('id_producto_venta').value;
    let precio = document.getElementById('producto_precio_venta').value;
    let cantidad = document.getElementById('producto_cantidad_venta').value;
    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);
    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=registrarTemporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            if (json.msg == "registrado") {
                alert("el producto fue registrado");
            } else {
                alert("el producto fue actualizado");
            }
        }
    } catch (error) {
        console.log("error en agregar producto temporal " + error);
    }

}

/*** */

function agregar_producto_venta(id, precio, cantidad = 1) {
    fetch(base_url + 'control/VentaController.php?tipo=registrarTemporal', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `id_producto=${id}&precio=${precio}&cantidad=${cantidad}`
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        cargarCarritoTemporal();
    });
}
/*** */

function eliminarProductoTemporal(id) {
    if (!id) return console.log('id inválido para eliminar:', id);

    const datos = new FormData();
    datos.append('id', id);

    fetch(base_url + 'control/VentaController.php?tipo=eliminarTemporal', {
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(resp => {
        console.log('resp eliminar:', resp);
        if (resp.status) {
            // recargar carrito
            cargarCarritoTemporal();
        } else {
            alert('No se pudo eliminar: ' + (resp.msg || 'error'));
        }
    })
    .catch(err => {
        console.error('Error fetch eliminar:', err);
    });
}
