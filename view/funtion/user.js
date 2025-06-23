function validar_form() {
    let nro_identidad = document.getElementById("nro_identidad").value;
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;

    if (nro_identidad == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            background: "#fff url(view/img/cat.gif) center top 20% no-repeat",
            text: "Error: Campos Vacios!",
            footer: '<a> Es necesario rellenar todos los campos </a>'
        });
        return;
    }
    Swal.fire({
        title: "Muy Bien!",
        text: "Vamos a registrar.",
        imageUrl: "view/img/sarcastic.gif",
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: "Custom image"
    });
    registrarUsuario();
}

if (document.querySelector('#frm_user')) {
    //Evita que se envíe el formulario
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}

async function registrarUsuario() {
    try {
        // capturar campos de formulario(HTML)
        const datos = new FormData(frm_user);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
    } catch (error) {
        console.log("Error al registrar usuario:" + error);
    }
}

