<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            width: 300px;
            margin: 200px auto;
            padding: 50px;
            border: 5px solid white;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 5px solid white;
            border-radius: 4px;
            box-sizing: border-box;
        }


        input[type="submit"] {
            background-color: rgb(255, 255, 255);
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: skyblue;
        }
    </style>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('view/img/login.jpg');
            /* Reemplaza con la URL de tu imagen */
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100vw;
        }
    </style>
    <style>
        .sesion {
            position: relative;
            top: -20px;
        }

        .datos {
            position: relative;
            top: 200px;
        }

        input[type="text"] {
            color: white;
        }

        input[type="password"] {
            color: white;
        }
    </style>

    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>

</head>

<body>

    <center>
        <div class="container-fluid row px-0 py-0 mx-0 my-0 ">


            <div class="col-md-12 col-sm-12 px-0 py-0 mx-0 my-0 row" style="height: 100%;">
                <br>
                <center>
                    <p style="color:white;"> <strong class="datos">INGRESA TUS DATOS</strong> </p>
                </center>
                <form id="frm_login">
                    <center>
                        <p style="color:white;"> <strong class="sesion">INICIO DE SESION</strong> </p>
                    </center>

                    <label for="username"><strong style="color:white;"> Usuario:</strong></label>
                    <input type="text" id="username" name="username" required style="background-color: transparent;">

                    <label for="password"><strong style="color:white;">Contraseña:</strong></label>
                    <input type="password" id="password" name="password" required style="background-color: transparent">

                    <button type="button" onclick="iniciar_sesion();">Ingresar</button>
                </form>
            </div>
        </div>

    </center>

    <script src="<?php echo BASE_URL; ?>view/funtion/user.js"></script>



</body>

</html>