<div class="container-fluid mt-4 row">

    <div class="container col-9">
        <div class="arriba">
            <h3 class="mt-3" style="color: white;">VISTA DE PRODUCTOS</h3>
            <h3 class="new-product">
                <a class="nav-link" href="<?php echo BASE_URL; ?>new-products">Nuevo Producto</a>
            </h3>
            <h3 class="new-product">
                <a class="nav-link" href="<?php echo BASE_URL; ?>products">Lista Producto</a>
            </h3>

        </div>
        <style>
            .arriba {
                gap: 5rem;
                display: flex;
            }

            .new-product {
                margin-top: 15px;
            }

            .product-view {
                margin-top: 15px;
            }

            .nav-link {
                color: white;
            }
        </style>
        <style>
            #product-imagen {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                /*display: flex;
                gap: 20px;
                overflow-x: auto;
                padding-bottom: 15px;*/
            }

            .card-product {
                background: white;
                border-radius: 10px;
                width: 180px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.68);
                padding: 10px;
                flex: 0 0 auto;
                position: relative;
                font-size: 14px;
            }

            .card-product img {
                width: 100%;
                height: 160px;
                object-fit: contain;
                border-radius: 8px;
                margin-bottom: 8px;
            }

            .card-product .nombre {
                font-weight: 700;
                text-transform: uppercase;
                font-size: 0.85rem;
                margin-bottom: 2px;
                color: #222;
            }

            .card-product .detalle {
                font-weight: 400;
                font-size: 0.85rem;
                line-height: 1.2em;
                height: 2.6em;
                overflow: hidden;
                margin-bottom: 8px;
                color: #444;
            }

            .card-product .precio {
                font-weight: 700;
                font-size: 1rem;
                color: #222;
                display: flex;
                align-items: baseline;
                gap: 6px;
            }

            .btn-carrito {
                padding: 4px 10px;
                background-color: #4800ffb1;
                /* Verde estándar */
                color: white;
                border: none;
                cursor: pointer;
                display: flex;
                align-items: center;
                gap: 4px;
                /* Espacio entre icono y texto */
            }

            .btn-carrito:hover {
                background-color: #0dff00ff;
                /* Verde más oscuro al pasar el mouse */
            }

            .btn-detalles {
                padding: 8px 12px;
                background-color: #007bffba;
                /* Azul para el botón de detalles */
                color: white;
                border: none;
                cursor: pointer;
            }

            .btn-detalles:hover {
                background-color: blue;
            }
        </style>

        <div class="card">
            <div class="card-body row" style="background: whitesmoke;">
                <h5 class="card-title col-md-4">Busqueda de Productos</h5>
                <div class="col-md-6">
                    <input type="text" id="buscar_producto" class="form-control col-md-12" placeholder="Buscar producto por nombre o código..." onkeyup="view_imagen();">
                    <input type="hidden" id="id_producto_venta">
                    <input type="hidden" id="producto_precio-venta">
                    <input type="hidden" id="producto_cantidad-venta" value="1">
                </div>
                <div class="responsive">
                    <div class="row container-fluid" id="product-imagen">
                        <div class="loading">Cargando productos...</div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--Sidebar carrito-->
    <div class="col-3">
        <div class="card">
            <div class="card-body" style="background: whitesmoke;">
                <h5 class="card-title">Lista de Compra</h5>
                <div class="row" style="min-height: 500px;">
                    <div class="col-12 table-responsive"> <!--responsive para el carrito-->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="lista_compra">
                                <tr>
                                    <td>Producto 1</td>
                                    <td>2</td>
                                    <td>$10.00</td>
                                    <td>$20.00</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm"><strong>❌</strong></button>
                                        <button class="btn btn-success btn-sm"><strong>➕</strong></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        <h4>Subtotal : <label id="">$20.00</label></h4>
                        <h4>Igv : <label id="">$20.00</label></h4>
                        <h4>Total : <label id="">$20.00</label></h4>
                        <button class="btn btn-success">Realizar Venta ✅</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="<?php echo BASE_URL; ?>view/funtion/product.js"></script>
<script src="<?php echo BASE_URL; ?>view/funtion/venta.js"></script>
<script>
    let input = document.getElementById("buscar_producto");
    input.addEventListener('keydown', (event) => {
        if (event.key == 'Enter') {
            agregar_producto_temporal();
        }
    })
</script>