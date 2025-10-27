
    <!-- INICIO DE CUERPO DE PAGINA -->
    <div class="container-fluid mb-0" style="position: relative; top: -80px;">
        <div class="card">
            <h5 class="card-header">Registrar Categoría</h5>
            <form id="frm_categories">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-4 col-form-label">Nombre:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="detalle" class="col-sm-4 col-form-label">Detalle:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="detalle" name="detalle" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button type="reset" class="btn btn-info">Limpiar</button>
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- FIN DE CUERPO DE PAGINA -->
<script src="<?php echo BASE_URL; ?>view/function/categories.js"></script> 