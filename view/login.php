<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>Iniciar Sesión</title>
<link rel="stylesheet" href="view/login.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  const base_url = '<?= BASE_URL; ?>';
</script>
</head>
<body>
 
  <div class="background-container">
    <img src="https://i.pinimg.com/736x/6e/f2/95/6ef295642b2e516547cd98f3d2b4730e.jpg" alt="ventana" id="img">
    <div class="login-wrapper" role="main" aria-label="Formulario de inicio de sesión">
      <h2>Iniciar Sesión</h2>
      <form id="frm_login" novalidate>
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" autocomplete="username" placeholder="Ingresa tu usuario" required aria-required="true" />
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" autocomplete="current-password" placeholder="Ingresa tu contraseña" required aria-required="true" />
        <button type="button" onclick="iniciar_sesion();">Ingresar</button>
      </form>
      
    </div>
  </div>
  
  
  <script src="<?=BASE_URL; ?>view/function/user.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>


