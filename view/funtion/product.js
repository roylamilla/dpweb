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
                <!--
                <td>${product.fecha_vencimiento}</td>
                -->
                <td>${product.id_proveedor}</td>
                <td>
                    <a href="` + base_url + `edit-products/` + product.id + `" class="btn btn-success">Editar</a>
                    <br>
                    <button data-id="${product.id}" class="btn btn-eliminar btn-danger">Eliminar</button>
                </td>
            `;

            content_products.appendChild(fila);
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
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();
        let product_imagens = document.getElementById('product-imagen');
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
        });


    } catch (error) {
        console.log('Error al obtener productos: ' + error);
    }
}

// Cargar productos al cargar la página
if (document.getElementById('product-imagen')) {
    view_imagen();
}

/*
//sidebar carrito de compras
// Contenedor del sidebar y botón cerrar
const sidebar = document.getElementById('sidebar-carrito');
const carritoItemsContainer = document.getElementById('carrito-items');
const closeSidebarBtn = document.getElementById('close-sidebar');

// Objeto para almacenar productos en el carrito
let carrito = {};

// Función para actualizar la vista del carrito en el sidebar
function renderCarrito() {
    carritoItemsContainer.innerHTML = '';

    const keys = Object.keys(carrito);
    if (keys.length === 0) {
        carritoItemsContainer.innerHTML = '<p>Tu carrito está vacío</p>';
        return;
    }

    keys.forEach(key => {
        const item = carrito[key];
        const itemDiv = document.createElement('div');

        itemDiv.innerHTML = `
            <div class="item-info">
                <p><strong>${item.nombre}</strong></p>
                <p>Precio: $${item.precio}</p>
                <p>Cantidad: ${item.cantidad}</p>
            </div>
            <button class="eliminar" data-id="${key}">Eliminar</button>
        `;

        carritoItemsContainer.appendChild(itemDiv);
    });

    // Agregar evento a botones eliminar
    carritoItemsContainer.querySelectorAll('button.eliminar').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            delete carrito[id];
            renderCarrito();
        });
    });
}

// Mostrar sidebar
function showSidebar() {
    sidebar.classList.add('show');
}

// Ocultar sidebar
function hideSidebar() {
    sidebar.classList.remove('show');
}

// Agregar funcionalidad a botones Carrito de cada producto
function setupCarritoButtons() {
    const btnsCarrito = document.querySelectorAll('.btn-carrito');
    btnsCarrito.forEach((btn, idx) => {
        btn.addEventListener('click', () => {
            // Obtener datos del producto
            const card = btn.closest('.card-product');
            const nombre = card.querySelector('.nombre').innerText;
            const precioText = card.querySelector('.precio span').innerText;
            const precio = parseFloat(precioText);

            // Para simplificar se usa el índice como id
            const id = `producto_${idx}`;

            // Si producto ya existe, aumentar cantidad
            if (carrito[id]) {
                carrito[id].cantidad += 1;
            } else {
                carrito[id] = {
                    nombre,
                    precio,
                    cantidad: 1,
                };
            }

            renderCarrito();
            showSidebar();
        });
    });
}

// Evento botón cerrar sidebar
closeSidebarBtn.addEventListener('click', () => {
    hideSidebar();
});

// Luego de cargar productos, agregar evento a botones carrito
async function view_imagen() {
    try {
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();
        let product_imagens = document.getElementById('product-imagen');
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
        });

        // Después de renderizar, asignar eventos a botones carrito:
        setupCarritoButtons();

    } catch (error) {
        console.log('Error al obtener productos: ' + error);
    }
}

//total de productos en el carrito y precios
function renderCarrito() {
    carritoItemsContainer.innerHTML = '';

    const keys = Object.keys(carrito);
    if (keys.length === 0) {
        carritoItemsContainer.innerHTML = '<p>Tu carrito está vacío</p>';
        document.getElementById('carrito-totales').style.display = 'none';
        return;
    }

    let subtotal = 0;

    keys.forEach(key => {
        const item = carrito[key];
        const itemDiv = document.createElement('div');

        const itemTotal = item.precio * item.cantidad;
        subtotal += itemTotal;

        itemDiv.innerHTML = `
            <div class="item-info">
                <p><strong>${item.nombre}</strong></p>
                <p>Precio: $${item.precio.toFixed(2)}</p>
                <p>Cantidad: ${item.cantidad}</p>
                <p>Subtotal: $${itemTotal.toFixed(2)}</p>
            </div>
            <button class="eliminar" data-id="${key}">Eliminar</button>
        `;

        carritoItemsContainer.appendChild(itemDiv);
    });

    // Mostrar totales
    const igv = subtotal * 0.18;
    const total = subtotal + igv;

    document.getElementById('subtotal').textContent = subtotal.toFixed(2);
    document.getElementById('igv').textContent = igv.toFixed(2);
    document.getElementById('total').textContent = total.toFixed(2);

    document.getElementById('carrito-totales').style.display = 'block';

    // Eventos para eliminar producto
    carritoItemsContainer.querySelectorAll('button.eliminar').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = e.target.getAttribute('data-id');
            delete carrito[id];
            renderCarrito();
        });
    });
}
*/

