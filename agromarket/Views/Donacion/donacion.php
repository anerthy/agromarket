
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Donaciones</title>
</head>
<body>
    <h1>Listado de Donaciones</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Medio</th>
                <th>Información</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data['arrData'] as $donacion): ?>
    <tr>
        <td><?php echo $donacion['don_id']; ?></td>
        <td><?php echo $donacion['don_descripcion']; ?></td>
        <td><?php echo $donacion['don_medio']; ?></td>
        <td><?php echo $donacion['don_informacion']; ?></td>
        <td><?php echo $donacion['don_estado']; ?></td>
    </tr>
<?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>
