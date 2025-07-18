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
                    background-color: lightseagreen;
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

                img {
                    width: 300px;
                    height: 300px;
                }
            </style>

            <div class="home">
                <section class="principal" style="height: 200px;">
                    <div class="cuadro">
                        <strong>user</strong>
                        <a href="users">
                            <img src="view/home/user.png" alt="">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>products</strong>
                        <a href="products">
                            <img src="view/home/products.png" alt="">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>category</strong>
                        <a href="category">
                            <img src="view/home/category.png" alt="">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>shops</strong>
                        <a href="shops">
                            <img src="view/home/shops.png" alt="">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>detalle_venta</strong>
                        <a href="detalle_venta">
                            <img src="view/home/detalle.png" alt="">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>pagos</strong>
                        <a href="pagos">
                            <img src="view/home/pagos.png" alt="">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>ventas</strong>
                        <a href="ventas">
                            <img src="view/home/ventas.png" alt="">
                        </a>
                    </div>

                </section>
                <style>
                    .principal {
                        flex-wrap: wrap;
                        display: flex;
                        background-color: transparent;
                    }

                    .cuadro {
                        background-color: lightseagreen;
                        /*border: 5px black solid;*/
                        width: 300px;
                        height: 300px;
                        margin-top: 50px;
                        margin-right: 3%;
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