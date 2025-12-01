document.addEventListener('DOMContentLoaded', function () {
    cargarProductos(); // Carga todos al inicio

    // Buscador en tiempo real
    const buscador = document.getElementById('busqueda_venta');
    if (buscador) {
        buscador.addEventListener('keyup', function () {
            cargarProductos(this.value.trim());
        });
    }
});

async function cargarProductos(buscar = '') {
    try {
        const datos = new FormData();
        datos.append('dato', buscar); // ← Ahora SÍ enviamos el texto

        const respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=buscar_Producto_venta', {
            method: 'POST',
            body: datos
        });

        if (!respuesta.ok) throw new Error('Error de red');

        const res = await respuesta.json();

        // ← VERIFICAR SI HAY ERROR EN LA RESPUESTA
        if (!res.status) {
            console.log("No hay productos o error:", res.msg);
            document.getElementById('productos-container').innerHTML = 
                '<div class="col-12 text-center py-5"><h4 class="text-muted">No se encontraron productos</h4></div>';
            return;
        }

        const json = res.data; // ← Ahora SÍ es seguro
        console.log("Productos recibidos:", json);

        // Cargar carousel (primeros 3)
        cargarCarousel(json.slice(0, 3));

        // Cargar tarjetas
        const container = document.getElementById('productos-container');
        if (!container) return;

        container.innerHTML = ''; // Limpiar

        if (json.length === 0) {
            container.innerHTML = '<div class="col-12 text-center py-5"><h4 class="text-muted">No hay productos disponibles</h4></div>';
            return;
        }

        json.forEach(producto => {
            const imagenSrc = producto.imagen 
                ? base_url + producto.imagen.replace(/^uploads\//i, 'Uploads/')
                : 'https://via.placeholder.com/300x200?text=Sin+Imagen';

            const card = document.createElement('div');
            card.className = 'col-lg-3 col-md-4 col-sm-6 mb-4';
            card.innerHTML = `
                <div class="producto-card shadow-sm rounded overflow-hidden h-100 d-flex flex-column">
                    <img src="${imagenSrc}" 
                         alt="${producto.nombre}" 
                         class="producto-imagen w-100" 
                         style="height: 200px; object-fit: cover;"
                         onerror="this.src='https://via.placeholder.com/300x200?text=No+Imagen'">
                    <div class="producto-info p-3 flex-grow-1 d-flex flex-column">
                        <h5 class="producto-nombre mb-2">${producto.nombre}</h5>
                        <p class="text-muted small">Categoría: ${producto.categoria || 'General'}</p>
                        <p class="producto-precio h4 text-success fw-bold mt-auto">
                            S/ ${parseFloat(producto.precio).toFixed(2)}
                        </p>
                        <div class="botones mt-3 d-flex gap-2">
                            <button class="btn btn-outline-primary btn-sm flex-fill">
                                Ver Detalles
                            </button>
                            <button class="btn btn-success btn-sm flex-fill" onclick="agregar_producto_venta(${producto.id})">
                                Añadir
                            </button>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(card);
           let id = document.getElementById('id_producto_venta');
    let precio = document.getElementById('producto_precio_venta');
    let cantidad = document.getElementById('producto_cantidad_venta');
    id.value=producto.id;
    precio.value =producto.precio;
    cantidad.value =1;
        });

    } catch (e) {
        console.error("Error al cargar productos:", e);
        const container = document.getElementById('productos-container');
        if (container) {
            container.innerHTML = '<div class="col-12 text-center py-5 text-danger"><h4>Error de conexión</h4></div>';
        }
    }
}

function cargarCarousel(productos) {
    const carouselInner = document.querySelector('#productos-carousel .carousel-inner');
    const carouselIndicators = document.querySelector('#productos-carousel .carousel-indicators');
    
    if (!carouselInner || !carouselIndicators || productos.length === 0) return;

    carouselInner.innerHTML = '';
    carouselIndicators.innerHTML = '';

    productos.forEach((producto, index) => {
        // Indicador
        const indicator = document.createElement('button');
        indicator.type = 'button';
        indicator.dataset.bsTarget = '#productos-carousel';
        indicator.dataset.bsSlideTo = index;
        if (index === 0) {
            indicator.classList.add('active');
            indicator.ariaCurrent = 'true';
        }
        carouselIndicators.appendChild(indicator);
   

        // Item del carousel
        const imagenSrc = producto.imagen 
            ? base_url + producto.imagen.replace(/^uploads\//i, 'Uploads/')
            : 'https://via.placeholder.com/800x400?text=Producto+Destacado';

        const item = document.createElement('div');
        item.className = `carousel-item ${index === 0 ? 'active' : ''}`;
        item.innerHTML = `
            <img src="${imagenSrc}" class="d-block w-100" alt="${producto.nombre}" style="height: 400px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded p-3">
                <h3 class="text-white">${producto.nombre}</h3>
                <p class="text-white">S/ ${parseFloat(producto.precio).toFixed(2)}</p>
            </div>
        `;
        carouselInner.appendChild(item);
    });
}
