<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">sijadin</div>
    </a>

    <hr class="sidebar-divider">

    <!-- QUERY MENU (BASED ON USER ROLE) -->
    <?php
    $role_id = $this->session->userdata('roleId');
    $queryMenu = "SELECT user_menu.id, menu
                        FROM user_menu
                        JOIN user_access_menu
                        ON user_menu.id = user_access_menu.menu_id
                        WHERE user_access_menu.role_id = $role_id
                        AND user_menu.is_active = 1
                        ORDER BY user_access_menu.menu_id ASC
                    ";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= str_replace('_', ' ', $m['menu']); ?>
        </div>

        <!-- QUERY SUBMENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                                FROM user_sub_menu
                                WHERE menu_id = $menuId
                                AND is_active = 1
                            ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <!-- LOOPING SUBMENU -->
        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($subMenuName == $sm['sub_menu_name']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['sub_menu_name']; ?></span>
                </a>
                </li>
            <?php endforeach; ?>

            <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>

        <li class="nav-item">
            <a class="nav-link logout" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Keluar</span>
            </a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        <!-- Footer -->
        <div class="container my-auto" style="margin-bottom: 22px !important;">
            <hr class="sidebar-divider">
            <div class="copyright text-center text-white my-auto">
                <span class="small">Copyright &copy; sijadin <?= date('Y'); ?></span>
            </div>
        </div>
        <!-- End of Footer -->

</ul>
<!-- End of Sidebar -->