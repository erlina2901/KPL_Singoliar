  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
        </li>
      </ol>

      <!-- Content Row -->
      <div class="row">

        <div class="col-xl mb-4">
          <a href="<?= filter_var(base_url(), FILTER_DEFAULT) . 'admin/user' ?>">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      $connection = mysqli_connect("localhost", "root", "", "singo");

                      $query = "SELECT id FROM user ORDER BY id";
                      $query_run = mysqli_query($connection, $query);

                      $row = mysqli_num_rows($query_run);
                      echo '<h3> Total : ' . $row . '</h3>';
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-xl mb-4">
          <a href="<?= base_url() . 'admin/alat_berat' ?>">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Alat Berat</div>
                    <div class="h3 mb-0 font-weight-bold text-gray-800">
                      <?php
                      $connection = mysqli_connect("localhost", "root", "", "singo");

                      $query = "SELECT id_alat FROM alat ORDER BY id_alat";
                      $query_run = mysqli_query($connection, $query);

                      $row = mysqli_num_rows($query_run);
                      echo '<h3> Total : ' . $row . '</h3>';
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-key fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl mb-4">
          <a href="<?= base_url() . 'admin/sewa' ?>">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Penyewaan</div>
                    <div class="h3 mb-0 font-weight-bold text-gray-800">
                      <?php
                      $connection = mysqli_connect("localhost", "root", "", "singo");

                      $query = "SELECT id_sewa FROM sewa1 ORDER BY id_sewa";
                      $query_run = mysqli_query($connection, $query);

                      $row = mysqli_num_rows($query_run);
                      echo '<h3> Total : ' . $row . '</h3>';
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>

        

      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->
