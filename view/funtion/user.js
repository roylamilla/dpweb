function validar_form(tipo) {
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
    if (tipo == "nuevo") {
        registrarUsuario();
    }
    if (tipo == "actualizar") {
        actualizarUsuario();
    }
}

if (document.querySelector('#frm_user')) {
    //Evita que se envíe el formulario
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
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
        json = await respuesta.json();
        contenidot = document.getElementById('content_user');
        if (json.status) {
            let cont = 1;
            json.data.forEach(usuario => {
                if (usuario.estado == 1) {
                    estado = "activo";
                } else {
                    estado = "inactivo";
                }
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + usuario.id;
                nueva_fila.className = "filas_tabla";
                nueva_fila.innerHTML = `
                            <td>${cont}</td>
                            <td>${usuario.nro_identidad}</td>
                            <td>${usuario.razon_social}</td>
                            <td>${usuario.correo}</td>
                            <td>${usuario.rol}</td>
                            <td>${estado}</td>
                            <td>
                                <a href="`+ base_url + `edit-user/` + usuario.id + `">Editar</a>
                                <button class="btn btn-danger" onclick="fn_eliminar(` + usuario.id + `);">Eliminar</button>
                            </td>
                `;
                cont++;
                contenidot.appendChild(nueva_fila);
            });
        }
    } catch (error) {
        console.log('error en mostrar usuario ' + e);
    }
}
if (document.getElementById('content_user')) {
    view_users();
}

//eliminar
async function fn_eliminar(id) {
    if (window.confirm("Confirmar eliminar?")) {
        eliminar(id);
    }
}
async function eliminar(id) {
    let datos = new FormData();
    datos.append('id_persona', id);
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=eliminar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Oooooops, ocurrio un error al eliminar persona, intentelo mas tarde");
        console.log(json.msg);
        return;
    }else{
        alert(json.msg);
        location.replace(base_url + 'users');
    }
}
/*async function view_users() {
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
                    <a href="`+ base_url + `edit-user/` + user.id + `" class="btn btn-success">Editar</a>
                    <br>
                    <button data-id="${user.id}" class="btn btn-eliminar btn-danger">Eliminar</button>
                </td>
                
            `;
            
            content_users.appendChild(fila);
        });

        // Agrega el evento click a los botones de eliminar
        document.querySelectorAll('.btn-eliminar').forEach(btn => {
            btn.addEventListener('click', async function () {
                if (confirm('¿Está seguro de eliminar este usuario?')) {
                    const datos = new FormData();
                    datos.append('id', this.getAttribute('data-id'));
                    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=eliminar', {
                        method: 'POST',
                        mode: 'cors',
                        cache: 'no-cache',
                        body: datos
                    });
                    let json = await respuesta.json();
                    alert(json.msg);
                    if (json.status) {
                        view_users(); // Recarga la lista
                    }
                }
            });
        });

    } catch (error) {
        console.log('Error al obtener usuarios, No hay nada: ' + error);
    }
}
if (document.getElementById('content_user')) {
    view_users();
} */

/*para editar usuario */
async function edit_user() {
    try {
        let id_persona = document.getElementById('id_persona').value;
        const datos = new FormData();
        datos.append('id_persona', id_persona);

        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (!json.status) {
            alert(json.msg);
            return;
        }
        document.getElementById('nro_identidad').value = json.data.nro_identidad;
        document.getElementById('razon_social').value = json.data.razon_social;
        document.getElementById('telefono').value = json.data.telefono;
        document.getElementById('correo').value = json.data.correo;
        document.getElementById('departamento').value = json.data.departamento;
        document.getElementById('provincia').value = json.data.provincia;
        document.getElementById('distrito').value = json.data.distrito;
        document.getElementById('cod_postal').value = json.data.cod_postal;
        document.getElementById('direccion').value = json.data.direccion;
        document.getElementById('rol').value = json.data.rol;
        document.getElementById('estado').value = json.data.estado;

    } catch (error) {
        console.log('oops, ocurrio un error ' + error);
    }
}

