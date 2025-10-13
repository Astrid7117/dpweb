<div class="container">
    <div class="mt-3" style="background-color: #87CEEB; color: white; padding: 15px; border-left: 6px solid #0d6efd; border-radius: 8px 0 0 8px;"> 
    <div class="d-flex justify-content-between align-items-center">    
    <h4 class="mb-0">Lista de Productos</h4>
          <a class="btn btn-success d-flex align-items-center" href="<?= BASE_URL ?>products">
     Nuevo <i class="bi bi-plus"></i> 
  </a>
    
    </div>
    
 </div>
 <div class="d-flex justify-content-end mb-3">
</div>
    
<table class="table table-bordered border-primary table-striped">
    <thead class="table-dark">
        <tr class="text-center">
            <th>Nro</th>
            <th>Codigo</th>
            <th>Nombres</th>
            <th>Detalle</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Fecha Vencimiento</th>
            <th>categoria</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="content_productos">

    </tbody>
</table>
</div>
<script src="<?= BASE_URL ?>view/function/products.js"></script>
<!--script>view_users();</script-->