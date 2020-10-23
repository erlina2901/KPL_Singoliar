<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-dark position-fixed elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link float-center">
  <div class="sidebar-brand-icon">
    <i class="fas fa-laugh-wink fa-2x"></i>
    <span class="sidebar-brand-text mx-3">Admin Singo Liar</span>
  </div>
  </a>

  <!-- Sidebar -->
  <div class="sidebar ">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <a href="<?= filter_var(base_url('admin/profile'), FILTER_DEFAULT) ?>">
        <div class="image">
          <img src="<?= base_url('assets/img/avatar/') . $admin['image']; ?>" class="img-rounded elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= filter_var(base_url('admin/profile'), FILTER_DEFAULT) ?>" class="d-block"> <?= $admin['name']; ?> </a>
        </div>
      </a>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
        <li class="nav-header">Pengguna</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/user" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              User
            </p>
          </a>
        </li>

       
        <li class="nav-header">Transaksi</li>
        <li class="nav-item">
          <a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>admin/sewa" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
             Penyewaan
            </p>
          </a>
        </li>
        <li class="nav-header">Alat</li>
        <li class="nav-item">
          <a href="<?= filter_var(base_url(), FILTER_DEFAULT) ?>admin/alat_berat" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Alat Berat
            </p>
          </a>
        </li>

      

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?= filter_var(base_url() . 'auth/logout', FILTER_DEFAULT); ?>">Ya</a>
      </div>
    </div>
  </div>
</div>
