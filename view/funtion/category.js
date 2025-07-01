function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;

    if (nombre == "" || detalle == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            background: "#fff url(view/img/cat.gif) center top 20% no-repeat",
            text: "Error: Campos Vacios!",
            footer: '<a> Es necesario rellenar todos los campos </a>'
        });
        return;
    }
    registrarCategoria();


}

if (document.querySelector('#frm_category')) {
    //Evita que se envíe el formulario
    let frm_category = document.querySelector('#frm_category');
    frm_category.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}

async function registrarCategoria() {
    try {
        // capturar campos de formulario(HTML)
        const datos = new FormData(frm_category);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_category').reset();
        } else {
            alert(json.msg);
        }

    } catch (error) {
        console.log("Error al registrar usuario:" + error);
    }
}

