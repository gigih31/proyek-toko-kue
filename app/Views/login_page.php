<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/maincss.css") ?>" />
    <style>
        
    </style>
</head>
<body class="bg-image-login">
    <header>
        <div class="container">
            <div class="row justify-content-center" style="position: absolute; top: 30px; left: 50%; transform: translateX(-50%);">
                <div class="col-auto">
                    <div class="logo">
                        <img src="../assets/logologin.png" alt="Nama Perusahaan" style="width: 300px; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container" style="position: absolute; top: 125px; left: 50%; transform: translateX(-50%);">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: transparent;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="p-5">
        <div class="d-flex justify-content-between align-items-center mb-4"> <!-- Menggunakan d-flex untuk menyusun sejajar -->
            <h1 class="h4 text-light">Masuk</h1>
            <button class="h4 text-light" data-toggle="modal" data-target="#myModal1" style="text-decoration: none; background-color: transparent; border: none;">Daftar</button>

        </div>

            <?php if(session()->getFlashdata('message')):?>
                <div style="color: green;">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')):?>
                <div style="color: red;">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('login'); ?>" method="post" class="user" style="padding: 5px; ">
                <div class="row justify-content-left">
                    <h1 class="h4 text-light mb-2" style="font-weight: normal; font-size: 20px;">Username</h1>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <input type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Enter username...">
                </div>
                <div class="row justify-content-left">
                    <h1 class="h4 text-light mb-2" style="font-weight: normal; font-size: 20px;">Password</h1>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                </div>

                <div class="form-group d-flex justify-content-end"> <!-- Menggunakan d-flex dan justify-content-end -->
                     <a class="text-light" style="text-decoration: none;" data-toggle="modal" data-target="#myModal2">LUPA PASSWORD</a>
                </div>

                <div class="form-group text-center"> <!-- Penambahan class text-center di sini -->
                    <button class="btn btn-light btn-user btn-block " style=" width: 345px; height: auto; font-weight: bold; font-size:20px; color:#994D1C" type="submit">Login</button> <!-- Penyederhanaan class -->
                </div>

                <hr>
               
            </form>

            <hr>

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
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Daftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " style="color: black;">
            <form action="<?= site_url('proses_register_user'); ?>" method="POST" class="user">
    <div class="mb-3">
        <label for="nama" class="form-label" >Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" id="nama">
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" name="username" class="form-control" id="username">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email">
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


<div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " style="color: black;">
            <form action="<?= site_url('proses_lupa_password'); ?>" method="POST" class="user">
    <div class="mb-3">
        <label for="email" class="form-label" >Email yang Terdaftar :</label>
        <input type="text" name="email" class="form-control" id="email">
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
