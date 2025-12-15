<body>
    <!-- INICIO DE CUERPO DE PAGINA -->
    <div class="container-fluid mb-0" style="position: relative; top: -80px;">
        <div class="row">

            <!-- PRODUCTOS PRINCIPALES -->
            <div class="col-12 col-lg-8">

                <!-- BUSCADOR DE PRODUCTOS -->
                <div class="row mb-4">
                    <div class="col-12 col-md-6 mx-auto">
                        <div class="input-group shadow-sm">

                            </span>
                            <input type="text" id="busqueda_venta" class="form-control" placeholder="Buscar productos" onkeyup="cargarProductos();">
                            <input type="hidden" id="id_producto_venta">
                            <input type="hidden" id="producto_precio_venta">
                            <input type="hidden" id="producto_cantidad_venta" value="1">
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

                <h2 class="text-center mb-12">Productos Disponibles</h2>
                <div id="productos-container" class="row">
                    <!-- Tarjetas de productos cargadas aquí -->
                </div>
            </div>

            <!-- CARRITO DE COMPRAS FIJO AL COSTADO -->
            <div class="col-12 col-lg-4 position-sticky top-0 carrito" style="height: 100vh; overflow-y: auto; z-index: 1000;">
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
                                        <th>Cant.</th>
                                        <th>P. Unit.</th>
                                        <th>SubTotal</th>
                                        <th>Acciòn</th>
                                    </tr>
                                </thead>
                                </thead>
                                <tbody id="lista_compra">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-end">
                            <h4>Subtotal : <label id="subtotal_general"></label></h4>
                            <h4>Igv : <label id="igv_general"></label></h4>
                            <h4>Total : <label id="total"></label></h4>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Realizar Venta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Venta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_venta">
                        <div class="row">
                                  <div class="col-md-6">
                            <label for="cliente_dni" class="form-label">DNI del Cliente</label>
                            <input type="text" class="form-control" name="cliente_dni" id="cliente_dni" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11">

                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary mt-4" onclick="buscar_cliente_venta();">Buscar Cliente</button>
                        </div>
                        <div class="row">
                            <label for="cliente_nombre" class="form-label">Nombre Cliente</label>
                            <input type="text" class="form-control" name="cliente_nombre" id="cliente_nombre" readonly>
                            <input type="hidden" class="form-control" id="id_cliente_venta">
                        </div>
                        <div class="col-md-3">
                            <label for="fecha_venta" class="from-label">Fecha de venta</label>
                            <input type="datetime" class="form-control" name="fecha_venta" id="fecha_venta" value="<?=  date('Y-m-d H:i') ?>">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="registrarVenta();">Registrar venta</button>
                </div>
            </div>
        </div>
    </div>



    <!-- FIN DE CUERPO DE PAGINA -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/estilos/vistaC.css">
    <script src="<?php echo BASE_URL; ?>view/function/vistaC.js"></script>
    <script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
    <script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>
    <script>
        let input = document.getElementById("busqueda_venta");
        input.addEventListener('keydown', (event) => {
            if (event.key == 'Enter') {
                agregar_producto_temporal();
            }
        })
        listar_temporales();
        act_subt_general();
    </script>
</body>