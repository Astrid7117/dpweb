     function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    if (nombre == "" || detalle == "") {
        Swal.fire({
            title: "ERROR?",
            text: "¡Ups! Hay campos vacíos.",
            icon: "question"
        });
        return;
    }
    registrarCategoria();
}

if (document.querySelector('#frm_categories')) {
    let frm_categories = document.querySelector('#frm_categories');
    frm_categories.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}

async function registrarCategoria() {
    try {
        const datos = new FormData(frm_categories);
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            Swal.fire({
                title: json.msg,
                icon: "success",
                draggable: true
            });
           
            document.getElementById('frm_categories').reset();
        } else {
            Swal.fire({
                title: json.msg,
                icon: "error",
                draggable: false
            });
      
        }
    } catch (e) {
        console.log("Error al registrar Categoría: " + e);
    }
}