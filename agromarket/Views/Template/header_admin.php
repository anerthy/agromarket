<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Style to set the size of checkbox -->
    <style>
    input.largerCheckbox {
        width: 40px;
        height: 30px;
    }
    </style>

    <meta charset="utf-8">
    <meta name="description" content="Paraiso Azul - Golfo Nicoya">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="paraiso azul">
    <meta name="theme-color" content="#009688">
    <link rel="shortcut icon" href="<?= media(); ?>/images/favicon.ico">
    <title><?= $data['page_tag'] ?></title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo" href="<?= base_url(); ?>/dashboard">
            <img src="<?= media(); ?>/images/LOGOPARAISOAZUL.png" alt="Logo de Paraíso Azul" width="100px">
        </a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
            aria-label="Hide Sidebar"><i class="fas fa-bars"></i></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li>
                <a class="app-nav__item" href="<?= base_url(); ?>/logout" aria-label="Cerrar sesión">
                    <i class="fa fa-sign-out fa-lg" title="Cerrar sesión"></i>
                </a>
            </li>
        </ul>
    </header>
    <?php require_once("nav_admin.php"); ?>