<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>Iniciar Sesión</title>
<link rel="stylesheet" href="view/style.css">
</head>
<body>
 
  <div class="background-container">
    <img src="https://i.pinimg.com/736x/6e/f2/95/6ef295642b2e516547cd98f3d2b4730e.jpg" alt="ventana" id="img">
    <div class="login-wrapper" role="main" aria-label="Formulario de inicio de sesión">
      <h2>Iniciar Sesión</h2>
      <form id="loginForm" novalidate>
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" autocomplete="username" placeholder="Ingresa tu usuario" required aria-required="true" />
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" autocomplete="current-password" placeholder="Ingresa tu contraseña" required aria-required="true" />
        <button type="submit">Entrar</button>
      </form>
      
    </div>
  </div>
</body>

</html>


