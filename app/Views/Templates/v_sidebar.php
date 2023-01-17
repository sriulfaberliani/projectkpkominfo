        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="assets\index.html">
                <div class="sidebar-brand-icon">
                <img src="\assets\img\logobulat.png" alt="Image" height="45" width="45"/>
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3" style="color:white; font-weight:bold; font-size:25px;">SISUME</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"  ></i>
                    <span style="color:white; font-weight:bold; font-size:16px;">Dashboard</span></a>
            </li>

            <?php if (session()->get('id_role') == '1') { ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
    
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url(); ?>" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span style="color:white; font-weight:bold; font-size:16px;" >Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Data Master</h6>
                        <a class="collapse-item" href="<?= base_url('datapegawai'); ?>">Data Pegawai</a>
                        <a class="collapse-item" href="<?= base_url('datajabatan'); ?>">Data Jabatan</a>
                        <a class="collapse-item" href="DataJabatanPegawai">Data Jabatan - Pegawai</a>
                        <a class="collapse-item" href="<?= base_url('datarole'); ?>">Data Role</a>
                        <a class="collapse-item" href="<?= base_url('datauser'); ?>">Data User</a>
                    </div>
                </div>
            </li>
            <?php } ?>

            <?php if (session()->get('id_role') != '1') { ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading"> 
                Surat
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span style="color:white; font-weight:bold; font-size:16px;">Surat</span>
                </a>
                <div id="collapsePages" class="collapse " aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Transaksi Surat</h6>
                        <a class="collapse-item" href="login.html">Surat Masuk</a>
                        <a class="collapse-item" href="register.html">Surat Keluar</a>
                    </div>
                </div>
            </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->