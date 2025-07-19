<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>Iniciar Sesión</title>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const base_url = '<?= BASE_URL; ?>';
  </script>

  <style>
     * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #1a1a1a;
      overflow: hidden;
    }

    .box {
      position: relative;
      width: min(90%, 380px);
      height: 480px;
      background: #1c1c1c;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .box::before,
    .box::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 380px;
      height: 480px;
      background: linear-gradient(45deg, transparent, #45f3ff, #45f3ff);
      transform-origin: bottom right;
      animation: animate 6s linear infinite;
    }

    .box::after {
      animation-delay: -3s;
    }

    .borderLine::before,
    .borderLine::after {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 380px;
      height: 480px;
      background: linear-gradient(45deg, transparent, #ff2770, #ff2770);
      transform-origin: bottom right;
      animation: animate 6s linear infinite;
    }

    .borderLine::after {
      animation-delay: -4.5s;
    }

    @keyframes animate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .box form {
      position: absolute;
      inset: 6px;
      background: #222;
      padding: 40px 30px;
      border-radius: 8px;
      z-index: 2;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .box form h2 {
      color: #fff;
      font-weight: 600;
      text-align: center;
      letter-spacing: 0.1em;
      margin-bottom: 10px;
    }

    .inputBox {
      position: relative;
      width: 100%;
    }

    .inputBox input {
      width: 100%;
      padding: 20px 10px 10px;
      background: transparent;
      border: none;
      outline: none;
      color: #fff;
      font-size: 1em;
      letter-spacing: 0.05em;
      transition: 0.3s;
      border-bottom: 2px solid #8f8f8f;
    }

    .inputBox span {
      position: absolute;
      left: 10px;
      top: 14px;
      color: #8f8f8f;
      font-size: 1em;
      pointer-events: none;
      transition: 0.3s;
    }

    .inputBox input:focus ~ span,
    .inputBox input:valid ~ span {
      transform: translateY(-20px);
      font-size: 0.85em;
      color: #45f3ff;
    }

    .inputBox i {
      position: absolute;
      left: 0;
      bottom: 0;
      width: 100%;
      height: 2px;
      background: #45f3ff;
      transition: 0.3s;
      pointer-events: none;
    }

    .inputBox input:focus ~ i,
    .inputBox input:valid ~ i {
      width: 100%;
    }

    .links {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
    }

    .links a {
      color: #8f8f8f;
      text-decoration: none;
      font-size: 0.9em;
      transition: 0.3s;
    }

    .links a:hover {
      color: #45f3ff;
    }

    button {
      border: none;
      outline: none;
      background: #45f3ff;
      padding: 12px 0;
      color: #1c1c1c;
      font-weight: 500;
      border-radius: 4px;
      cursor: pointer;
      transition: 0.3s;
      font-size: 1em;
    }

    button:hover {
      background: #ff2770;
      color: #fff;
    }

    @media (max-width: 360px) {
      .box {
        width: 95%;
        height: auto;
        padding-bottom: 20px;
      }
      .box form {
        padding: 30px 20px;
      }
    }
  </style>
</head>

<body>

  <div class="box">
    <span class="borderLine"></span>
    <form id="frm_login" novalidate>
      <h2>Iniciar Sesión</h2>
      <div class="inputBox">
        <input type="text" id="username" name="username" autocomplete="username" required aria-required="true" />
        <span>Usuario</span>
        <i></i>
      </div>
      <div class="inputBox">
        <input type="password" id="password" name="password" autocomplete="current-password" required aria-required="true" />
        <span>Contraseña</span>
        <i></i>
      </div>
      <div class="links">
        <a href="#">¿Olvidaste tu contraseña?</a>
        <a href="#">Crear cuenta</a>
      </div>
      <button type="button" onclick="iniciar_sesion()">Ingresar</button>
    </form>
  </div>



   <script src="<?=BASE_URL; ?>view/function/user.js"> </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>