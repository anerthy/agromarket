    <!-- Sidebar menu-->

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">



            <a class="app-menu__item" href="<?= base_url(); ?>/productor">
                <span class="fa fa-user  fa-2x" style="margin-right: 5px;"></span>
                <span><?= $_SESSION['userData']['usr_nombre']; ?> (<?= $_SESSION['userData']['rol_nombre']; ?> )</span>
            </a>

        </div>

        <ul class="app-menu">
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                    <span class="fa fa-bars fa-2x"></span>
                    <span class="app-menu__label">Panel de control</span>
                </a>
            </li>
            <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/usuario">
                        <span class="fa fa-users fa-2x"></span>
                        <span class="app-menu__label icon">Usuarios</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/rol">
                        <span class="fa fa-gear fa-2x"></span>
                        <span class="app-menu__label icon">Roles</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/persona">
                        <span class="fa fa-user fa-2x"></span>
                        <span class="app-menu__label icon">Personas</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/productor/listado">
                        <span class="fa fa-user fa-2x"></span>
                        <span class="app-menu__label icon">Productores</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/producto">
                        <span class="fa fa-carrot fa-2x"></span>
                        <span class="app-menu__label icon">Productos</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/actividad">
                        <span class="fa fa-calendar fa-2x"></span>
                        <span class="app-menu__label icon">Actividades</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/anuncio">
                        <span class="fa fa-newspaper fa-2x"></span>
                        <span class="app-menu__label icon">Anuncios</span>
                    </a>
                </li>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/donacion/DonacionAdmin">
                        <span class="fa fa-money fa-2x"></span>
                        <span class="app-menu__label icon">Donaciones</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2, 3])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/Productor/productorform">
                        <span class="fa fa-user fa-2x" title="Volverme productor"></span>
                        <span class="app-menu__label icon">
                            Volverme productor
                        </span>
                    </a>
                </li>
            <?php } ?>
            <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) { ?>
                <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4, 5])) { ?>
                    <li>
                        <a class="app-menu__item" href="<?= base_url(); ?>/afiliado">
                            <span class="fa fa-user-plus fa-2x" title="Plan Premium"></span>
                            <span class="app-menu__label icon">
                                Plan Premium
                            </span>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/home">
                    <span class="fa fa-home fa-2x"></span>
                    <span class="app-menu__label icon">Página Principal</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                    <span class="fa fa-sign-out fa-2x"></span>
                    <span class="app-menu__label"> Cerrar sesión</span>
                </a>
            </li>

        </ul>
    </aside>