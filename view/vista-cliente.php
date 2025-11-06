<!-- INICIO DE CUERPO DE PAGINA -->
<div class="container-fluid mb-0" style="position: relative; top: -80px;">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">Productos Destacados</h2>
            <!-- Carousel de productos destacados -->
            <div id="productos-carousel" class="carousel slide mb-5" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-indicators">
                    <!-- Aquí se cargarán los indicadores del carousel -->
                </div>
                <div class="carousel-inner">
                    <!-- Aquí se cargarán los items del carousel -->
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
                <!-- Aquí se cargarán las tarjetas de productos -->
            </div>
        </div>
    </div>
</div>
<!-- FIN DE CUERPO DE PAGINA -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>view/estilos/vistaC.css">
<script src="<?php echo BASE_URL; ?>view/function/vistaC.js"></script>
