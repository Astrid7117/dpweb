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
      
    } catch (error) {

    }

}
if (document.getElementById('content_users')) {
    view_users();
}
