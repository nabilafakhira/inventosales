<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion fixed-top" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASEURL; ?>">
        <div class="sidebar-brand-icon">
        </div>
        <div class="sidebar-brand-text mx-3">Invento Sales</div>
    </a>
    <!-- Divider -->

    <hr class="sidebar-divider">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <?php if($_SESSION['user']['nama_akses'] == 'Admin'):?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/barang">
            <i class="fas fa-box"></i>
            <span>Barang</span></a>
    </li>
    <?php endif;?>

    <?php if(($_SESSION['user']['nama_akses'] == 'Admin') || ($_SESSION['user']['nama_akses'] == 'Pelanggan')):?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/penjualan">
            <i class="fas fa-shopping-cart"></i>
            <span>Penjualan</span></a>
            <span id="countVerifikasi"></span>
    </li>
    <?php endif;?>
    
    <?php if(($_SESSION['user']['nama_akses'] == 'Admin') || ($_SESSION['user']['nama_akses'] == 'Supplier')):?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/pembelian">
            <i class="fas fa-shopping-bag"></i>
            <span>Pembelian</span></a>
    </li>
    <?php endif;?>
    
    <?php if($_SESSION['user']['nama_akses'] == 'Admin'):?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/user">
            <i class="fas fa-tasks"></i>
            <span>Hak Akses</span></a>
    </li>
    <?php endif;?>
    
    <?php if($_SESSION['user']['nama_akses'] == 'Admin'):?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/user">
            <i class="fas fa-users"></i>
            <span>User</span></a>
    </li>
    <?php endif;?>

    <?php if($_SESSION['user']['nama_akses'] == 'Admin'):?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/admin">
            <i class="fas fa-user-lock"></i>
            <span>Admin</span></a>
    </li>
    <?php endif;?>

    <?php if($_SESSION['user']['nama_akses'] == 'Admin'):?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/pelanggan">
            <i class="fas fa-portrait"></i>
            <span>Pelanggan</span></a>
    </li>
    <?php endif;?>

    <?php if($_SESSION['user']['nama_akses'] == 'Admin'):?>
    <li class="nav-item">
        <a class="nav-link" href="<?= BASEURL; ?>/supplier">
            <i class="fas fa-truck-loading"></i>
            <span>Supplier</span>
        </a>
    </li>
    <?php endif;?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>

<!-- End of Sidebar -->