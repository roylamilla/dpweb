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
    <style>
        body {
            background: linear-gradient(135deg, #1a2a6c, #2a3a7c, #3a4a8c);
            /*background: linear-gradient(45deg, #0ef, #c800ff);*/
            background-size: 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
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

        #navbarSupportedContent {
            background: linear-gradient(135deg, #1a2a6c, #2a3a7c, #3a4a8c);
        }

        #menu {

            background: linear-gradient(135deg, #1a2a6c, #2a3a7c, #3a4a8c);
        }

        .card-body {
            background: linear-gradient(135deg, #1a2a6c, #2a3a7c, #3a4a8c);
            background-size: 100%;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        strong {
            color: white;
        }

        .btn {
            border: 2px white solid;
        }

        .nav-link {
            font-family: fantasy;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" id="menu">
            <a class="navbar-brand" href="">
                <h1 style="color: white;">LR</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo BASE_URL; ?>home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>users">Users</a>
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
                        <a class="nav-link" href="<?php echo BASE_URL; ?>cliente">Clientes</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>compras">Shops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>venta">Sales</a>
                    </li>
                    -->

                </ul>
                <form class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdow">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                profile
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><button type="button" onclick="cerrar_sesion();">cerrar_sesion</button></li>
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>