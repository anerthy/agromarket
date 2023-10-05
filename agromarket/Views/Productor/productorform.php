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
        background-color: rgba(0, 128, 0, 0.5);
        /* Color de fondo verde con opacidad */
        z-index: -1;
        /* Coloca el seudoelemento detrás del contenido principal */
    }

    /* Ajusta la tonalidad verde y la opacidad según tus preferencias */

    /* Aquí puedes agregar estilos adicionales según tus necesidades */

    .container {
        max-width: 500px;
        /* Reduzco el ancho máximo del contenedor */
        width: 100%;
        background-color: rgb(255 255 255 / 44%);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
        /* Centra el contenido horizontalmente */
        align-items: center;
        /* Centra el contenido verticalmente */
        flex-direction: column;
        /* Alinea los elementos verticalmente */
    }

    .register-form {
        text-align: left;
        max-width: 400px;
        /* Reduzco el ancho máximo del formulario */
        width: 100%;
    }

    .register-form h2 {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
        /* Reduzco el espaciado inferior de los grupos de formulario */
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
        padding: 15px 30px;
        /* Aumenta el tamaño del botón */
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        /* Agrega una transición de color */
        font-weight: bold;
        /* Hace que el texto del botón sea más audaz */
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

    .letra {

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
            <form id="formProductor" name="formProductor">
                <input type="hidden" id="foto_actual" name="foto_actual" value="">
                <input type="hidden" id="foto_remove" name="foto_remove" value="0">
                <div class="form-group">
                    <label class="letra" for="txtNombre">Nombre:</label>
                    <input type="text" id="txtNombre" name="txtNombre" required>
                </div>
                <div class="form-group">
                    <label class="letra" for="txtUbicacion">Ubicación:</label>
                    <input type="text" id="txtUbicacion" name="txtUbicacion" required>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="photo">
                            <label for="foto">Imagen</label>
                            <div class="prevPhoto">
                                <span class="delPhoto notBlock">X</span>
                                <label for="foto"></label>
                                <div>
                                    <img id="img" src="<?= media(); ?>/images/uploads/imageUnavailable.png"
                                        style="width: 400px;">
                                </div>
                            </div>
                            <div class="upimg">
                                <input type="file" name="foto" id="foto">
                            </div>
                            <div id="form_alert"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group" style="display: flex; justify-content: space-between;margin-top: 20px;}">
                    <button type="submit">Registrarse</button>
                    <!-- <button onclick="window.location.href='<?= base_url(); ?>/Productor/productor'">Ir al perfil</button> -->
                </div>

            </form>
        </div>
    </div>
</body>

<script>
const base_url = "<?= base_url(); ?>";
</script>
<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>

<script>
// document.addEventListener("DOMContentLoaded", function() {
//     const form = document.getElementById("formProductor");

//     form.addEventListener("submit", function(event) {
//         event.preventDefault();

//         form.reset();


//         const fileInput = document.getElementById("foto");
//         const newFileInput = fileInput.cloneNode(true);
//         fileInput.parentNode.replaceChild(newFileInput, fileInput);
//     });
// });
</script>




</html>