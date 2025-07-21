<div class="container">
    <div class="arriba">
        <h3 class="mt-3" style="color: white;">LISTA DE USUARIOS</h3>
        <h3 class="new-user">
            <a class="nav-link" href="<?php echo BASE_URL; ?>products">new user</a>
        </h3>
    </div>
    <style>
        .arriba{
            gap: 5rem;
            display: flex;
        }
        .new-user{
            margin-top: 15px;
        }
    </style>

    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th class="bg-white">Nro</th>
                <th class="bg-white">DNI</th>
                <th class="bg-white">Nombres y apellidos</th>
                <th class="bg-white">Correo</th>
                <th class="bg-white">Rol</th>
                <th class="bg-white">Estado</th>
            </tr>
        </thead>
        <tbody id="content_user">

        </tbody>
    </table>
</div>
<script src="<?php echo BASE_URL; ?>view/funtion/user.js"></script>
<!--
<script>view_users();</script>-->

<!-- On cells (`td` or `th`) 
<tr>
    <td class="bg-primary">...</td>
    <td class="bg-success">...</td>
    <td class="bg-warning">...</td>
    <td class="bg-danger">...</td>
    <td class="bg-info">...</td>
</tr> -->