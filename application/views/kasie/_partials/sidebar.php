<!-- Sidebar -->
<ul class="sidebar navbar-nav">

    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('kasie/overview') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Perjadin Saya</span>
        </a>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Perjadin Pegawai</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('kasie/perjadin_pegawai') ?>">List</a>
            <a class="dropdown-item" href="<?php echo site_url('kasie/perjadin') ?>">Matriks</a>
        </div>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li> -->

</ul>
