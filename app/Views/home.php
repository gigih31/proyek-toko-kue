<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/maincss.css") ?>" />
    
    <style>
    </style>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
     .navbar-nav .nav-link,
    .navbar-brand,
    .offcanvas-title,
    .dropdown-item {
      color: white !important;
    }
    .navbar-nav .nav-link:hover,
    .navbar-brand:hover,
    .offcanvas-title:hover,
    .dropdown-item:hover {
      color: #513c28 !important;
    }
    .btn-close {
      filter: invert(1);
    }
  </style>
</head>

<body >

<nav id="navbar" class="navbar navbar-expand-lg container-fluid navbar-slide-down" style="background-color: rgba(1, 1, 1, 0.8); border-bottom: 1px solid #513c28;">
  <a class="navbar-brand" href="#">
    <img src="../assets/logologin.png" alt="Logo" width="200px" height="auto" class="d-inline-block align-text-top">
  </a>
  
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <form class="d-flex ms-auto" role="search" action="<?= site_url('search') ?>" method="GET">
    <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search" name="q" style="width: 550px; height: 30px; background-color: #D9D9D9; color: #994D1C">
      <button type="submit"></button>
    </form>
  </div>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navbar Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= site_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('menu') ?>">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">Cart</a>
        </li>
        <?php if (isset($user)): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $user['nama']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              
              <a class="dropdown-item" href="<?= site_url('/logout') ?>">Logout</a>
              <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#myModal3">Edit Password</a>
            </div>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal1">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#myModal2">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Offcanvas for Cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasCartLabel">Cart</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php if (isset($user)): ?>
        <?php if (count($cartItems) > 0): ?>
            <?php foreach ($cartItems as $item): ?>
                <div class="dropdown-item">
                    <div class="item-details">
                        <?= esc($item['nama']) ?> x <?= esc($item['quantity']) ?>
                    </div>
                    <div class="item-price">
                        Rp.<?= esc($item['harga'] * $item['quantity']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr class="dropdown-divider">
            <div class="dropdown-item">
                <div class="item-details fw-bold">
                    Total:
                </div>
                <div class="item-price">
                    Rp.<?= esc($totalPrice) ?>
                </div>
            </div>
            <div class="dropdown-item text-center">
                <a href="/cart" class="btn btn-primary btn-sm">View Cart</a>
            </div>
        <?php else: ?>
            <div class="dropdown-item text-center">
                Your cart is empty.
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="dropdown-item text-center">
            Please log in first.
        </div>
    <?php endif; ?>
</div>
</div>



<section class="hero bg-image-home1" id="home">
    <main class="content">
        <h1>Kedai nyaman  <h1>dan Nikmat</h1></h1>
        <p>
          Nikmati kenyamanan anda di kedai kami dengan berbagai macam hidangan yang nikmat dilidah
        </p>
        <a href="<?= site_url('menu') ?>" class="cta">Beli Sekarang</a>
      </main>
<!-- <nav>
    <div class="container" style="position: relative;">
        <div class="row justify-content-between align-items-center" style="position: absolute; top: 30px; left: 10%; transform: translateX(-50%);">
            <div class="col-auto">
                <div class="logo">
                    <img src="../assets/logologin.png" alt="Nama Perusahaan" style=" width: 200px; height: auto;">
                </div>
            </div>
            <div class="col-auto" >
                <button class="h4 btn text-light btn-block" data-toggle="modal" data-target="#myModal1" style="text-decoration: none; background-color: #994D1C; ">Daftar</button>
            </div>
            <div class="col-auto">
                <button class="h4 text-light" data-toggle="modal" data-target="#myModal1" style="text-decoration: none; background-color: transparent; border: none;">Daftar</button>
            </div>
        </div>
    </div>
</nav> -->



</section>
<section class="bg-image-home2 text-center " id="about" >
<h2 style="padding-top: 150px; font-weight: bold;"><span>Tentang</span> Kami</h2>
  <div class="container" style="padding-top: 20px;">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6">
        <div class="about-img">
          <!-- Tambahkan gambar atau konten lainnya di sini -->
        </div>
      </div>
      <div class="col-md-6">
        <div class="content text-md-left">
          <h3>Selamat datang di Kedai Kami!</h3>
          <p style="font-weight: bold;">  Kami adalah tempat yang sempurna bagi 
            pecinta dessert dan minuman spesial, menawarkan beragam pilihan hidangan manis dan minuman 
            yang dibuat dengan penuh cinta dan dedikasi. 
              sebagai destinasi kuliner Anda!</p>
              <p style="font-weight: bold;">Setiap minuman kami diseduh dari bahan pilihan 
            terbaik, dan setiap dessert dibuat dari bahan-bahan segar berkualitas tinggi.</p>
          
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Daftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " style="color: black;">
            <form action="<?= site_url('proses_register_pelanggan'); ?>" method="POST" class="user">
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
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " style="color: black;">
            <form action="<?= site_url('login'); ?>" method="post" class="user" style="padding: 5px; ">
                <div class="row justify-content-left">
                    <h1 class="h4 text-light " style="font-weight: normal; font-size: 20px;">Username</h1>
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
            <form action="<?= site_url('user/proses_ganti_password'); ?>" method="POST" class="user">
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


<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.min.js") ?>"> </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var cartOffcanvas = document.getElementById('offcanvasCart');
    var navbar = document.getElementById('navbar');

    cartOffcanvas.addEventListener('show.bs.offcanvas', function() {
      navbar.classList.remove('navbar-slide-down');
      navbar.classList.add('navbar-slide-up');
    });

    cartOffcanvas.addEventListener('hidden.bs.offcanvas', function() {
      navbar.classList.remove('navbar-slide-up');
      navbar.classList.add('navbar-slide-down');
    });
  });
</script>
</body>
<footer>
      <div class="social">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
      </div>

      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Created by<a href="">gigih lumintang</a>.| &copy;2024.</p>
      </div>
    </footer>