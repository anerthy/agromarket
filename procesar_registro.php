<?php
// Conexión a la base de datos y otras configuraciones aquí

// Función para registrar la persona en la base de datos
function registerPersonUser(
    $cedula,
    $nombre,
    $apellido1,
    $apellido2,
    $direccion,
    $telefono,
    $email,
    $usuario,
    $contrasena
) {

    // Ejemplo: conexión y ejecución de un procedimiento almacenado
    $conn = new mysqli("localhost", "root", "", "agromarket");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("CALL InsertarPersonaUsuario(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param(
        "sssssssss",
        $cedula,
        $nombre,
        $apellido1,
        $apellido2,
        $direccion,
        $telefono,
        $email,
        $usuario,
        $contrasena
    ); // Ajusta los tipos y el número de parámetros según tu procedimiento
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

// Recibir datos del formulario
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$usuario = $_POST['usuario'];
$contrasena = hash("SHA256",$_POST['contrasena']);

// Llama al procedimiento en la base de datos
registerPersonUser(
    $cedula,
    $nombre,
    $apellido1,
    $apellido2,
    $direccion,
    $telefono,
    $email,
    $usuario,
    $contrasena
);

// Puedes imprimir una respuesta de éxito si es necesario
echo 'Registro exitoso';
