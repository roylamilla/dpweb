<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 200px auto;
            padding: 50px;
            border: 1px solid #ccc;
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
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color:rgb(22, 14, 171);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:rgb(227, 9, 9);
        }
    </style>

</head>

<body>
    
    <center>
    <div class="container-fluid row px-0 py-0 mx-0 my-0 ">
        <style>
             body {
            margin: 0;
            padding: 0;
            background-image: url('view/img/elie.jpg'); /* Reemplaza con la URL de tu imagen */
            background-size: cover;
            background-position: center;
            height: 100vh;
            width: 100vw;
        }

        </style>
        <div class="col-md-12 col-sm-12 px-0 py-0 mx-0 my-0 row" style="height: 100%;">
            <br>
            <center><p style="color:white;"> <strong>INGRESA TUS DATOS</strong> </p></center>
            <form action="/login" method="post"> <!-- Reemplazar "/login" con la ruta donde se procesará el formulario -->
         <label for="username"><strong style="color:white;">Nombre de usuario/Correo electrónico:</strong></label>
         <input type="text" id="username" name="username" required>

         <label for="password"><strong style="color:white;">Contraseña:</strong></label>
         <input type="password" id="password" name="password" required>

         <input type="submit" value="Iniciar sesión">
         </form>
        </div>
    </div>
    
</body>
</html>