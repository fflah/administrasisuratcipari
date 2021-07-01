<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Selamat Datang di Website Ajuan Surat Pengantar Online</span>
    <span class="site-heading-lower">Kelurahan Gandrungmangu</span>
  </h1>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            
            <a class="nav-link text-uppercase text-expanded" href="<?= base_url('DashboardUser') ?>">Home
              <span class="sr-only"></span>
            </a>
          </li>
           <!---<li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="<?= base_url('Prosedur') ?>">Prosedur</a>
          </li>!-->
          <li class="nav-item px-lg-4">
            <div class="dropdown show">
                        <a class="nav-link text-uppercase text-expanded" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-list"></i> Layanan Surat Online
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                         
                          <a class="dropdown-item" href="<?= base_url('layananSurat/pindahdomisili') ?>">Surat Pindah Daerah</a>


                          <a class="dropdown-item" href="<?= base_url('layananSurat/nikah') ?>">Surat Nikah</a>

                         <!--- <a class="dropdown-item" href="#">Surat Cerai</a>!--->

                          <!-- <a class="dropdown-item" href="<?//= base_url('layananSurat/kelahiran') ?>">Surat Kelahiran</a> -->

                          <a class="dropdown-item" href="<?= base_url('layananSurat/kematian') ?>">Surat Kematian</a>

                          <a class="dropdown-item" href="<?= base_url('layananSurat/sku') ?>">Surat Keterangan Usaha</a>

                              <!--- <a class="dropdown-item" href="#">Surat Kehilangan STNK</a>

                          <a class="dropdown-item" href="#">Surat Kehilangan KTP</a>!--->


                        </div>
                      </div>
                       
          </li>
        </ul>
      </div>
    </div>
  </nav>