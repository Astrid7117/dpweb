<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>VentasPro - Dashboard</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            purple: '#8b5cf6',
            pink: '#ec4899',
          }
        }
      }
    }
  </script>

  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Lucide Icons CDN -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

  <style>
    .chart-container {
      position: relative;
      height: 300px;
      width: 100%;
    }
    .pie-container {
      position: relative;
      height: 200px;
      width: 100%;
    }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-purple-50 to-pink-50 font-sans">

  <!-- Header -->
  <header class="bg-white border-b border-gray-200 sticky top-0 z-50 backdrop-blur-lg bg-opacity-90">
    <div class="px-4 sm:px-6 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
          <button id="menu-toggle" class="lg:hidden p-2 hover:bg-gray-100 rounded-xl transition-colors">
            <i data-lucide="menu" class="w-5 h-5 text-gray-600"></i>
          </button>
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
              <i data-lucide="shopping-cart" class="w-5 h-5 text-white"></i>
            </div>
            <div>
              <h1 class="text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                VentasPro
              </h1>
              <p class="text-xs text-gray-500">Sistema de Gestión</p>
            </div>
          </div>
        </div>

        <div class="flex items-center gap-3">
          <div class="relative hidden md:block">
            <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
            <input
              type="text"
              id="search-input"
              placeholder="Buscar productos, clientes..."
              class="pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl w-64 lg:w-80 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
            />
          </div>

          <button class="relative p-2 hover:bg-gray-100 rounded-xl transition-colors">
            <i data-lucide="bell" class="w-5 h-5 text-gray-600"></i>
            <span class="absolute top-1 right-1 w-2 h-2 bg-pink-500 rounded-full animate-pulse"></span>
          </button>

          <div class="flex items-center gap-3 pl-3 border-l border-gray-200">
            <img
              src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin"
              alt="Usuario"
              class="w-9 h-9 rounded-full ring-2 ring-purple-100"
            />
            <div class="hidden md:block">
              <p class="text-sm font-semibold text-gray-800">Admin</p>
              <p class="text-xs text-gray-500">Administrador</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Mobile Sidebar -->
  <div id="mobile-sidebar" class="fixed inset-0 z-40 hidden lg:hidden">
    <div class="fixed inset-0 bg-black bg-opacity-50" onclick="closeSidebar()"></div>
    <div class="fixed left-0 top-0 w-64 h-full bg-white shadow-xl p-6">
      <div class="flex items-center justify-between mb-8">
        <h2 class="text-lg font-bold">Menú</h2>
        <button onclick="closeSidebar()" class="p-1 hover:bg-gray-100 rounded-lg">
          <i data-lucide="x" class="w-5 h-5"></i>
        </button>
      </div>
      <nav class="space-y-2">
        <button onclick="setActiveTab('overview')" class="w-full text-left px-4 py-3 rounded-lg transition-colors capitalize bg-purple-100 text-purple-700 font-medium">Resumen</button>
        <button onclick="setActiveTab('ventas')" class="w-full text-left px-4 py-3 rounded-lg transition-colors capitalize text-gray-600 hover:bg-gray-50">Ventas</button>
        <button onclick="setActiveTab('productos')" class="w-full text-left px-4 py-3 rounded-lg transition-colors capitalize text-gray-600 hover:bg-gray-50">Productos</button>
        <button onclick="setActiveTab('clientes')" class="w-full text-left px-4 py-3 rounded-lg transition-colors capitalize text-gray-600 hover:bg-gray-50">Clientes</button>
        <button onclick="setActiveTab('reportes')" class="w-full text-left px-4 py-3 rounded-lg transition-colors capitalize text-gray-600 hover:bg-gray-50">Reportes</button>
      </nav>
    </div>
  </div>

  <!-- Main Content -->
  <main class="p-4 sm:p-6 max-w-7xl mx-auto">
    <!-- Desktop Tabs -->
    <div class="hidden lg:flex items-center gap-1 mb-6 bg-gray-100 p-1 rounded-xl w-fit">
      <button onclick="setActiveTab('overview')" class="px-4 py-2 rounded-lg text-sm font-medium transition-all capitalize bg-white text-purple-700 shadow-sm">Resumen</button>
      <button onclick="setActiveTab('ventas')" class="px-4 py-2 rounded-lg text-sm font-medium transition-all capitalize text-gray-600 hover:text-gray-800">Ventas</button>
      <button onclick="setActiveTab('productos')" class="px-4 py-2 rounded-lg text-sm font-medium transition-all capitalize text-gray-600 hover:text-gray-800">Productos</button>
      <button onclick="setActiveTab('clientes')" class="px-4 py-2 rounded-lg text-sm font-medium transition-all capitalize text-gray-600 hover:text-gray-800">Clientes</button>
      <button onclick="setActiveTab('reportes')" class="px-4 py-2 rounded-lg text-sm font-medium transition-all capitalize text-gray-600 hover:text-gray-800">Reportes</button>
    </div>

    <!-- Welcome -->
    <div class="mb-8">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">¡Bienvenido de nuevo!</h2>
      <p class="text-gray-600">Aquí está el resumen de tus ventas hoy - Domingo, 26 de Octubre 2025</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
      <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
          <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
            <i data-lucide="dollar-sign" class="w-6 h-6 text-white"></i>
          </div>
          <div class="flex items-center gap-1 text-green-600 bg-green-50 px-2 py-1 rounded-lg">
            <i data-lucide="arrow-up" class="w-3 h-3"></i>
            <span class="text-sm font-semibold">12.5%</span>
          </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium mb-1">Ingresos Totales</h3>
        <p class="text-2xl sm:text-3xl font-bold text-gray-800">S/ 115,340</p>
        <p class="text-xs text-gray-500 mt-2">vs mes anterior</p>
      </div>

      <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
          <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
            <i data-lucide="shopping-cart" class="w-6 h-6 text-white"></i>
          </div>
          <div class="flex items-center gap-1 text-green-600 bg-green-50 px-2 py-1 rounded-lg">
            <i data-lucide="arrow-up" class="w-3 h-3"></i>
            <span class="text-sm font-semibold">8.2%</span>
          </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium mb-1">Total Ventas</h3>
        <p class="text-2xl sm:text-3xl font-bold text-gray-800">2,847</p>
        <p class="text-xs text-gray-500 mt-2">+127 esta semana</p>
      </div>

      <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
          <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
            <i data-lucide="users" class="w-6 h-6 text-white"></i>
          </div>
          <div class="flex items-center gap-1 text-green-600 bg-green-50 px-2 py-1 rounded-lg">
            <i data-lucide="arrow-up" class="w-3 h-3"></i>
            <span class="text-sm font-semibold">5.7%</span>
          </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium mb-1">Clientes Activos</h3>
        <p class="text-2xl sm:text-3xl font-bold text-gray-800">1,234</p>
        <p class="text-xs text-gray-500 mt-2">+48 nuevos este mes</p>
      </div>

      <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all transform hover:-translate-y-1">
        <div class="flex items-center justify-between mb-4">
          <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
            <i data-lucide="package" class="w-6 h-6 text-white"></i>
          </div>
          <div class="flex items-center gap-1 text-red-600 bg-red-50 px-2 py-1 rounded-lg">
            <i data-lucide="arrow-down" class="w-3 h-3"></i>
            <span class="text-sm font-semibold">3.1%</span>
          </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium mb-1">Productos Stock</h3>
        <p class="text-2xl sm:text-3xl font-bold text-gray-800">456</p>
        <p class="text-xs text-gray-500 mt-2">23 requieren reposición</p>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-8">
      <!-- Revenue Chart -->
      <div class="lg:col-span-2 bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
          <div>
            <h3 class="text-lg font-bold text-gray-800">Ingresos Mensuales</h3>
            <p class="text-sm text-gray-500">Últimos 6 meses</p>
          </div>
          <div class="flex gap-2 w-full sm:w-auto">
            <button class="p-2 hover:bg-gray-50 rounded-lg transition-colors flex-1 sm:flex-initial">
              <i data-lucide="download" class="w-5 h-5 text-gray-600"></i>
            </button>
            <select class="flex-1 sm:flex-initial px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
              <option>2025</option>
              <option>2024</option>
              <option>2023</option>
            </select>
          </div>
        </div>
        <div class="chart-container">
          <canvas id="revenueChart"></canvas>
        </div>
      </div>

      <!-- Category Pie Chart -->
      <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-2">Ventas por Categoría</h3>
        <p class="text-sm text-gray-500 mb-6">Distribución actual</p>
        <div class="pie-container">
          <canvas id="categoryChart"></canvas>
        </div>
        <div class="mt-4 space-y-2">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <div class="w-3 h-3 rounded-full bg-purple-500"></div>
              <span class="text-sm text-gray-600">Electrónica</span>
            </div>
            <span class="text-sm font-semibold text-gray-800">35%</span>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <div class="w-3 h-3 rounded-full bg-pink-500"></div>
              <span class="text-sm text-gray-600">Ropa</span>
            </div>
            <span class="text-sm font-semibold text-gray-800">25%</span>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <div class="w-3 h-3 rounded-full bg-amber-500"></div>
              <span class="text-sm text-gray-600">Alimentos</span>
            </div>
            <span class="text-sm font-semibold text-gray-800">20%</span>
          </div>
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
              <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
              <span class="text-sm text-gray-600">Hogar</span>
            </div>
            <span class="text-sm font-semibold text-gray-800">20%</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Products and Orders -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 mb-8">
      <!-- Top Products -->
      <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
          <div>
            <h3 class="text-lg font-bold text-gray-800">Productos Más Vendidos</h3>
            <p class="text-sm text-gray-500">Top 4 del mes</p>
          </div>
          <button class="px-4 py-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-colors text-sm font-medium">
            Ver todos
          </button>
        </div>
        <div class="space-y-4">
          <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-transparent rounded-xl hover:from-purple-50 hover:to-transparent transition-all">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white font-bold shadow-md">1</div>
              <div>
                <p class="font-semibold text-gray-800">Laptop HP 15"</p>
                <p class="text-sm text-gray-500">145 unidades vendidas</p>
              </div>
            </div>
            <div class="text-right">
              <p class="text-lg font-bold text-gray-800">S/ 87,000</p>
              <span class="text-xs text-green-600 flex items-center gap-1 justify-end">
                <i data-lucide="arrow-up" class="w-3 h-3"></i> 12%
              </span>
            </div>
          </div>
          <!-- Repetir para otros productos -->
          <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-transparent rounded-xl hover:from-purple-50 hover:to-transparent transition-all">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white font-bold shadow-md">2</div>
              <div>
                <p class="font-semibold text-gray-800">Mouse Inalámbrico</p>
                <p class="text-sm text-gray-500">320 unidades vendidas</p>
              </div>
            </div>
            <div class="text-right">
              <p class="text-lg font-bold text-gray-800">S/ 9,600</p>
              <span class="text-xs text-green-600 flex items-center gap-1 justify-end">
                <i data-lucide="arrow-up" class="w-3 h-3"></i> 12%
              </span>
            </div>
          </div>
          <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-transparent rounded-xl hover:from-purple-50 hover:to-transparent transition-all">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white font-bold shadow-md">3</div>
              <div>
                <p class="font-semibold text-gray-800">Teclado Mecánico</p>
                <p class="text-sm text-gray-500">198 unidades vendidas</p>
              </div>
            </div>
            <div class="text-right">
              <p class="text-lg font-bold text-gray-800">S/ 23,760</p>
              <span class="text-xs text-red-600 flex items-center gap-1 justify-end">
                <i data-lucide="arrow-down" class="w-3 h-3"></i> 5%
              </span>
            </div>
          </div>
          <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-transparent rounded-xl hover:from-purple-50 hover:to-transparent transition-all">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white font-bold shadow-md">4</div>
              <div>
                <p class="font-semibold text-gray-800">Monitor 24"</p>
                <p class="text-sm text-gray-500">87 unidades vendidas</p>
              </div>
            </div>
            <div class="text-right">
              <p class="text-lg font-bold text-gray-800">S/ 43,500</p>
              <span class="text-xs text-green-600 flex items-center gap-1 justify-end">
                <i data-lucide="arrow-up" class="w-3 h-3"></i> 12%
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Orders -->
      <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
          <div>
            <h3 class="text-lg font-bold text-gray-800">Órdenes Recientes</h3>
            <p class="text-sm text-gray-500">Últimas transacciones</p>
          </div>
          <button class="p-2 hover:bg-gray-50 rounded-lg transition-colors">
            <i data-lucide="filter" class="w-5 h-5 text-gray-600"></i>
          </button>
        </div>
        <div class="space-y-3">
          <div class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:border-purple-200 hover:bg-purple-50 transition-all">
            <div class="flex-1">
              <div class="flex items-center gap-2 mb-1">
                <p class="font-semibold text-gray-800 text-sm">#ORD-2847</p>
                <span class="text-xs px-2 py-1 rounded-full font-medium bg-green-100 text-green-700">Completado</span>
              </div>
              <p class="text-sm text-gray-600">Juan Pérez</p>
              <p class="text-xs text-gray-400 mt-1">Hace 5 min</p>
            </div>
            <p class="text-lg font-bold text-gray-800">S/ 2,450</p>
          </div>
          <!-- Repetir para otras órdenes -->
          <div class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:border-purple-200 hover:bg-purple-50 transition-all">
            <div class="flex-1">
              <div class="flex items-center gap-2 mb-1">
                <p class="font-semibold text-gray-800 text-sm">#ORD-2846</p>
                <span class="text-xs px-2 py-1 rounded-full font-medium bg-yellow-100 text-yellow-700">Pendiente</span>
              </div>
              <p class="text-sm text-gray-600">María García</p>
              <p class="text-xs text-gray-400 mt-1">Hace 12 min</p>
            </div>
            <p class="text-lg font-bold text-gray-800">S/ 1,890</p>
          </div>
          <div class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:border-purple-200 hover:bg-purple-50 transition-all">
            <div class="flex-1">
              <div class="flex items-center gap-2 mb-1">
                <p class="font-semibold text-gray-800 text-sm">#ORD-2845</p>
                <span class="text-xs px-2 py-1 rounded-full font-medium bg-green-100 text-green-700">Completado</span>
              </div>
              <p class="text-sm text-gray-600">Carlos López</p>
              <p class="text-xs text-gray-400 mt-1">Hace 25 min</p>
            </div>
            <p class="text-lg font-bold text-gray-800">S/ 3,200</p>
          </div>
          <div class="flex items-center justify-between p-4 border border-gray-100 rounded-xl hover:border-purple-200 hover:bg-purple-50 transition-all">
            <div class="flex-1">
              <div class="flex items-center gap-2 mb-1">
                <p class="font-semibold text-gray-800 text-sm">#ORD-2844</p>
                <span class="text-xs px-2 py-1 rounded-full font-medium bg-blue-100 text-blue-700">Enviado</span>
              </div>
              <p class="text-sm text-gray-600">Ana Martínez</p>
              <p class="text-xs text-gray-400 mt-1">Hace 1 hora</p>
            </div>
            <p class="text-lg font-bold text-gray-800">S/ 890</p>
          </div>
        </div>
        <button class="w-full mt-4 py-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-colors text-sm font-medium">
          Ver todas las órdenes
        </button>
      </div>
    </div>

    <!-- Sales Performance Bar Chart -->
    <div class="bg-white rounded-2xl p-5 sm:p-6 shadow-sm border border-gray-100">
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <div>
          <h3 class="text-lg font-bold text-gray-800">Rendimiento de Ventas</h3>
          <p class="text-sm text-gray-500">Comparativa de ventas y órdenes</p>
        </div>
        <div class="flex gap-4 flex-wrap">
          <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-purple-500"></div>
            <span class="text-sm text-gray-600">Ventas</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="w-3 h-3 rounded-full bg-pink-500"></div>
            <span class="text-sm text-gray-600">Órdenes</span>
          </div>
        </div>
      </div>
      <div class="chart-container">
        <canvas id="salesChart"></canvas>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 mt-12 py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-500">
        <p>© 2025 VentasPro. Todos los derechos reservados.</p>
        <div class="flex gap-6">
          <a href="#" class="hover:text-purple-600 transition-colors">Soporte</a>
          <a href="#" class="hover:text-purple-600 transition-colors">Documentación</a>
          <a href="#" class="hover:text-purple-600 transition-colors">Términos</a>
          <a href="#" class="hover:text-purple-600 transition-colors">Privacidad</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script>
    lucide.createIcons();

    // Sidebar
    document.getElementById('menu-toggle').addEventListener('click', () => {
      document.getElementById('mobile-sidebar').classList.remove('hidden');
    });

    function closeSidebar() {
      document.getElementById('mobile-sidebar').classList.add('hidden');
    }

    function setActiveTab(tab) {
      const buttons = document.querySelectorAll('[onclick^="setActiveTab"]');
      buttons.forEach(btn => {
        const text = btn.textContent.trim();
        if (text === 'Resumen' && tab === 'overview' || btn.textContent.toLowerCase().includes(tab)) {
          btn.className = btn.className.replace('text-gray-600', 'text-purple-700').replace('hover:text-gray-800', '').replace('bg-white', 'bg-purple-100');
        } else {
          btn.className = btn.className.replace('text-purple-700', 'text-gray-600').replace('bg-purple-100', 'bg-white');
        }
      });
    }

    // Charts
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
      type: 'line',
      data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
        datasets: [{
          label: 'Ingresos',
          data: [85000, 92000, 88000, 105000, 98000, 115000],
          borderColor: 'rgb(139, 92, 246)',
          backgroundColor: 'rgba(139, 92, 246, 0.1)',
          tension: 0.4,
          fill: true,
          pointBackgroundColor: '#8b5cf6',
          pointRadius: 5,
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          y: { beginAtZero: false }
        }
      }
    });

    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
      type: 'doughnut',
      data: {
        labels: ['Electrónica', 'Ropa', 'Alimentos', 'Hogar'],
        datasets: [{
          data: [35, 25, 20, 20],
          backgroundColor: ['#8b5cf6', '#ec4899', '#f59e0b', '#10b981'],
          borderWidth: 0,
          cutout: '65%'
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } }
      }
    });

    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
      type: 'bar',
      data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
        datasets: [
          {
            label: 'Ventas',
            data: [45000, 52000, 48000, 61000, 55000, 67000],
            backgroundColor: '#8b5cf6',
            borderRadius: 8,
          },
          {
            label: 'Órdenes',
            data: [320, 380, 350, 420, 390, 450],
            backgroundColor: '#ec4899',
            borderRadius: 8,
          }
        ]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { display: false } },
          y: { beginAtZero: true }
        }
      }
    });
  </script>
</body>
</html>