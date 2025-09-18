
<div class="container">
    <div class="arriba">
        <h3 class="mt-3" style="color: white;">LISTA DE CATEGORIAS</h3>
        <h3 class="new-user">
            <a class="nav-link" href="<?php echo BASE_URL; ?>new-category">new category</a>
        </h3>
    </div>
    <style>
        .arriba {
            gap: 5rem;
            display: flex;
        }

        .new-user {
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
                    <th class="bg-white">Nombre</th>
                    <th class="bg-white">Detalles</th>
                    <th class="bg-white">Acciones</th>
                </tr>
            </thead>
            <tbody id="content_category">

            </tbody>
        </table>
    </div>

</div>
<script src="<?php echo BASE_URL; ?>view/funtion/category.js"></script>
<!--
<script>view_users();</script>-->