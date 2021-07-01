 <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-file-archive"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMINISTRASI SURAT</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item"> 
            <!-- Heading -->
      
            <!-- Nav Item - Dashboard -->
            

            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('Dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> 

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Staff
            </div>

            <!-- <?php if($this->fungsi->user_login()->level == 1) { ?>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('Penduduk') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Warga</span></a>
                <?php } ?>
            </li>
            -->

            <!---<?php if($this->fungsi->user_login()->level == 1) { ?>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('PerangkatDesa') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Perangkat Desa</span></a>
                <?php } ?>
            </li>!--->

            <?php if($this->fungsi->user_login()->level == 1) { ?>
            <li class="nav-item">
                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-mail-bulk"></i>
                    <span>Transaksi Surat</span></a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('suratmasuk') ?>">Surat Masuk</a>
                            <a class="collapse-item" href="<?= base_url('pembuatanSurat/surat_internal') ?>">Surat Internal</a>
                            <a class="collapse-item" href="<?= base_url('suratkeluar') ?>">Surat Keluar</a>
                            
                    </div>
                </div>
            <?php } ?>
            </li>
            
             <!--<?php if($this->fungsi->user_login()->level == 2) { ?>
            <li class="nav-item">
                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-mail-bulk"></i>
                    <span>Transaksi Surat</span></a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('lurahmasuk') ?>">Surat Masuk</a>
                            <a class="collapse-item" href="<?= base_url('lurahkeluar') ?>">Surat Keluar</a>
                    </div>
                </div>
            <?php } ?>
            </li>

            <!-- Nav Item - Pages Collapse Menu Blog Sekdes-->
             <!--<?php if($this->fungsi->user_login()->level == 3) { ?>
            <li class="nav-item">
                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-mail-bulk"></i>
                    <span>Transaksi Surat</span></a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('sekdesmasuk') ?>">Surat Masuk</a>
                            <a class="collapse-item" href="<?= base_url('sekdeskeluar') ?>">Surat Keluar</a>
                    </div>
                </div>
            <?php } ?>
            </li>!-->


           <!-- Nav Item - Pages Collapse Menu Blog -->
           <?php if($this->fungsi->user_login()->level == 1) { ?>
           <li class="nav-item">
                
                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book "></i>
                    <span>Laporan</span></a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('laporanMasuk') ?>">Surat Masuk</a>
                            <a class="collapse-item" href="<?= base_url('laporanKeluar') ?>">Surat Keluar</a>
                  </div>
                </div>
                <?php } ?>
             </li>

            
           <!-- Nav Item - Pages Collapse Menu Blog -->
           <?php if($this->fungsi->user_login()->level == 1) { ?>
           <li class="nav-item">
                
                <a class="nav-link pb-0 collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user-cog"></i>
                    <span>Setting</span></a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('user'); ?>">User</a>
                            <a class="collapse-item" href="<?= base_url('perangkat_desa') ?>">Pegawai</a>
                  </div>
                </div>
                <?php } ?>
             </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?php echo base_url('auth/logout') ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-danger bg-light topbar mb-4 static-top shadow">
                     
                    <!-- Sidebar Toggle (Topbar) 
        
                    <img src="<?php echo base_url();?>assets/img/Kelurahan.png" width="40" hight="40"><br>
                    <h5 style="color:dark"> Kantor Kelurahan Kalongan</h5>-->
                    <marquee behavior='alternate' direction='left' scrollamount='3' scrolldelay='40'><p align="center" style="font-family: monospace; font-size: 130%; color: dark; font-weight: bold; line-height: 18px;">Selamat Datang di Sistem Administrasi Surat Kecamatan Cipari</p></marquee>

                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow">


                    </ul>

                </nav>
                <!-- End of Topbar -->