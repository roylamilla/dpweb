<div class="container">
    <div class="arriba">
        <h3 class="mt-3" style="color: white;">LISTA DE PRODUCTOS</h3>
        <h3 class="new-product">
            <a class="nav-link" href="<?php echo BASE_URL; ?>new-products">Nuevo Producto</a>
        </h3>
        <h3 class="product-view">
            <a class="nav-link" href="<?php echo BASE_URL; ?>venta">Imagen Productos</a>
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

        .product-view{
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
                    <th class="bg-white">categoria</th>
                    <th class="bg-white">proveedor</th>
                    <th class="bg-white">Codigo Barra</th>
                    <th class="bg-white">Acciones</th>
                </tr>
            </thead>
            <tbody id="content_product">

            </tbody>
        </table>
    </div>
</div>

<script src="<?php echo BASE_URL; ?>view/funtion/product.js"></script>
<script src="<?= BASE_URL ?>view/funtion/JsBarcode.all.min.js"></script>