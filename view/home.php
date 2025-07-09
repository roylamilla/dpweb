<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <center>
                <h1 class="card-header">BIENVENIDO</h1>
            </center>
            <style>
                h1 {
                    color: white;
                }

                body {
                    background-image: url('view/img/bambu.jpg');
                    height: 100%;
                    width: 100%;
                    background-size: 100%;
                }

                /*
                body {
                    margin: 0;
                    padding: 0;
                    background-image: url('view/img/bambu.jpg');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    height: 100vh;
                    width: 100vw;
                }*/
                
                img{
                    width: 200px;
                    height: 200px;
                }
            
            </style>

            <div class="home">
                <section class="principal" style="height: 200px;">
                    <div class="cuadro">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>new-user"><strong>User</strong></a>
                        <img src="view/img/lena.jpeg" alt="">
                    </div>

                    <div class="cuadro">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>products"><strong>Products</strong></a>
                    </div>

                    <div class="cuadro">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>category"><strong>Category</strong></a>
                    </div>

                    <div class="cuadro">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>compras"><strong>Shops</strong></a>
                    </div>

                    <div class="cuadro">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>detalle_venta"><strong>detalle_venta</strong></a>
                    </div>

                    <div class="cuadro">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>pagos"><strong>Pagos</strong></a>
                    </div>

                    <div class="cuadro">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>ventas"><strong>Ventas</strong></a>
                    </div>

                </section>
                <style>
                    .principal {
                        flex-wrap: wrap;
                        display: flex;
                        background-color: transparent;
                    }

                    .cuadro {
                        background-color: greenyellow;
                        border: 5px black solid;
                        width: 200px;
                        height: 200px;
                        margin: 1%;
                    }

                    strong {
                        color: black;
                        margin: 40%;
                    }
                </style>

            </div>
        </div>
    </div>
</body>

</html>