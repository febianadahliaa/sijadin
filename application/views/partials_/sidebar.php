<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">sijadin</div>
            </a> <!-- Sidebar - Brand -->

    <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Perjadin saya
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('kasie') ?>">
                    <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
                    <i class="fas fa-fw fa-file"></i>
                    <span>Perjadin</span>
                </a>
            </li>

    <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Perjadin pegawai
            </div>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('kasie/input_perjadin') ?>">
                    <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                    <i class="fas fa-fw fa-pen-nib"></i>
                    <span>Input Perjadin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('kasie/list_perjadin') ?>">
                    <!-- <i class="fas fa-fw fa-table"></i> -->
                    <i class="fas fa-fw fa-list"></i>
                    <span>List Perjadin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('kasie/matriks_perjadin') ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Matriks Perjadin</span>
                </a>
            </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Profil
    </div>

    <!-- Nav Item - 'Pengaturan' Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kasie/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil saya</span>
        </a>
        <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span>
        </a>                
    </li>

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->