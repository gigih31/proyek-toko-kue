<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User</title>
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
        <a href="<?= site_url('admin/AdminDashboard') ?>" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="<?= site_url('admin/pesanan') ?>" class="nav-link text-white" >
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="<?= site_url('admin') ?>" class="nav-link text-white" >
          <svg class="bi pe-none me-2" width="16" height="16"></svg>
          Menu
        </a>
      </li>
      <li>
        <a href="<?= site_url('admin/user') ?>" class="nav-link active" aria-current="page" style="background-color: #803D3B; border-color: #803D3B;">
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
  <div class="container-fluid ">
        <h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <button class="btn btn-primary px-3 text-sm lg:text-lg rounded-md font-semibold" style="background-color: #803D3B; border-color: #803D3B;"
                        data-toggle="modal" data-target="#myModal1">
                        
                        Tambah
                    </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">nama</th> 
                                <th scope="col">status</th> 
                                
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as  $post) : ?>
                                <tr>
                                    <td><?= $post['nama'] ?></td>
                                    <td><?= $post['status'] ?></td>
                                    

                                    <td>    
                                       
                                        <a href="<?= site_url('admin/delete_user/' . $post['id']) ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Daftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " style="color: black;">
            <form action="<?= site_url('proses_register_meja'); ?>" method="POST" class="user">
    <div class="mb-3">
        <label for="nama" class="form-label" >Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" id="nama">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" name="username" class="form-control" id="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    
    <div class="text-center">
    <button type="submit" class="btn" style="background-color: #994D1C; font-weight: bold; font-size: 20px; color: #FFF;">Tambah</button>

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
