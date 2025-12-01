function validar_form(tipo) {
    let codigo = document.getElementById("codigo").value;
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    let precio = document.getElementById("precio").value;
    let stock = document.getElementById("stock").value;
    let id_categoria = document.getElementById("id_categoria").value;
    let fecha_vencimiento = document.getElementById("fecha_vencimiento").value;
    //let imagen = document.getElementById("imagen").value;
    let id_proveedor = document.getElementById("id_proveedor").value;

    if (codigo == "" || nombre == "" || detalle == "" || precio == "" || stock == "" || id_categoria == "" || fecha_vencimiento == "" || id_proveedor == "") {
        Swal.fire({
            title: "Error campos vacios!",
            icon: "Error",
            draggable: true
        });
        return;
    }
    if (tipo == "nuevo") {
        registrarProducto();
    }
    if (tipo == "actualizar") {
        actualizarProducto();
    }


}

if (document.querySelector('#frm_products')) {
    //Evita que se envíe el formulario
    let frm_products = document.querySelector('#frm_products');
    frm_products.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}

async function registrarProducto() {
    try {
        // capturar campos de formulario(HTML)
        const datos = new FormData(frm_products);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_products').reset();
        } else {
            alert(json.msg);
        }

    } catch (error) {
        console.log("Error al registrar producto:" + error);
    }
}
//

/* para ver productos registrados */
async function view_products() {
    try {
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();
        let content_products = document.getElementById('content_product');
        content_products.innerHTML = ''; // limpiamos antes de insertar

        json.forEach((product, index) => {
            let fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${index + 1}</td>
                <td>${product.codigo}</td>
                <td>${product.nombre}</td>
                <td>${product.detalle}</td>
                <td>${product.precio}</td>
                <td>${product.stock}</td>
                <td>${product.id_categoria}</td>
                <td>${product.id_proveedor}</td>
                <td><svg id="barcode${product.id}"></svg></td>
                <td>
                    <a href="` + base_url + `edit-products/` + product.id + `" class="btn btn-success">Editar</a>
                    <br>
                    <button data-id="${product.id}" class="btn btn-eliminar btn-danger">Eliminar</button>
                </td>
            `;
            content_products.appendChild(fila);

            JsBarcode("#barcode" + product.id, "" + product.codigo, {
                //lineColor: "rgba(0, 140, 255, 1)",
                width: 2,
                height: 25,
            });
        });

        // Agrega el evento click a los botones de eliminar
        document.querySelectorAll('.btn-eliminar').forEach(btn => {
            btn.addEventListener('click', async function () {
                if (confirm('¿Está seguro de eliminar este producto?')) {
                    const datos = new FormData();
                    datos.append('id', this.getAttribute('data-id'));
                    let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=eliminar', {
                        method: 'POST',
                        mode: 'cors',
                        cache: 'no-cache',
                        body: datos
                    });
                    let json = await respuesta.json();
                    alert(json.msg);
                    if (json.status) {
                        view_products(); // Recarga la lista
                    }
                }
            });
        });

    } catch (error) {
        console.log('Error al obtener productos: ' + error);
    }
}

// Cargar productos al cargar la página
if (document.getElementById('content_product')) {
    view_products();
}

/* para editar producto */
async function edit_product() {
    try {
        let id_producto = document.getElementById('id_producto').value;
        const datos = new FormData();
        datos.append('id_producto', id_producto);

        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        if (!json.status) {
            alert(json.msg);
            return;
        }

        // Llenar el formulario con los datos del producto
        document.getElementById('codigo').value = json.data.codigo;
        document.getElementById('nombre').value = json.data.nombre;
        document.getElementById('detalle').value = json.data.detalle;
        document.getElementById('precio').value = json.data.precio;
        document.getElementById('stock').value = json.data.stock;
        document.getElementById('id_categoria').value = json.data.id_categoria;
        document.getElementById('fecha_vencimiento').value = json.data.fecha_vencimiento;
        document.getElementById('imagen').value = json.data.imagen;
        document.getElementById('id_proveedor').value = json.data.id_proveedor;

    } catch (error) {
        console.log('Error al cargar producto: ' + error);
    }
}

// Evento para formulario de edición
if (document.querySelector('#frm_edit_products')) {
    let frm_products = document.querySelector('#frm_edit_products');
    frm_products.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}


// Validar y actualizar producto
async function actualizarProducto() {
    const datos = new FormData(frm_edit_products);
    let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if (!json.status) {
        alert("Error al actualizar producto: " + json.msg);
        return;
    } else {
        alert(json.msg);
    }
}



// para eliminar producto
async function fn_eliminar(id) {
    if (window.confirm("¿Confirmar eliminar?")) {
        eliminar(id);
    }
}

async function eliminar(id) {
    let datos = new FormData();
    datos.append('id', id);
    let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=eliminar', {
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
        location.replace(base_url + 'products');
    }
}

//cargar categorias y proveedores en el formulario

async function cargar_categorias() {
    let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver_categorias', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache'
    });
    let json = await respuesta.json();
    let contenido = '<option>Seleccione Categoria</option>';
    json.data.forEach(categoria => {
        contenido += '<option value="' + categoria.id + '">' + categoria.nombre + '</option>';
    });
    //console.log(contenido);
    document.getElementById("id_categoria").innerHTML = contenido;
}


async function cargar_proveedores() {
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_proveedores', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache'
    });
    let json = await respuesta.json();
    let contenido = '<option>Seleccione Proveedor</option>';
    json.data.forEach(persona => {
        contenido += '<option value="' + persona.id + '">' + persona.razon_social + ' -> ' + persona.rol + '</option>';
    });
    //console.log(contenido);
    document.getElementById("id_proveedor").innerHTML = contenido;
}


//mostrar imagenes de los productos

async function view_imagen() {
    try {
        let dato = document.getElementById('buscar_producto').value;
        const datos = new FormData();
        datos.append('dato', dato);
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=buscar_producto_venta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        product_imagens = document.getElementById('product-imagen');
        product_imagens.innerHTML = ''; // limpiamos antes de insertar

        json.forEach((product, index) => {
            let card = document.createElement('div');
            card.classList.add('card-product');
            card.innerHTML = `
                <div>${index + 1}</div>
                <img src="${product.imagen}" alt="${product.nombre}">
                <div class="nombre">${product.nombre}</div>
                <div class="detalle">${product.detalle}</div>
                <div class="precio"> <p>precio:</p>
                <span>${product.precio}</span>
                </div>

                <div style="display: flex; gap: 4px;">
                <button class="btn-carrito"><i class="fas fa-shopping-cart"></i>🛒Carrito</button>
                <button class="btn-detalles">📒Detalles</button>
                </div>
                
            `;

            product_imagens.appendChild(card);
            let id = document.getElementById('id_producto_venta');
            let precio = document.getElementById('producto_precio-venta');
            let cantidad = document.getElementById('producto_cantidad-venta');
            id.value = product.id;
            precio.value = producto.precio;
            cantidad.value = 1;
        });


    } catch (error) {
        console.log('Error al obtener productos: ' + error);
    }
}

// Cargar productos al cargar la página
if (document.getElementById('product-imagen')) {
    view_imagen();
}

//buscar productos en venta
