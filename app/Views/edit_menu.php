<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin menu</title>
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
      <li class="nav-item">
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white" >
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link active" aria-current="page" style="background-color: #803D3B; border-color: #803D3B;">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Customers
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
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
    </div>
  </div>
  <div class="container-fluid ">
        <h1 class="h3 mb-2 text-gray-800">Daftar Menu</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <button class="btn btn-primary px-3 text-sm lg:text-lg rounded-md font-semibold" style="background-color: #803D3B; border-color: #803D3B;"
                        data-toggle="modal" data-target="#myModal1">
                        
                        Tambah
                    </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <form action="<?= site_url('admin/update_menu/' . $menu['id']); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama makanan:</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?= $menu['nama']; ?>">
    </div>
    <div class="form-group">
        <label for="kategori">Kategori:</label>
        <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $menu['kategori']; ?>">
    </div>
    <div class="form-group">
        <label for="rincian">Rincian:</label>
        <textarea type="text" class="form-control" name="rincian" id="rincian" ><?= $menu['rincian']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="text" class="form-control" name="harga" id="harga" value="<?= $menu['harga']; ?>">
    </div>
    <div class="form-group">
        <label for="foto">Foto:</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="foto" id="customFile">
            <label class="custom-file-label" for="customFile">Pilih file</label>
        </div>
    </div>
    <button  type="submit" class="btn btn-primary" style="margin-top: 20px;" >Update</button>
</form>
                </div>
            </div>
        </div>
    </div>

       


    
    </div>

   




  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
