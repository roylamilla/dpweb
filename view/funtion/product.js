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
async function view_imagen() {
  try {
    // Enviar filtro para que el controlador filtre o retorne todos (según lógica del servidor)
    let formData = new FormData();
    formData.append('tipo', 'ver_productos');
    formData.append('filtro', filtro);

    let respuesta = await fetch(base_url + 'control/ProductoController.php', {
      method: 'POST',
      body: formData,
    });

    let json = await respuesta.json();

    const product_imagens = document.getElementById('product-imagen');
    const contador = document.getElementById('contador');
    product_imagens.innerHTML = ''; // limpiar

    if (!Array.isArray(json) || json.length === 0) {
      contador.textContent = 'No hay productos para mostrar.';
      return;
    }

    contador.textContent = `1 - ${json.length} de ${json.length} producto`;

    json.forEach(product => {
      
      const card = document.createElement('div');
      card.classList.add('card-product');

      card.innerHTML = `
        <img src="${product.imagen}" alt="${product.nombre}">
        <div class="marca">${product.nombre ?? ''}</div>
        <div class="descripcion">${product.nombre}<br>${product.detalle}</div>
        <div class="precio">
          <span>${precio}</span>
          ${precio_original ? `<span class="precio-original">${precio_original}</span>` : ''}
        </div>
      `;

      content_products.appendChild(card);
    });

  } catch (error) {
    console.error('Error al obtener productos:', error);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const filtroBtns = document.querySelectorAll('.filtros button');

  filtroBtns.forEach(btn => {
    btn.addEventListener('click', e => {
      filtroBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      view_products(btn.getAttribute('data-filtro'));
    });
  });

  // Carga inicial con mayor descuento
  view_products();
});*/


