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
            alert(json.msg);
            document.getElementById('frm_categories').reset();
        } else {
            alert(json.msg);
        }
    } catch (e) {
        console.log("Error al registrar Categoría: " + e);
    }
}