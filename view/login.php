
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="boxicons/css/boxicons.css">
    <link rel="icon" type="image/x-icon" href="view/img/favicon.ico">
    <title>Login</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-image: url("view/img/log.avif");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .container {
            width: 350px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px;
        }

        span {
            color: #fff;
            font-size: small;
            display: flex;
            justify-content: center;
            padding: 10px 0 15px 0;
        }

        header {
            color: #fff;
            font-size: 30px;
            display: flex;
            justify-content: center;
            padding: 0 0 15px 0;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .input-field .input {
            height: 45px;
            width: 87%;
            border: none;
            outline: none;
            border-radius: 30px;
            color: #fff;
            padding: 0 0 0 42px;
            background: rgba(255, 255, 255, 0.15);
        }

        i {
            position: relative;
            top: -31px;
            left: 17px;
            color: #fff;
        }

        ::-webkit-input-placeholder {
            color: #fff;
        }

        .submit {
            border: none;
            border-radius: 30px;
            font-size: 15px;
            height: 45px;
            outline: none;
            width: 100%;
            background: rgba(255, 255, 255, 0.63);
            cursor: pointer;
            transition: .3s;
        }

        .submit:hover {
            background-color: #ffffffff;
            box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
        }

        .bottom {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: small;
            color: #fff;
            margin-top: 10px;
        }

        .left {
            display: flex;
        }

        label a {
            color: #fff;
            text-decoration: none;
        }
    </style>
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span>Login</span>
                <header>Iniciar Sesión</header>
            </div>

            <form id="frm_login">
                <div class="input-field">
                    <input type="text" id="username" name="username" required class="input" placeholder="Usuario"
                        required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password" required class="input" placeholder="Contraseña"
                        required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-field">
                    <input type="button" class="submit" onclick="iniciar_sesion();" value="Inicio">
                </div>

            </form>

        </div>
    </div>
    <script src="<?php echo BASE_URL; ?>view/funtion/user.js"></script>
</body>

</html>