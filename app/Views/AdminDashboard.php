<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pesanan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>" />
</head>
<body>
    <div class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height:100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="#" class="nav-link active" aria-current="page" style="background-color: #803D3B; border-color: #803D3B;">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="<?= site_url('admin/pesanan') ?>" class="nav-link text-white"  >
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="<?= site_url('admin') ?>" class="nav-link text-white" >
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="<?= site_url('admin') ?>"></use></svg>
          Menu
        </a>
      </li>
      <li>
        <a href="<?= site_url('admin/user') ?>" class="nav-link text-white" >
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Customers
        </a>
      </li>
      <li>
      <a  class="nav-link text-white"data-toggle="modal" data-target="#myModal3">
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Edit Password
       </a>
      </li>

    </ul>
    <hr>
    <!-- <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div> -->
  </div>
  <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        
        <div class="row">
            <!-- 3 Menu Terfavorit -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    3 Menu Terfavorit
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <ul>
                                        <?php foreach($topMenus as $menu => $jumlah): ?>
                                            <li><?= $menu ?> (<?= $jumlah ?> pesanan)</li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-utensils fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Pesanan yang Sedang Diproses -->
            <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body d-flex align-items-center justify-content-center">
            <div class="row no-gutters align-items-center text-center">
                <div class="col">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pesanan yang Sedang Diproses
                    </div>
                    <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $processingOrdersCount ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-tasks fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body d-flex align-items-center justify-content-center">
            <div class="row no-gutters align-items-center text-center">
                <div class="col">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pesanan yang Belum Dibayar
                    </div>
                    <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $pendingOrdersCount ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-tasks fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body d-flex align-items-center justify-content-center">
            <div class="row no-gutters align-items-center text-center">
                <div class="col">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pesanan yang sudah selesai dilayani
                    </div>
                    <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $completeOrdersCount ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-tasks fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


            <!-- Jumlah User -->
            <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body d-flex align-items-center justify-content-center">
            <div class="row no-gutters align-items-center">
                <div class="col text-center">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Jumlah User
                    </div>
                    <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $usersCount ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menambah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="<?= site_url('admin/menu_store'); ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama makanan</label>
        <input type="text" name="nama" class="form-control" id="nama">
    </div>
    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <input type="text" name="kategori" class="form-control" id="kategori">
    </div>
    <div class="mb-3">
        <label for="rincian" class="form-label">Rincian</label>
        <input type="text" name="rincian" class="form-control" id="rincian">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" name="harga" class="form-control" id="harga">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="foto" id="customFile">
            <label class="custom-file-label" for="customFile">Pilih file</label>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Ganti Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " style="color: black;">
            <form action="<?= site_url('admin/proses_ganti_password'); ?>" method="POST" class="user">
    <div class="mb-3">
        <label for="curent_password" class="form-label" >Password saat ini</label>
        <input type="password" name="current_password" class="form-control" id="email">
    </div>
    <div class="mb-3">
        <label for="curent_password" class="form-label" >New Password</label>
        <input type="password" name="new_password"  class="form-control" id="email">
    </div>
    <div class="mb-3">
        <label for="curent_password" class="form-label" >Confirm New Password:</label>
        <input type="password"  name="confirm_password" class="form-control" id="email">
    </div>
    
    <div class="text-center">
    <button type="submit" class="btn" style="background-color: #994D1C; font-weight: bold; font-size: 20px; color: #FFF;">Reset Password</button>

    </div>
</form>

            </div>
        </div>
    </div>
</div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
