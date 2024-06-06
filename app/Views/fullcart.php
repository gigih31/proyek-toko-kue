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
   <?php if ($user): ?>
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
<section>
   <div class="" style="padding-top: 150px; margin-bottom: 50px; margin-left: 150px;">
        <h2>Keranjang</h2>
   </div>
   
   <div class="main-container" style="display: flex; margin-left: 150px; gap: 20px;">
    <div class="card shadow-sm" style="border-radius: 15px; padding: 20px; width: 70%;">
    <div class="card-body">
    <?php if (isset($user)): ?>
        <?php if (count($cartItems) > 0): ?>
            <?php foreach ($cartItems as $item): ?>
                <div class="item-container" style="display: flex; margin-bottom: 10px; position: relative;">
    <img src="<?= "../uploads/" . $item['foto']; ?>" alt="<?= esc($item['nama']) ?>" style="width: 75px; height: 75px; object-fit: cover; margin-right: 10px;">
    <div class="item-details" style="flex-grow: 1;">
        <?= esc($item['nama']) ?> x <?= esc($item['quantity']) ?>
    </div>
    <div style="display: flex; flex-direction: column; align-items: flex-end; position: relative;">
        <div class="item-price" style="font-weight: bold; margin-bottom: 5px;">
            Rp.<?= esc($item['harga'] * $item['quantity']) ?>
        </div>
        <div style="display: flex; align-items: center;">
        <img src="<?= "../assets/trash.svg" ?>" id="trash" style="margin-left: 10px; cursor: pointer;" onclick="removeItemFromCart(<?= $item['id'] ?>)">
            <div class="quantity-controls" style="border: 1px solid #ccc; border-radius: 5px; display: flex; align-items: center; padding: 5px;">
                <button onclick="updateQuantity(<?= $item['id'] ?>, 'decrease')" style="border: none; background-color: #f8f9fa; padding: 5px 10px;">-</button>
                <div style="padding: 0 10px;" id="quantity-<?= $item['id'] ?>"><?= esc($item['quantity']) ?></div>
                <button onclick="updateQuantity(<?= $item['id'] ?>, 'increase')" style="border: none; background-color: #f8f9fa; padding: 5px 10px;">+</button>
            </div>
            
        </div>
    </div>
</div>

            <?php endforeach; ?>
        <?php else: ?>
            <div>
                Your cart is empty.
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div>
            Please log in first.
        </div>
    <?php endif; ?>
</div>

    </div>
    <div class="small-box shadow-sm" style="border-radius: 15px; padding: 20px; background-color: #f8f9fa; height: 200px; width: 25%; box-shadow: 0 0 10px rgba(0,0,0,0.1); color: black;">
    <div class="item-details" style="font-weight: bold;">
        Ringkasan Belanja
    </div>
    <?php if (isset($user)): ?>
        <p style="font-weight: bold;">Total Price:
            <span style="float: right;">Rp. <?= array_sum(array_map(function($item) { return $item['harga'] * $item['quantity']; }, $cartItems)) ?></span>
        </p>

        <div style="display: flex; justify-content: center;">
            <form action="<?= base_url('cart/processCheckout') ?>" method="post">
                <input type="hidden" name="name" value="<?= $user['nama']; ?>">
                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                <input type="hidden" name="total_price" value="<?= array_sum(array_map(function($item) { return $item['harga'] * $item['quantity']; }, $cartItems)) ?>">
                
                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran</label>
                    <select class="form-control" id="payment_method" name="payment_method" required>
                        <option value="cash">Cash</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>

                <button class="btn btn-user btn-block" style="background-color: #994D1C; width: 275px; height: auto; font-weight: bold; font-size: 20px; color: #fff;" type="submit">Checkout</button>
            </form>
        </div>
    <?php else: ?>
        <div>
            Please log in first.
        </div>
    <?php endif; ?>
</div>

</div>

  
</section>






<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= base_url("node_modules/bootstrap/dist/js/bootstrap.min.js") ?>"> </script>
    <script>
         $(document).ready(function(){
        $("#checkoutModal").modal('show');
    });
 function updateQuantity(itemId, action) {
        const url = action === 'increase' ? '<?= base_url('cart/increaseQuantity/') ?>' : '<?= base_url('cart/decreaseQuantity/') ?>';
        fetch(url + itemId, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            }
        }).then(response => {
            if (response.ok) {
                location.reload(); // Reload the page to reflect changes
            }
        }).catch(error => {
            console.error('Error updating quantity:', error);
        });
    }
      
    function removeItemFromCart(itemId) {
    fetch('/cart/remove/' + itemId, {
        method: 'GET',
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Gagal menghapus item dari keranjang belanja');
        }
        var itemElement = document.getElementById('item-' + itemId);
        if (itemElement) {
            itemElement.remove();
        }
        // Reload halaman setelah item dihapus
        location.reload();
    })
    .catch(error => {
        console.error('Error:', error);
        // Tangani kesalahan, tampilkan pesan kesalahan kepada pengguna, dll.
    });
}


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