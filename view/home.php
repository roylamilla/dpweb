<!--
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
                    text-align: center;
                    margin-bottom: 30px;
                    font-size: 2.5rem;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                }

                .card-header {
                    background-color: lightseagreen;
                    color: white;
                }

                body {
                    background: linear-gradient(45deg, #0ef, #c800ff);
                    background-size: 100%;
                    background-attachment: fixed;
                    background-repeat: no-repeat;
                    padding: 20px;
                    line-height: 1.6;
                }
            </style>
        </div>

        <style>
            /* Estilos generales */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
            }

            /* Grid de categorías */
            .categorias-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            .categoria {
                background-color: white;
                border-radius: 10px;
                padding: 25px 20px;
                text-align: center;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                cursor: pointer;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 220px;
            }

            .categoria:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
            }

            .categoria h2 {
                font-size: 1.3rem;
                color: #2c3e50;
                font-weight: 600;
                margin: 0;
            }

            /* Colores para diferentes categorías */
            .categoria:nth-child(1) {
                border-top: 5px solid #1100ffff;
            }

            .categoria:nth-child(2) {
                border-top: 5px solid #ff1900ff;
            }

            .categoria:nth-child(3) {
                border-top: 5px solid #00ff55ff;
            }

            .categoria:nth-child(4) {
                border-top: 5px solid #ff9d00ff;
            }

            .categoria:nth-child(5) {
                border-top: 5px solid #ff00eaff;
            }

            .categoria:nth-child(6) {
                border-top: 5px solid #00d9ffff;
            }

            .categoria:nth-child(7) {
                border-top: 5px solid #ff6600ff;
            }

            .categoria:nth-child(8) {
                border-top: 5px solid #ffe600ff;
            }

            .categoria:nth-child(9) {
                border-top: 5px solid #0400ffff;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .categorias-grid {
                    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                    gap: 15px;
                }

                h1 {
                    font-size: 2rem;
                }

                .categoria {
                    padding: 20px 15px;
                    min-height: 100px;
                }

                .categoria h2 {
                    font-size: 1.1rem;
                }
            }

            @media (max-width: 500px) {
                .categorias-grid {
                    grid-template-columns: 1fr;
                    gap: 12px;
                }

                h1 {
                    font-size: 1.8rem;
                }

                .categoria {
                    padding: 18px 15px;
                    min-height: 90px;
                }
            }
        </style>


        <body>
            <div class="container">
                <div class="categorias-grid">
                    <div class="categoria">
                        <a href="users">
                            <h2>USUARIOS</h2>
                        </a>
                    </div>
                    <div class="categoria">
                        <a href="products">
                            <h2>CLIENTES</h2>
                        </a>
                    </div>
                    <div class="categoria">
                        <a href="category">
                            <h2>PROVEEDORES</h2>
                        </a>
                    </div>
                    <div class="categoria">
                        <a href="cliente">
                            <h2>PRODUCTO</h2>
                        </a>
                    </div>
                    <div class="categoria">
                        <a href="proveedor">
                            <h2>CATEGORIAS</h2>
                        </a>
                    </div>
                    <div class="categoria">
                        <a href="venta">
                            <h2>VENTAS</h2>
                        </a>
                    </div>
                    <div class="categoria">
                        <a href="pagos">
                            <h2>PAGOS</h2>
                        </a>
                    </div>
                </div>
            </div>
        </body>

</html>

