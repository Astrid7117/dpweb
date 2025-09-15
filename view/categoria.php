<div class="container">
    <h4 class="mt-3 mb-3">Lista de Categoria
    </h4>
  
<div class="d-flex justify-content-end mb-3">
  <a class="btn btn-success" href="<?= BASE_URL ?>categories">
     Nuevo <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg>
  </a>
</div>
    <table class="table table-bordered border-primary table-striped">
        <thead class="table-dark">
            <tr class="text-center">
                <th>Nro</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="content_categories">

        </tbody>
    </table>
</div>

<script src="<?= BASE_URL ?>view/function/categories.js"></script>
<!--script>view_users();</script-->