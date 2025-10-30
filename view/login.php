<!--<!DOCTYPE html>
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
-->


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--<link rel="stylesheet" href="cl-icon/css/all.min.css">-->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: arial;
            color: #fff;
        }

        body {
            width: 100vw;
            height: 100vh;
            background: #081b29;
            display: grid;
            justify-content: center;
            align-content: center;
        }

        ::-webkit-input-placeholder {
            color: #eee;
        }

        .wrapper {
            position: relative;
            width: 800px;
            height: 65vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border: 3px solid #00ffff;
            box-shadow: 0 0 50px 0 #00a6bc;
        }

        .form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .title {
            font-size: 35px;
        }

        .inp {
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }

        .input {
            border: none;
            outline: none;
            background: none;
            width: 260px;
            margin-top: 40px;
            padding-right: 10px;
            font-size: 17px;
            color: #0ef;

        }

        .submit {
            border: none;
            outline: none;
            width: 288px;
            margin-top: 25px;
            padding: 10px 0;
            font-size: 20px;
            border-radius: 40px;
            letter-spacing: 1px;
            cursor: pointer;
            background: linear-gradient(45deg, #0ef, #c800ff);
        }

        .footer {
            margin-top: 30px;
            letter-spacing: 0.5px;
            font-size: 14px;
        }

        .link {
            color: #0ef;
            text-decoration: none;
        }

        .banner {
            position: absolute;
            top: 0;
            right: 0;
            width: 450px;
            height: 390px;
            background: linear-gradient(to right, #0ef, #c800ff);
            clip-path: polygon(0 0, 100% 0, 100% 100%, 60% 100%);
            padding-right: 70px;
            text-align: right;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-end;
        }

        .wel_text {
            font-size: 40px;
            margin-top: -50px;
            line-height: 50px;
        }

        .para {
            margin-top: 10px;
            font-size: 18px;
            line-height: 24px;
            letter-spacing: 1px;
        }
    </style>
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>
    <div class="wrapper">
        <form id="frm_login" class="form">
            <h1 class="title">Inicio</h1>
            <div class="inp">
                <input type="text" name="username" id="username" class="input" placeholder="usuario">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="inp">
                <input type="password" name="password" id="password" class="input" placeholder="contraseña">
                <i class="fa-solid fa-lock"></i>
            </div>
            <!--<button class="submit" onclick="iniciar_sesion();">Iniciar sesión</button>-->
            <button class="submit" type="button" onclick="iniciar_sesion();">Ingresar</button>
            <p class="footer">¿No tienes cuenta? <a href="#" class="link">Por favor, Registrate</a></p>
        </form>
        <div></div>
        <div class="banner">
            <h1 class="wel_text">Bienvenid@</h1><br>
            <p class="para"></p>
        </div>
    </div>

    <script src="<?php echo BASE_URL; ?>view/funtion/user.js"></script>
</body>

</html>