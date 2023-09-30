<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estilos.css"> <!-- Agrega tus estilos CSS aquí -->
    <style>
        body {
            background-image: url('http://localhost/agromarket/agromarket/Assets/images/img/Perfil/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        /* Agregamos un seudoelemento ::before para la superposición verde */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 128, 0, 0.5); /* Color de fondo verde con opacidad */
            z-index: -1; /* Coloca el seudoelemento detrás del contenido principal */
        }

        /* Ajusta la tonalidad verde y la opacidad según tus preferencias */

        /* Aquí puedes agregar estilos adicionales según tus necesidades */

        .container {
            max-width: 500px; /* Reduzco el ancho máximo del contenedor */
            width: 100%;
            background-color: rgb(255 255 255 / 44%);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center; /* Centra el contenido horizontalmente */
            align-items: center; /* Centra el contenido verticalmente */
            flex-direction: column; /* Alinea los elementos verticalmente */
        }

        .register-form {
            text-align: left;
            max-width: 400px; /* Reduzco el ancho máximo del formulario */
            width: 100%;
        }

        .register-form h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px; /* Reduzco el espaciado inferior de los grupos de formulario */
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .form-group button {
            background-color: #279f20;
            color: #fff;
            border: none;
            padding: 15px 30px; /* Aumenta el tamaño del botón */
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Agrega una transición de color */
            font-weight: bold; /* Hace que el texto del botón sea más audaz */
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f4f4f4;
            color: #333;
        }

        .form-group input[type="file"]:hover {
            background-color: #e0e0e0;
        }

        .letra{

    color: #7e7f03;
    font-size: 18px;
    font-weight: bold;
        }

    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="register-form">
            <center>
            <h2 class="letra" style="font-size: 30px;">Registro de productor</h2>
            </center>
            <form action="productor" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="letra" for="txtNombre">Nombre:</label>
                    <input type="text" id="txtNombre" name="txtNombre"  required>
                </div>
                <div class="form-group">
                    <label class="letra" for="txtUbicacion">Ubicación:</label>
                    <input type="text" id="txtUbicacion" name="txtUbicacion"  required>
                </div>

                <div class="form-group">
                    <label class="letra" for="imagen">Imagen de perfil:</label>
                    <div id="dropzone" name="foto" class="dropzone">
                        <div class="dz-message">
                            Arrastra y suelta una imagen aquí o haz clic para seleccionarla
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    // Inicializa Dropzone.js en el elemento con id "dropzone"
    Dropzone.autoDiscover = false; // Evita que Dropzone se inicialice automáticamente

    var myDropzone = new Dropzone("#dropzone", {
        url: "tu_url_de_carga", // Especifica la URL de carga de imágenes
        maxFilesize: 5, // Tamaño máximo del archivo en MB
        acceptedFiles: "image/*", // Tipos de archivo aceptados
        addRemoveLinks: true, // Agrega un enlace para eliminar archivos cargados
        dictRemoveFile: "Eliminar archivo", // Texto del enlace para eliminar archivos
        dictDefaultMessage: "Arrastra y suelta una imagen aquí o haz clic para seleccionarla", // Mensaje predeterminado
    });
</script>

</html>
