function validar_form() {
    // Captura los valores de los campos del formulario
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
    // Verifica si alguno de los campos está vacío
    if (nro_documento == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {

        Swal.fire({
            title: "ERROR?",
            text: "¡Ups! Hay campos vacíos.",
            icon: "question"
        });

        return; // Detiene la función para no enviar el formulario
    }
    /*
    Swal.fire({
        title: "¡Registro exitoso!",

        imageAlt: "Success celebration GIF",
        confirmButtonText: "¡Perfecto! ",
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
        icon: "success",
        draggable: true
    });*/

    // Si todos los campos están llenos, llama a la función que registra el usuario
    registrarUsuario();
}
// Se verifica si existe en el documento un elemento con el id frm_user.
if (document.querySelector('#frm_user')) {
    // Se guarda una referencia al formulario con id frm_user en una variable llamada frm_user.
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {   //Se asigna una función al evento onsubmit del formulario.
        e.preventDefault();   //Este método evita que el formulario se envíe de forma tradicional (recargando la página).
        validar_form(); //Llama a la función
    }
}

async function registrarUsuario() {
    try {
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_user);
        //enviar datos a controlador
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        // Convierte la respuesta a formato JSON
        let json = await respuesta.json();
        //validamos que json.status sea = true
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_user').reset(); // Limpia el formulario
        } else {
            alert(json.msg);
        }
    } catch (e) {
        console.log("Error al registrar Usuario:" + e);
    }

}



async function iniciar_sesion() {
    // Captura los valores del input usuario y contraseña
    let usuario = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (usuario == "" || password == "") {
        //alert("Error, campos vacios!")
        Swal.fire({
            icon: "error",
            title: "Error, campos vacios!"

        });
        return;
    }
    try {
        // Captura los datos del formulario de login
        const datos = new FormData(frm_login);
        // Envía los datos al backend para validar
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=iniciar_sesion', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        // -----------------------------------
        let json = await respuesta.json();
        //validamos que json.status sea = true
        if (json.status) { //true
            location.replace(base_url + 'new-user');
        } else {
            alert(json.msg);
        }
    } catch (error) {
        console.log(error);
    }
}

async function view_users() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_usuarios', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
      let usuarios = await respuesta.json();
      let tbody = document.getElementById('content_users');
      tbody.innerHTML = ''; // Limpia cualquier contenido previo en el <tbody> para evitar duplicados
      // Define un objeto para mapear valores numéricos de roles a nombres descriptivos
        const rolesMap = {
            '1': 'Administrador',
            '2': 'Contador',
            '3': 'Almacenero',
            '4': 'Usuario'
        };
      usuarios.forEach((usuario, index) => {  // Itera sobre cada usuario en el array 'usuarios' recibido del servidor
        let fila = document.createElement('tr');  // Crea un nuevo elemento <tr> (fila) para la tabla
        fila.classList.add('text-center');  // Agrega la clase 'text-center' para centrar el contenido de la fila
        let celdaNro = document.createElement('td');  // Crea una celda (<td>) para el número secuencial
            celdaNro.textContent = index + 1; // Número secuencial

            // Crea celdas
            let celdaDNI = document.createElement('td');
            celdaDNI.textContent = usuario.nro_identidad;  // Asigna el valor

            let celdaNombre = document.createElement('td');
            celdaNombre.textContent = usuario.razon_social;

            let celdaCorreo = document.createElement('td');
            celdaCorreo.textContent = usuario.correo;

            let celdaRol = document.createElement('td');
            //celdaRol.textContent = usuario.rol;
            // Usa el mapeo para mostrar el nombre del rol en lugar del número
            celdaRol.textContent = rolesMap[usuario.rol] || 'Desconocido'; // 'Desconocido' si el rol no está en el mapeo

            let celdaEstado = document.createElement('td');
            celdaEstado.textContent = usuario.estado || 'Activo'; // Asume 'Activo' si no hay campo estado

            // Añade las celdas a la fila
            fila.appendChild(celdaNro);
            fila.appendChild(celdaDNI);
            fila.appendChild(celdaNombre);
            fila.appendChild(celdaCorreo);
            fila.appendChild(celdaRol);
            fila.appendChild(celdaEstado);

            // Añade la fila al cuerpo de la tabla
            tbody.appendChild(fila);
        });
    } catch (error) {
        console.error("Error al obtener usuarios:", error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "No se pudieron cargar los usuarios."
        });

    }

}
// Verifica si existe un elemento con id 'content_users' en el documento
if (document.getElementById('content_users')) {
    view_users();
}
