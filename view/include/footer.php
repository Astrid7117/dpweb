    </main>
    <!-- AÑADIDO: Movido </main> al inicio del footer para cerrar correctamente el contenedor principal antes de los scripts -->

    <!-- Bootstrap JS + SweetAlert (solo una vez, eliminadas duplicaciones para evitar conflictos) -->
    <script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Control del Sidebar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menuToggleSidebar');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            if (menuToggle && sidebar && overlay) {
                function toggleSidebar() {
                    sidebar.classList.toggle('active');
                    overlay.classList.toggle('active');
                }

                menuToggle.addEventListener('click', toggleSidebar);
                overlay.addEventListener('click', toggleSidebar);

                document.querySelectorAll('.sidebar .nav-link').forEach(link => {
                    link.addEventListener('click', () => {
                        if (window.innerWidth <= 768) toggleSidebar();
                    });
                });
            }
        });
    </script>
</body>
</html>
