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
        let json = await respuesta.json();
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_user').reset();
        } else {
            alert(json.msg);
        }

    } catch (error) {
        console.log("Error al registrar usuario:" + error);
    }
}


async function iniciar_sesion() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (username == "" || password == "") {
        alert("Error: campos vacios!");
        return;
    }
    /* try catch: capturador de errores*/
    try {
        const datos = new FormData(frm_login);
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=iniciar_sesion', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            location.replace(base_url + 'home');
        } else {
            alert(json.msg);
        }

    } catch (error) {
        console.log(error);
    }
}


/* para ver usuarios registrados */
async function view_users() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_usuarios', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();
        let content_users = document.getElementById('content_user');
        content_users.innerHTML = ''; // limpiamos antes de insertar

        json.forEach((user, index) => {
            let fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${index + 1}</td>
                <td>${user.nro_identidad}</td>
                <td>${user.razon_social}</td>
                <td>${user.correo}</td>
                <td>${user.rol}</td>
                <td>${user.estado}</td>
                <td>
                    <a href="`+ base_url + `edit_user/`+user.id+`">Editar</a>
                </td>
            `;
            
            content_users.appendChild(fila);
        })
    } catch (error) {
        console.log('Error al obtener usuarios, No hay nada: ' + error);
    }
}
if (document.getElementById('content_user')) {
    view_users();
}



/*para cerrar sesion */
async function cerrar_sesion() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=cerrar_sesion', {
            method: 'GET', // O POST si prefieres más seguridad
            mode: 'cors',
            cache: 'no-cache',
        });
        let json = await respuesta.json();
        if (json.status) {
            location.replace(base_url + 'login'); // Redirige al login u otra página
        } else {
            alert("No se pudo cerrar sesión: " + json.msg);
        }
    } catch (error) {
        console.log("Error al cerrar sesión:", error);
    }
}


