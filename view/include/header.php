<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esther</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <!-- Incluye Bootstrap Icons una sola vez (en tu <head>) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>view/estilos/header.css">
   <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

   <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
    

</head>

<body>

    <!-- Overlay (fondo oscuro al abrir sidebar) -->
    <div class="overlay" id="overlay"></div>
    <!-- AÑADIDO: Fondo oscuro que aparece al abrir el menú -->

    <!-- Sidebar (menú lateral izquierdo) -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>Sistema</h2>
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>home">
                    <i class="bi bi-house-door"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>users">
                    <i class="bi bi-people"></i> Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>produc">
                    <i class="bi bi-box-seam"></i> Productos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>categoria">
                    <i class="bi bi-tags"></i> Categorías
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>cliente">
                    <i class="bi bi-person-badge"></i> Clientes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>proveedor">
                    <i class="bi bi-truck"></i> Proveedores
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>vista-cliente">
                    <i class="bi bi-shop"></i> vista cliente
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-shop"></i> Tiendas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-cart-check"></i> Ventas
                </a>
            </li>
        </ul>
    </nav>
    <!-- AÑADIDO: Todo el menú lateral (sidebar) -->

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- BOTÓN HAMBURGUESA PARA ABRIR SIDEBAR -->
            <button id="menuToggleSidebar" class="me-2">
                <i class="bi bi-list"></i>
            </button>
            <!-- AÑADIDO: Botón hamburguesa que abre el sidebar -->
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>home"> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>produc">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>categoria">Categoria</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>cliente">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>proveedor">Proveedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>vista-cliente">
                            <i class="bi bi-shop"></i> vista cliente
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sales</a>
                    </li>

                </ul>
            </div>
            <!-- AÑADIDO: Eliminado el formulario innecesario que envolvía el dropdown, ya que podía interferir con la funcionalidad del dropdown de Bootstrap -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenedor principal para el contenido de cada vista -->
    <main class="main-content" id="mainContent">
        <!-- AÑADIDO: <main> para que el contenido comience aquí -->
    