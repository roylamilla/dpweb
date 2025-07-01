<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> RALP </title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>
    <style>
        body {
            background-color: skyblue;
        }

        .nav-link {
            color: black;
        }

        .home {
            color: red;
        }

        .collapse {
            background-color: whitesmoke;
        }

        img {
            border: 1px solid black;
        }

        .card-header {
            background-color: silver;
            color: black;
        }

        .form-control {
            border: solid black;
        }

        #navbarSupportedContent{
            background-color:rgb(43, 255, 0);
        }
        #menu{
            background-color:rgb(255, 0, 0);
        }
    </style>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" id="menu">
            <a class="navbar-brand" href=""><img src="view/img/logo-lobo.jpg" alt="logo" width="80px" height="80px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo BASE_URL; ?>home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>new-user">User</a>
                        <!--
                        <a href="<?php echo BASE_URL; ?>new-user">User</a>
                        -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>category">category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>compras">Shops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>venta">Sales</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item dropdow">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                profile
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">logout</a></li>

                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="card">
            <center>   
                <h5 class="card-header">INGRESA TUS DATOS</h5>
            </center> 
            <form id="frm_user" action="" method="">
                <div class="card-body">
                    <div class="mb-3 row">

                        <div class="mb-3 row">
                            <label for="nro_identidad" class="col-sm-4 col-form-label"><strong>nro documento:</strong></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="razon_social" class="col-sm-4 col-form-label"><strong>razon social:</strong></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="razon_social" name="razon_social" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="telefono" class="col-sm-4 col-form-label"><strong>telefono:</strong></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="telefono" name="telefono" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="correo" class="col-sm-4 col-form-label"><strong>correo:</strong></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="departamento" class="col-sm-4 col-form-label"><strong>departamento:</strong></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="departamento" name="departamento" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="provincia" class="col-sm-4 col-form-label"><strong>provincia:</strong></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="provincia" name="provincia" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="distrito" class="col-sm-4 col-form-label"><strong>distrito:</strong></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="distrito" name="distrito" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="cod_postal" class="col-sm-4 col-form-label"><strong>cod postal:</strong></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="cod_postal" name="cod_postal" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="direccion" class="col-sm-4 col-form-label"><strong>direccion:</strong></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="rol" class="col-sm-4 col-form-label"><strong>rol:</strong></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="rol" id="rol" required>
                                    <option value="" disabled selected>seleccione</option>
                                    <option value="administrador">administrador</option>
                                    <option value="vendedor">vendedor</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="<?php echo BASE_URL; ?>view/funtion/user.js"></script>
<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- importar sweet aler 2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>