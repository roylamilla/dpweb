<div class="container">
    <div class="arriba">
        <h3 class="mt-3" style="color: white;">LISTA DE PRODUCTOS</h3>
        <h3 class="new-product">
            <a class="nav-link" href="<?php echo BASE_URL; ?>new-products">Nuevo Producto</a>
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

        .nav-link {
            color: white;
        }
    </style>

    <div class="responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th class="bg-white">Nro</th>
                    <th class="bg-white">Código</th>
                    <th class="bg-white">Nombre</th>
                    <th class="bg-white">Detalle</th>
                    <th class="bg-white">Precio</th>
                    <th class="bg-white">Stock</th>
                    <th class="bg-white">id_categoria</th>
                    <!--
                    <th class="bg-white">fecha_vencimiento</th>
                    -->
                    <th class="bg-white">id_proveedor</th>
                    <th class="bg-white">Acciones</th>
                </tr>
            </thead>
            <tbody id="content_product">

            </tbody>
        </table>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>view/funtion/product.js"></script>