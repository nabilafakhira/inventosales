<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <div class="flash-data" data-pesan="<?= isset($_SESSION['flash']) ? $_SESSION['flash']['pesan'] : null?>" data-tipe="<?= isset($_SESSION['flash']) ? $_SESSION['flash']['tipe'] : null?>"></div>
    <?php unset($_SESSION['flash']); ?>

    <!-- Main Content -->
    <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                    </button> -->
            <button class="btn text-primary rounded-circle mr-3" id="sidebarToggle">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['user']['username']?></span>
                        <img class="img-profile rounded-circle" src="<?= BASEURL; ?>/img/default-profile.png">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= BASEURL; ?>/logout">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Keluar
                        </a>
                    </div>
                </li>

            </ul>

        </nav>