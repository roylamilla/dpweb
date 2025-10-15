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
                    background: linear-gradient(45deg, #0ef, #c800ff);
                    background-size: 100%;
                    background-attachment: fixed;
                    background-repeat: no-repeat;
                }

                img {
                    border-radius: 20px;
                    width: 300px;
                    height: 300px;
                }
            </style>



            <div class="home">
                <section class="principal" style="height: 200px;">
                    <div class="cuadro">
                        <strong>users</strong>
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
                        /*
                        flex-wrap: wrap;
                        display: flex;
                        background-color: transparent;
                        */
                        
                        display: grid;
                        grid-template-columns: repeat(3, 1fr);
                        grid-template-rows: repeat(3, 1fr);
                        gap: 10px;
                        }

                        .cuadro {
                            background-color: lightseagreen;
                            /*border: 5px black solid;*/
                            width: 300px;
                            height: 300px;
                            border-radius: 20px;
                            margin-top: 20px;
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