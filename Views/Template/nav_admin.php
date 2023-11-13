    <!-- Sidebar menu-->
    
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            
   
        
        <a class="app-menu__item"> 
        <span class="fa fa-user  fa-2x" style="margin-right: 5px;"></span>
        <span ><?= $_SESSION['userData']['usr_nombre']; ?></span>
        </a>
       
        </div>
      
        <ul class="app-menu">

            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/home">
                    <span class="fa fa-home fa-2x"></span>
                    <span class="app-menu__label icon">Página Principal</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/usuario">
                    <span class="fa fa-users fa-2x"></span>
                    <span class="app-menu__label icon">Usuarios</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/ro">
                    <span class="fa fa-gear fa-2x"></span>
                    <span class="app-menu__label icon">Roles</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/producto">
                    <span class="fa fa-carrot fa-2x"></span>
                    <span class="app-menu__label icon">Productos</span>
                </a>
            </li>
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
                <a class="app-menu__item" href="<?= base_url(); ?>/donacion_admin">
                    <span class="fa fa-money fa-2x"></span>
                    <span class="app-menu__label icon">Donaciones</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/productor">
                    <span class="fa fa-user fa-2x" title="Volverme productor"></span>
                    <span class="app-menu__label icon">
                        <?php if (1 == 1) { ?>
                            Volverme productor
                        <?php } else { ?>
                            Perfil de productor
                        <?php } ?>
                    </span>
                </a>
            </li>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/afiliado">
                    <span class="fa fa-user-plus fa-2x" title="Plan Premium"></span>
                    <span class="app-menu__label icon">
                        Plan Premium
                    </span>
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