</div>
</body>
</html>-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Comercial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1a2a6c, #2a3a7c, #3a4a8c);
            color: #fff;
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            /*margin-bottom: 40px;*/
            padding: 30px 20px;
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            font-size: 1.3rem;
            color: #e0e0e0;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /*
        .stats {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 40px 0;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        */

        /*
        .stat-item {
            text-align: center;
            padding: 20px;
            min-width: 150px;
        }
        */

        /*
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #4fc3f7;
            margin-bottom: 10px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            font-size: 1rem;
            color: #e0e0e0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        */

        .admin-panel {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            /*margin-top: 30px;*/
        }

        .admin-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
        }

        .admin-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.15);
        }

        .admin-icon {
            font-size: 2.8rem;
            margin-right: 20px;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            flex-shrink: 0;
        }

        .users .admin-icon {
            background: linear-gradient(135deg, #3498db, #2980b9);
        }

        .products .admin-icon {
            background: linear-gradient(135deg, #2ecc71, #27ae60);
        }

        .clients .admin-icon {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }

        .suppliers .admin-icon {
            background: linear-gradient(135deg, #f39c12, #d35400);
        }

        .categories .admin-icon {
            background: linear-gradient(135deg, #9b59b6, #8e44ad);
        }

        .sales .admin-icon {
            background: linear-gradient(135deg, #1abc9c, #16a085);
        }

        .payments .admin-icon {
            background: linear-gradient(135deg, #34495e, #2c3e50);
        }

        .card-content h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #fff;
        }

        .card-content p {
            color: #e0e0e0;
            font-size: 1rem;
            line-height: 1.5;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .admin-panel {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.2rem;
            }

            .subtitle {
                font-size: 1.1rem;
            }

            .stats {
                padding: 20px;
            }

            .stat-item {
                min-width: 120px;
                padding: 15px 10px;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .admin-card {
                padding: 25px 20px;
            }

            .admin-icon {
                width: 70px;
                height: 70px;
                font-size: 2.2rem;
            }
        }

        @media (max-width: 600px) {
            .stats {
                flex-direction: column;
                align-items: center;
            }

            .stat-item {
                width: 100%;
                max-width: 200px;
                margin-bottom: 10px;
            }

            .admin-panel {
                grid-template-columns: 1fr;
            }

            .admin-card {
                flex-direction: column;
                text-align: center;
            }

            .admin-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .admin-card {
                padding: 20px 15px;
            }
        }

        footer {
            text-align: center;
            margin-top: 60px;
            padding: 20px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Sistema de Gestión Comercial</h1>
            <p class="subtitle">Administra todas las áreas de tu negocio en un solo lugar</p>
            <!--
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">1,248</div>
                    <div class="stat-label">Productos</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">562</div>
                    <div class="stat-label">Clientes</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">89</div>
                    <div class="stat-label">Proveedores</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">17</div>
                    <div class="stat-label">Categorías</div>
                </div>
            </div>-->
        </header>

        <main>
            <div class="admin-panel">
                <div class="admin-card users"> 
                    <div class="admin-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-content">
                        <a href="users">
                            <h3>Usuarios</h3>
                        </a>
                        <p>Gestiona usuarios y permisos del sistema</p>
                    </div>
                </div>

                <div class="admin-card products">
                    <div class="admin-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="card-content">
                        <h3>Productos</h3>
                        <p>Administra inventario y productos</p>
                    </div>
                </div>

                <div class="admin-card clients">
                    <div class="admin-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-content">
                        <h3>Clientes</h3>
                        <p>Gestiona información de clientes</p>
                    </div>
                </div>

                <div class="admin-card suppliers">
                    <div class="admin-icon">
                        <i class="fas fa-truck-loading"></i>
                    </div>
                    <div class="card-content">
                        <h3>Proveedores</h3>
                        <p>Administra proveedores y compras</p>
                    </div>
                </div>

                <div class="admin-card categories">
                    <div class="admin-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="card-content">
                        <h3>Categorías</h3>
                        <p>Organiza productos por categorías</p>
                    </div>
                </div>

                <div class="admin-card sales">
                    <div class="admin-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="card-content">
                        <h3>Ventas</h3>
                        <p>Gestiona pedidos y ventas</p>
                    </div>
                </div>

                <div class="admin-card payments">
                    <div class="admin-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="card-content">
                        <h3>Pagos</h3>
                        <p>Administra transacciones y pagos</p>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <p>&copy; 2025 Sistema de Gestión Comercial. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>

</html>