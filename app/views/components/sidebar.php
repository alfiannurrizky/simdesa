<div class="sidebar">
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../img/avatar2.png" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="home" class="d-block">
        <?php echo $_SESSION["global"]->username; ?>
      </a>
    </div>
  </div>
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>
  <div>
    <ul class="nav nav-pills nav-sidebar flex-column mt-3" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item menu-open">
        <a href="#" class="nav-link" style="color: #fff; background-color:  #6b6b6b;">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Data Master
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="daftar_penduduk" class="nav-link <?= ($activePage == 'index.php?page=daftar_penduduk') ? 'active': ''; ?>">
              <i class="fas fa-users"></i>
              <p>Daftar Penduduk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="daftar_keluarga" class="nav-link <?= ($activePage == 'index.php?page=daftar_keluarga') ? 'active': ''; ?>">
              <i class="fas fa-users"></i>
              <p>Daftar Keluarga</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="daftar_mutasi" class="nav-link <?= ($activePage == 'index.php?page=daftar_mutasi') ? 'active': ''; ?>">
              <i class="fas fa-exchange-alt"></i>
              <p>Mutasi</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link" style="color: #fff; background-color: #6b6b6b;">
          <i class="nav-icon fas fa-envelope"></i>
          <p>
            Surat
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="daftar_surat" class="nav-link <?= ($activePage == 'index.php?page=daftar_surat') ? 'active': ''; ?>">
              <i class="fas fa-address-card"></i>
              <p>Daftar Surat</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="buat_surat" class="nav-link <?= ($activePage == 'index.php?page=buat_surat') ? 'active': ''; ?>">
              <i class="fas fa-address-card"></i>
              <p>Buat Surat</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link" style="color: #fff; background-color: #6b6b6b;">
          <i class="nav-icon fas fa-user"></i>
          <p>
            User
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="ganti_password" class="nav-link <?= ($activePage == 'index.php?page=ganti_password') ? 'active': ''; ?>">
              <i class="fas fa-unlock"></i>
              <p>Ganti Password</p>
            </a>
          </li>
          <li class="nav-item">
            <span onclick="logout('../config/logout.php')" class="nav-link" style="cursor: pointer;">
              <i class="fas fa-door-open"></i>
              <p>Keluar</p>
            </span>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>