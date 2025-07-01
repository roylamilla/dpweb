function validar_form() {
    let id_producto = document.getElementById("id_producto").value;
    let cantidad = document.getElementById("cantidad").value;
    let precio = document.getElementById("precio").value;
    let id_trabajador = document.getElementById("id_trabajador").value;
    

    if (id_producto == "" || cantidad == "" || precio == "" || id_trabajador == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            background: "#fff url(view/img/cat.gif) center top 20% no-repeat",
            text: "Error: Campos Vacios!",
            footer: '<a> Es necesario rellenar todos los campos </a>'
        });
        return;
    }
    registrarCompra();


}

if (document.querySelector('#frm_shops')) {
    //Evita que se envíe el formulario
    let frm_shops = document.querySelector('#frm_shops');
    frm_shops.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}

async function registrarCompra() {
    try {
        // capturar campos de formulario(HTML)
        const datos = new FormData(frm_shops);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/CompraController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_shops').reset();
        } else {
            alert(json.msg);
        }

    } catch (error) {
        console.log("Error al registrar compra:" + error);
    }
}

