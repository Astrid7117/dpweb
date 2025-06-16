<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>Iniciar Sesión</title>
<link rel="stylesheet" href="view/login.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
  <script>
    document.getElementById("loginForm").addEventListener("submit", function(event){
      event.preventDefault();

      const usuario = document.getElementById("username").value.trim();
      const contraseña = document.getElementById("password").value.trim();

      if (usuario === "" || contraseña === ""){
        Swal.fire({
          icon: 'warning',
          title: 'campos vacios',
          text: 'por favor, completa todos los campos.',
          confirmButtonColor: '#3085d6',
        });
    
      }else{
        Swal.fire({
          icon: 'success',
          title: '¡Bienvenido!',
        text: `Hola ${usuario}, iniciaste secion correctamente.`,
        confirmButtonText: 'Continuar',
        confirmButtonColor: '#3085d6',
        });
      }
    });
  </script>
</body>

</html>


