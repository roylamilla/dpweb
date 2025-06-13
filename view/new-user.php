<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> RALP </title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <style>
        body {
            background-color: skyblue;
        }

        .nav-link {
            color: blue;
        }

        .collapse {
            background-color: skyblue;
        }

        img {
            border: 1px solid black;
        }

        .card-header {
            background-color: purple;
            color: white;
        }
    </style>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href=""><img src="view/img/logo-lobo.jpg" alt="logo" width="80px" height="80px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sales</a>
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
                <h5 class="card-header">titulo</h5>
            </center>
            <div class="card-body">
                <div class="mb-3 row">
                    
                    <div class="mb-3 row">
                        <label for="input_nro_doc" class="col-sm-4 col-form-label"><strong>numero de documento:</strong></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input_nro_doc">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_razon_social" class="col-sm-4 col-form-label"><strong>nombre razon social:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input_razon_social">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_telefono" class="col-sm-4 col-form-label"><strong>telefono:</strong></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input_telefono">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_email" class="col-sm-4 col-form-label"><strong>correo:</strong></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="input_email">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="input_departamento" class="col-sm-4 col-form-label"><strong>departamento:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input_Departamento">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_provincia" class="col-sm-4 col-form-label"><strong>provincia:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input_provincia">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_distrito" class="col-sm-4 col-form-label"><strong>distrito:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input_distrito">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_cod_pos" class="col-sm-4 col-form-label"><strong>codigo postal:</strong></label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="input_codigo_postal">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_direccion" class="col-sm-4 col-form-label"><strong>direccion:</strong></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input_direccion">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_rol" class="col-sm-4 col-form-label"><strong>rol:</strong></label>
                        <div class="col-sm-8">
                            <select class="form-control" require>
                                <option value=""disabled selected>seleccione</option>
                                <option value="administrador">administrador</option>
                                <option value="vendedor">vendedor</option>
                                <option value="3">estudiante</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_fecha" class="col-sm-4 col-form-label"><strong>fecha:</strong></label>
                        <div class="col-sm-8">
                            <input type="date" id="fecha" name="fecha">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="input_fecha" class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <a href="#" class="btn btn-primary">Registar</a>
                            <a href="#" class="btn btn-primary">Limpiar</a>
                            <a href="#" class="btn btn-primary">Cancelar</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>
<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>