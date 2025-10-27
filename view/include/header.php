<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esther</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <!-- Incluye Bootstrap Icons una sola vez (en tu <head>) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #cfd5eeff 0%, #cbc6d1ff 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* === NAVBAR === */
        .navbar {
            background: rgba(164, 140, 253, 1) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 0.75rem 1rem;
            z-index: 1050;
        }

        .navbar-brand {
            font-weight: 600;
            color: white !important;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #e0d4ff !important;
        }

        .navbar-toggler {
            border: none;
            padding: 4px 8px;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255,255,255,1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* === BOTÓN HAMBURGUESA PARA SIDEBAR === */
        #menuToggleSidebar {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            padding: 0.5rem;
            margin-right: 0.5rem;
        }

        #menuToggleSidebar:hover {
            color: #e0d4ff;
        }
        /* AÑADIDO: Estilos del botón hamburguesa para sidebar */

        /* === SIDEBAR === */
        .sidebar {
            position: fixed;
            left: -280px;
            top: 0;
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            transition: left 0.3s ease;
            z-index: 1040;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.3);
            overflow-y: auto;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar-header {
            padding: 25px 20px;
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            color: #fff;
            font-size: 24px;
            font-weight: 600;
        }

        .nav-menu {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
            border-left: 3px solid transparent;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-left-color: #667eea;
            padding-left: 30px;
        }

        .sidebar .nav-link i {
            margin-right: 12px;
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        /* === OVERLAY === */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1030;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* === MAIN CONTENT === */
        .main-content {
            margin-left: 0;
            padding: 100px 40px 40px;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 250px;
                left: -250px;
            }
            .main-content {
                padding: 80px 20px 20px;
            }
        }

        /* AÑADIDO: Estilos para el dropdown-menu para asegurar que se muestre correctamente con fondo blanco, opciones visibles y z-index alto para que aparezca sobre el navbar */
        .dropdown-menu {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            z-index: 1060;
        }

        .dropdown-item {
            color: #000;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>

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