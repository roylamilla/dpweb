<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Categoria </title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>
    <style>
        #menu{
            background-color:rgb(255, 0, 0);
        }
        #navbarSupportedContent{
            background-color:rgb(43, 255, 0);
        }

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
                        <a class="nav-link" href="<?php echo BASE_URL; ?>ventas">Sales</a>
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
                <h5 class="card-header">INGRESA LOS DATOS</h5>
            </center> 
            <form id="frm_category" action="" method="">
                <div class="card-body">
                    <div class="mb-3 row">

                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-4 col-form-label"><strong>nombre:</strong></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="detalle" class="col-sm-4 col-form-label"><strong>detalle:</strong></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="detalle" id="detalle"></textarea>
                                <!--
                                <input type="textarea" class="form-control" id="detalle" name="detalle" required>
                                -->
                            </div>
                            <style>
                                #detalle{
                                    height: 150px;
                                }
                            </style>
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
<script src="<?php echo BASE_URL; ?>view/funtion/category.js"></script>
<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- importar sweet aler 2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>