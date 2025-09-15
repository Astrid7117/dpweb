<div class="container">
    <h4 class="mt-3 mb-3">Lista de usuarios</h4>

       <div class="d-flex justify-content-end mb-3">
  <a class="btn btn-success" href="<?= BASE_URL ?>new-user">
   Nuevo <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
</svg>
  </a>
</div>
    
<table class="table table-bordered border-primary table-striped">
    <thead class="table-dark">
        <tr class="text-center">
            <th>Nro</th>
            <th>DNI</th>
            <th>Nombres y Apellidos</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="content_users">

    </tbody>
</table>
</div>
<script src="<?= BASE_URL ?>view/function/user.js"></script>
<!--script>view_users();</script-->