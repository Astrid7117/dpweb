function validar_form() {
    let nro_documento = document.getElementById("nro_identidad").value;
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;
    if (nro_documento == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {
        alert("Error: Existen Campos vacios");
        return;
    }
    Swal.fire({
        title: "🤔 ¿Estás seguro de registrarte?",
        text: "¡Tu cuenta será creada con los datos ingresados!",
        imageUrl: "https://i.pinimg.com/originals/90/c6/69/90c6698dc6f9e00bb32ffb3e21042474.gif",
        imageWidth: 200,
        imageHeight: 150,
        imageAlt: "Thinking GIF",
        showCancelButton: true,
        confirmButtonColor: "#4ecdc4",
        cancelButtonColor: "#ff9ff3",
        confirmButtonText: "¡Sí, registrarme! 🚀",
        cancelButtonText: "Cancelar ",
        reverseButtons: true,
        customClass: {
            popup: 'swal2-show',
            title: 'swal2-title-fun',
            content: 'swal2-content-fun',
            confirmButton: 'swal2-confirm-fun',
            cancelButton: 'swal2-cancel-fun'
        },
        backdrop: `
    rgba(107, 114, 255, 0.3)
    url("data:image/svg+xml,%3csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3e%3cg fill='%23fff' fill-opacity='0.1'%3e%3cpath d='M20 20c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10zm10 0c0-5.5-4.5-10-10-10s-10 4.5-10 10 4.5 10 10 10 10-4.5 10-10z'/%3e%3c/g%3e%3c/svg%3e")
    left top
    repeat
  `,
        showClass: {
            popup: 'animate__animated animate__bounceInDown'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Función para crear confeti
            function createConfetti() {
                const confettiContainer = document.createElement('div');
                confettiContainer.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 9999;
      `;
                document.body.appendChild(confettiContainer);

                const colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#ffeaa7', '#dda0dd', '#98d8c8'];

                for (let i = 0; i < 50; i++) {
                    const confetti = document.createElement('div');
                    confetti.style.cssText = `
          position: absolute;
          width: 10px;
          height: 10px;
          background: ${colors[Math.floor(Math.random() * colors.length)]};
          left: ${Math.random() * 100}%;
          animation: confetti-fall ${Math.random() * 3 + 2}s linear infinite;
          opacity: ${Math.random()};
          transform: rotate(${Math.random() * 360}deg);
        `;
                    confettiContainer.appendChild(confetti);
                }

                // Agregar keyframes para la animación
                if (!document.getElementById('confetti-style')) {
                    const style = document.createElement('style');
                    style.id = 'confetti-style';
                    style.textContent = `
          @keyframes confetti-fall {
            0% {
              transform: translateY(-100vh) rotate(0deg);
            }
            100% {
              transform: translateY(100vh) rotate(720deg);
            }
          }
        `;
                    document.head.appendChild(style);
                }

                // Eliminar confeti después de 5 segundos
                setTimeout(() => {
                    confettiContainer.remove();
                }, 5000);
            }

            // Crear confeti inmediatamente
            createConfetti();

            // Alerta de registro exitoso
            Swal.fire({
                title: "🎉 ¡Registro exitoso!",
                html: `
        <div style="font-size: 16px; line-height: 1.6; margin-top: 15px;">
          <p>✅ <strong>Te has registrado exitosamente</strong></p>
          <p>🎊 Tu cuenta ha sido creada correctamente</p>
          <p>💫 ¡Ya puedes empezar a usar la plataforma!</p>
        </div>
      `,
                imageUrl: "https://i.pinimg.com/originals/80/40/5f/80405fce21dd3f261308c7689abfd870.gif",
                imageWidth: 200,
                imageHeight: 150,
                imageAlt: "Success celebration GIF",
                confirmButtonText: "¡Perfecto! 🎯",
                confirmButtonColor: "#ff6b6b",
                timer: 4000,
                timerProgressBar: true,
                customClass: {
                    popup: 'swal2-success-fun',
                    title: 'swal2-title-party',
                    htmlContainer: 'swal2-html-fun'
                },
                showClass: {
                    popup: 'animate__animated animate__tada'
                },
                hideClass: {
                    popup: 'animate__animated animate__bounceOut'
                },
                backdrop: `
        rgba(255, 107, 107, 0.2)
        url("data:image/svg+xml,%3csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3e%3cg fill='%23fff' fill-opacity='0.2'%3e%3cpolygon points='30,0 40,20 60,20 45,35 50,60 30,45 10,60 15,35 0,20 20,20'/%3e%3c/g%3e%3c/svg%3e")
        left top
        repeat
      `
            });
        }
    });
}

if (document.querySelector('#frm_user')) {
    //
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}