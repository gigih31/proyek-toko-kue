<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("node_modules/bootstrap/dist/css/bootstrap.min.css") ?>" />
    <link rel="stylesheet" href="<?= base_url("css/maincss.css") ?>" />
    
    <style>
    </style>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    $(document).ready(function(){
        feather.replace();
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
<body class="bg-image image-menu">
<nav id="navbar" class="navbar navbar-expand-lg container-fluid navbar-slide-down" style="background-color: rgba(1, 1, 1, 0.8); border-bottom: 1px solid #513c28;">
  <a class="navbar-brand" href="#">
    <img src="../assets/logologin.png" alt="Logo" width="200px" height="auto" class="d-inline-block align-text-top">
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
<div class=" container-fluid justify-content-center align-items-center" style=" display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 150px;" id="checkoutModal">
    <div class="card shadow-sm " style="  width: 50%; ">
    <div class="card-body justify-content-center align-items-center" style="">
    </div>
    <div class="modal-dialog">
    <div class="modal-content">

<!-- Modal Header -->
<div class="container-header" style="display: flex; justify-content: center; align-items: center;">
    <h4 class="modal-title">Checkout Successful</h4>
</div>

<div class="body" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <a>Checkout Time: <?= $created_at ?></a>
    <?php if ($paymentMethod === 'qris' && $qrisCode): ?>
        <img src="<?= "../uploads/qris.png" ?>" alt="QR Code" class="img-fluid" style="height: 300px; width: auto;">
    <?php else: ?>
        <table class="table" style="margin: 0 auto; text-align: center;">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cartItems as $item): ?>
        <tr>
            <td><?= $item['nama'] ?></td>
            <td><?= $item['quantity'] ?></td>
            <td>Rp. <?= $item['harga'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div style="display: flex; justify-content: space-between; margin: 20px;">
    <span>Total Price:</span>
    <span>Rp. <?= $totalPrice ?></span>
</div>

<?php endif; ?>

</div>

<!-- Modal footer -->


</div>

        </div>
    </div>
    
        
    </div>
</body>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.min.js") ?>"> </script>