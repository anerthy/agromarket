<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="AgroMarket">
  <meta name="theme-color" content="#009688">
  <link rel="shortcut icon" href="<?= media(); ?>/images/favicon.ico">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">

  <title><?= $data['page_tag']; ?></title>
</head>

<body>
  <center>
    <h1>Registrarse como usuario</h1>
  </center>
  <div class="tile">
    <div class="tile-body">
      <form class="form-horizontal">
        <h3 class="tile-title">Datos personales</h3>
        <div class="mb-3 row">
          <label class="form-label col-md-3">Cedula</label>
          <div class="col-md-8">
            <input id="per-cedula" class="form-control col-md-8" type="text" placeholder="Digite su cedula">
          </div>
        </div>

        <div class="mb-3 row">
          <label class="form-label col-md-3">Nombre</label>
          <div class="col-md-8">
            <input id="per-nombre" class="form-control col-md-8" type="text" placeholder="Digite su nombre">
          </div>
        </div>

        <div class="mb-3 row">
          <label class="form-label col-md-3">Primer apellido</label>
          <div class="col-md-8">
            <input id="per-apellido1" class="form-control col-md-8" type="text" placeholder="Digite su primer apellido">
          </div>
        </div>

        <div class="mb-3 row">
          <label class="form-label col-md-3">Segundo apellido</label>
          <div class="col-md-8">
            <input id="per-apellido2" class="form-control col-md-8" type="text" placeholder="Digite su segundo apellido">
          </div>
        </div>

        <div class="mb-3 row">
          <label class="form-label col-md-3">Dirección</label>
          <div class="col-md-8">
            <textarea id="per-direccion" class="form-control col-md-8" rows="2" placeholder="Digite su direccion"></textarea>
          </div>
        </div>

        <div class="mb-3 row">
          <label class="form-label col-md-3">Telefono</label>
          <div class="col-md-8">
            <input id="per-telefono" class="form-control col-md-8" type="text" placeholder="Digite su telefono">
          </div>
        </div>
        <hr>
        <h3 class="tile-title">Datos de usuario</h3>
        <div class="row">
          <div class="mb-3 col-md-3">
            <label class="form-label">Usuario</label>
            <input id="usr_nombre" class="form-control" type="text" placeholder="Digite el nombre de usuario">
          </div>
          <div class="mb-3 col-md-3">
            <label class="form-label">Email</label>
            <input id="usr_email" class="form-control" type="text" placeholder="Digite su email">
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-3">
            <label class="form-label">Contraseña</label>
            <input id="usr_contrasena" class="form-control" type="password" placeholder="Digite su contraseña">
          </div>
          <div class="mb-3 col-md-3">
            <label class="form-label">Confirmar contraseña</label>
            <input id="confirmar-usr_contrasena" class="form-control" type="password" placeholder="Digite su contraseña de nuevo">
          </div>
        </div>
      </form>
    </div>
    <div class="tile-footer">
      <div class="row">
        <div class="col-md-8 col-md-offset-3">
          <button class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i>Registrarme</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancelar</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    const base_url = "<?= base_url(); ?>";
  </script>
  <!-- Essential javascripts for application to work-->
  <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?= media(); ?>/js/popper.min.js"></script>
  <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
  <script src="<?= media(); ?>/js/fontawesome.js"></script>
  <script src="<?= media(); ?>/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
  <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
  <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
</body>

</html>