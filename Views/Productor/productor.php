<?php
headerAdmin($data);
getModal('modalProductor', $data);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="Assets/js/functions_productor.js"></script> <!-- Tu script que utiliza jQuery -->

<main class="app-content">
    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
           
             
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="personal-info-tab">
                    <!-- Contenido de la pestaña "Datos personales" -->
                    <h5 class="mb-4">
                        DATOS PERSONALES
                        <!-- <button class="btn btn-sm btn-info" onclick="fntEditProductor()">
                            Editar
                        </button> -->
                    </h5>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
    <style>
           .profile-card {
           border: 1px solid #e0e0e0;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .profile-card:hover {
            transform: scale(1.05);
        }
        .profile-card img {
            width: 100%;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .profile-card .card-body {
            padding: 20px;
            text-align: center;
        }
        .user-name {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
        }
        .user-description {
            font-size: 16px;
            margin: 10px 0;
            color: #777;
        }
        .btn-profile {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-profile:hover {
            background-color: #0056b3;
        }
        .profile-card p {
            font-size: 16px;
            margin: 10px 0;
        }
        .profile-card p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
 <div class="container">
    <?php foreach ($data['arrData'] as $productor) : ?>
        <section style="background-color: #eee;">
            <div class="container py-5">
                

            <center>
                    <div class="col-lg-6">


                        <div class="profile-card">
                        <img src="<?php echo  media() . '/images/uploads/productores/' . $productor['pdt_imagen']; ?>" alt="Foto">
        <div class="card-body">
        <p class="text-muted mb-0">Nombre: <?php echo $productor['pdt_nombre']; ?></p>
        <p class="text-muted mb-0">Cedula: <?php echo $productor['per_cedula']; ?></p>
        <p class="text-muted mb-0">Ubicacion: <?php echo $productor['pdt_ubicacion']; ?></p>
        <p class="text-muted mb-0">Estado: <?php echo $productor['pdt_estado']; ?></p>
        </div>
 
                    </div>

                </div>
            </div>
            </center>
        </section>

    <?php endforeach; ?>
    </div>
</main>

<?php footerAdmin($data); ?>