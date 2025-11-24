<body>
    <!-- INICIO DE CUERPO DE PAGINA -->
    <div class="container-fluid mb-0" style="position: relative; top: -80px;">
        <div class="row">

            <!-- PRODUCTOS PRINCIPALES -->
            <div class="col-12 col-lg-9">

                <!-- BUSCADOR DE PRODUCTOS -->
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mx-auto">
                        <div class="input-group shadow-sm">
                            
                           </span>
                            <input type="text" id="busqueda_venta" class="form-control" placeholder="Buscar productos" onkeyup=" listar_productos_venta();">
                        </div>
                    </div>
                </div>

                <h2 class="text-center mb-4">Productos Destacados</h2>
                <!-- Carousel de productos destacados -->
                <div id="productos-carousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="3000">
                    <div class="carousel-indicators"></div>
                    <div class="carousel-inner">
                        <!-- Items cargados dinámicamente -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productos-carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productos-carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <h2 class="text-center mb-4">Productos Disponibles</h2>
                <div id="productos-container" class="row">
                    <!-- Tarjetas de productos cargadas aquí -->
                </div>
            </div>

            <!-- CARRITO DE COMPRAS FIJO AL COSTADO -->
            <div class="col-12 col-lg-3 position-sticky top-0" style="height: 100vh; overflow-y: auto; z-index: 1000;">
                <div class="bg-white shadow-lg rounded-3 p-4 h-100 border-start border-3 border-success">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0 text-success fw-bold">
                            <i class="bi bi-cart4 me-2"></i> Mi Carrito
                        </h4>
                        <span id="contador-carrito" class="badge bg-success rounded-pill fs-6"></span>
                    </div>
                    <hr class="text-success">

                    <div id="lista-carrito" class="mb-4" style="max-height: 58vh; overflow-y: auto;">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover align-middle">
                                <thead class="table-success text-dark">
                                    <tr>
                                        <th>Producto</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-end">Precio</th>
                                        <th class="text-end">Total</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla-productos">
                                    <!-- PRODUCTO 1 -->
                                    <tr>
                                        <td class="fw-bold">Azúcar</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-secondary restar" data-index="0">-</button>
                                                <span class="btn btn-light cantidad px-3">2</span>
                                                <button class="btn btn-outline-secondary sumar" data-index="0">+</button>
                                            </div>
                                        </td>
                                        <td class="text-end">S/ 2.00</td>
                                        <td class="text-end fw-bold text-success subtotal-item">S/ 4.00</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-danger eliminar" data-index="0" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- PRODUCTO 2 -->
                                    <tr>
                                        <td class="fw-bold">Agua Cielo</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-secondary restar" data-index="1">-</button>
                                                <span class="btn btn-light cantidad px-3">1</span>
                                                <button class="btn btn-outline-secondary sumar" data-index="1">+</button>
                                            </div>
                                        </td>
                                        <td class="text-end">S/ 4.00</td>
                                        <td class="text-end fw-bold text-success subtotal-item">S/ 4.00</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-danger eliminar" data-index="1" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="border-top pt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <strong>Subtotal:</strong>
                            <span id="subtotal-carrito">S/ 0.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <strong>IGV</strong>
                            <span class="text-success">0.18</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4 fs-5">
                            <strong>Total:</strong>
                            <strong id="total-carrito" class="text-success">S/ 0.00</strong>
                        </div>

                    </div>

                  
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DE CUERPO DE PAGINA -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/estilos/vistaC.css">
    <script src="<?php echo BASE_URL; ?>view/function/vistaC.js"></script>
     <script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
    <script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>
</body>