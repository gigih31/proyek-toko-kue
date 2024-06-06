<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $menu['nama']; ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/maincss.css") ?>" />
    <style>
    </style>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="bg-image image-menu">

<nav id="navbar" class="navbar navbar-expand-lg container-fluid navbar-slide-down" style="background-color: rgba(1, 1, 1, 0.8); border-bottom: 1px solid #513c28;">
  <a class="navbar-brand" href="#">
    <img src="<?= base_url("assets/logologin.png") ?>" alt="Logo" width="200px" height="auto" class="d-inline-block align-text-top">
  </a>
  
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $user['nama']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <a class="dropdown-item" href="<?= site_url('/logout') ?>">Logout</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#myModal3">edit password</a>
                    </div>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#myModal1">Daftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#myModal2">Login</a>
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

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5" style="padding-top: 100px; padding-bottom: 100px;">
        <div class="row gx-4 gx-lg-5 align-items-center justify-content-between">
            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col-lg-10">
                        <div class="card bayang" style="border-radius: 30px;">
                            <img src="<?= base_url("uploads/".$menu['foto']) ?>" class="bd-placeholder-img card-img-top" style="border-top-left-radius: 30px; border-top-right-radius: 30px;"  width="100%" height="300" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <div class="card-body kotakkayu" style="border-bottom-left-radius: 30px; border-bottom-right-radius: 30px;">
                                <p class="text-light" style="font-size: 20px; font-weight: bold;"></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    
                                    <p class="text-light" style="font-size: 20px; font-weight: bold;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder"><?= $menu['nama']; ?></h1>
                <div class="fs-5 mb-5">
                    <span>Rp.<?= $menu['harga']; ?></span>
                </div>
                <p class="lead"><?= $menu['rincian']; ?></p>
                <div class="d-flex">
                <?php if (isset($user)): ?>
                    <form action="<?= base_url('cart/add') ?>" method="post">
                        <input type="hidden" name="product_id" value="<?= $menu['id']; ?>">
                        <input type="hidden" name="user_id" value="<?= $user['id']; ?>"> <!-- Ganti kurung kurawal dengan kurung siku -->
                        <div class="d-flex align-items-center">
                            <input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="number" value="1" style="max-width: 3rem">
                            <button class="btn btn-outline-light flex-shrink-0" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                            </button>
                        </div>

                    </form>
                    <?php else: ?>
                        <button class="btn"  data-toggle="modal" data-target="#myModal2" style="background-color: #994D1C; font-weight: bold; font-size: 20px; color: #FFF;">
                        login first
                        </button>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
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
</body>


<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
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