if (document.querySelector('#frm_edit_user')) {
    //evita que se envie el formulario
    let frm_user = document.querySelector('#frm_edit_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}
//actualizar usuario
async function actualizarUsuario() {
    const datos = new FormData(frm_edit_user);
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Oops, ocurrio un error al actualizar, intente nuevamente");
        console.log(json.msg);
        return;
    } else {
        alert(json.msg);
    }
}


//para eliminar usuario
/*async function fn_eliminar(id) {
    if (window.confirm("confirmar eliminar")) {
        eliminar(id);
    }
}

async function eliminar(id) {
    let datos = new FormData();
    datos.append('id_persona', id);
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=eliminar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("");
        console.log(json.msg);
        return;
    } else {
        alert(json.msg)
        location.replace(base_url + 'users');
    }
}*/




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





/*
// ver clientes
async function view_clientes() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_clientes', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        contenidot = document.getElementById('content_clientes');
        if (json.status) {
            let cont = 1;
            json.data.forEach(usuario => {
                if (usuario.estado == 1) {
                    estado = "activo";
                } else {
                    estado = "inactivo";
                }
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + usuario.id;
                nueva_fila.className = "filas_tabla";
                nueva_fila.innerHTML = `
                            <td>${cont}</td>
                            <td>${usuario.nro_identidad}</td>
                            <td>${usuario.razon_social}</td>
                            <td>${usuario.correo}</td>
                            <td>${usuario.rol}</td>
                            <td>${estado}</td>
                            <td>
                                <a href="`+ base_url + `edit-user/` + usuario.id + `">Editar</a>
                                <button class="btn btn-danger" onclick="fn_eliminar(` + usuario.id + `);">Eliminar</button>
                            </td>
                `;
                cont++;
                contenidot.appendChild(nueva_fila);
            });
        }
    } catch (error) {
        console.log('error en mostrar usuario ' + e);
    }
}
if (document.getElementById('content_clientes')) {
    view_clientes();
}

//registrar cliente
function validar_form(tipo) {
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
        Swal.fire({
            title: "Error campos vacios!",
            icon: "Error",
            draggable: true
        });
        return;
    }
    if (tipo == "nuevo") {
        registrarCliente();
    }
    if (tipo == "actualizar") {
        actualizarCliente();
    }

}

if (document.querySelector('#frm_cliente')) {
    // evita que se envie el formulario
    let frm_client = document.querySelector('#frm_cliente');
    frm_client.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}
async function registrarCliente() {
    try {
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_cliente);
        //enviar datos a controlador
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        // validamos que json.status sea = True
        if (json.status) { //true
            alert(json.msg);
            document.getElementById('frm_cliente').reset();
        } else {
            alert(json.msg);
        }
    } catch (e) {
        console.log("Error al registrar Cliente:" + e);
    }
}

// actualizar cliente
//para editar usuario 
async function edit_cliente() {
    try {
        let id_persona = document.getElementById('id_persona').value;
        const datos = new FormData();
        datos.append('id_persona', id_persona);

        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (!json.status) {
            alert(json.msg);
            return;
        }
        document.getElementById('nro_identidad').value = json.data.nro_identidad;
        document.getElementById('razon_social').value = json.data.razon_social;
        document.getElementById('telefono').value = json.data.telefono;
        document.getElementById('correo').value = json.data.correo;
        document.getElementById('departamento').value = json.data.departamento;
        document.getElementById('provincia').value = json.data.provincia;
        document.getElementById('distrito').value = json.data.distrito;
        document.getElementById('cod_postal').value = json.data.cod_postal;
        document.getElementById('direccion').value = json.data.direccion;
        document.getElementById('rol').value = json.data.rol;
        document.getElementById('estado').value = json.data.estado;

    } catch (error) {
        console.log('oops, ocurrio un error ' + error);
    }
}

if (document.querySelector('#frm_edit_cliente')) {
    //evita que se envie el formulario
    let frm_user = document.querySelector('#frm_edit_cliente');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}
//actualizar usuario
async function actualizarUsuario() {
    const datos = new FormData(frm_edit_cliente);
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Oops, ocurrio un error al actualizar, intente nuevamente");
        console.log(json.msg);
        return;
    } else {
        alert(json.msg);
    }
}





// ver proveedores
async function view_proveedor() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_proveedores', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        json = await respuesta.json();
        contenidot = document.getElementById('content_proveedor');
        if (json.status) {
            let cont = 1;
            json.data.forEach(usuario => {
                if (usuario.estado == 1) {
                    estado = "activo";
                } else {
                    estado = "inactivo";
                }
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + usuario.id;
                nueva_fila.className = "filas_tabla";
                nueva_fila.innerHTML = `
                            <td>${cont}</td>
                            <td>${usuario.nro_identidad}</td>
                            <td>${usuario.razon_social}</td>
                            <td>${usuario.correo}</td>
                            <td>${usuario.rol}</td>
                            <td>${estado}</td>
                            <td>
                                <a href="`+ base_url + `edit-user/` + usuario.id + `">Editar</a>
                                <button class="btn btn-danger" onclick="fn_eliminar(` + usuario.id + `);">Eliminar</button>
                            </td>
                `;
                cont++;
                contenidot.appendChild(nueva_fila);
            });
        }
    } catch (error) {
        console.log('error en mostrar usuario ' + e);
    }
}
if (document.getElementById('content_proveedor')) {
    view_proveedor();
}


*/
