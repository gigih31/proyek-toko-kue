<?php namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\CartModel;
use App\Models\AuthModel;
use App\Models\CheckoutModel;
use CodeIgniter\Controller;

class Cart extends Controller
{
    private $MenuModel;

    public function __construct() {
        $this->menuModel = new MenuModel();
        $this->session = \Config\Services::session();

    }
    public function index()
    {
        // Initialize models
        $cartModel = new CartModel();
        $authModel = new AuthModel();
        $data['menu'] = $this->menuModel->findAll();

        $session = session();
        $user = null;
    
        if ($session->get('logged_in')) {
            $username = $session->get('username');
            $user = $authModel->where('username', $username)->first();
        }
        // Get cart items
        $cartItems = $cartModel->getCartItems($user['id']);
        $totalPrice = 0;
    
        foreach ($cartItems as $item) {
            $totalPrice += $item['harga'] * $item['quantity'];
        }
    
        // Check if user is logged in
        
    
        // Pass data to the view
        return view('fullcart', array_merge($data, [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'user' => $user
        ]));
      
    }
    public function index1()
    {
        // Initialize models
        $cartModel = new CartModel();
        $authModel = new AuthModel();
        $data['menu'] = $this->menuModel->findAll();

        $session = session();
        $user = null;
    
        if ($session->get('logged_in')) {
            $username = $session->get('username');
            $user = $authModel->where('username', $username)->first();
        }
        // Get cart items
        $cartItems = $cartModel->getCartItems($user['id']);
        $totalPrice = 0;
    
        foreach ($cartItems as $item) {
            $totalPrice += $item['harga'] * $item['quantity'];
        }
    
        // Check if user is logged in
        
    
        // Pass data to the view
        return view('checkout', array_merge($data, [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'user' => $user
        ]));
      
    }
    public function increaseQuantity($itemId)
    {
        $cartModel = new CartModel();
        $cartModel->increaseItemQuantity($itemId);
        return redirect()->to('/cart');
    }
    
    public function decreaseQuantity($itemId)
    {
        $cartModel = new CartModel();
        $cartModel->decreaseItemQuantity($itemId);
        return redirect()->to('/cart');
    }

    public function add()
    {
        $cartModel = new CartModel();
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');
        $userId = $this->request->getPost('user_id'); // Mengambil user_id dari permintaan POST
    
        // Memastikan user_id tidak null
        if (!$userId) {
            // Mengembalikan ke halaman yang sama dengan pesan kesalahan.
            return redirect()->back()->with('error', 'User ID is missing.');
        }
    
        // Memeriksa item keranjang yang ada berdasarkan product_id, user_id, dan checked_out
        $existingCartItem = $cartModel->where([
            'product_id' => $productId,
            'user_id' => $userId,
            'checked_out' => 0
        ])->first();
    
        if ($existingCartItem) {
            // Jika item sudah ada dan belum di-checkout, tambahkan jumlahnya
            $newQuantity = $existingCartItem['quantity'] + $quantity;
            $cartModel->update($existingCartItem['id'], ['quantity' => $newQuantity]);
        } else {
            // Jika item belum ada atau sudah di-checkout, masukkan item baru dengan user_id
            $cartModel->insert(['product_id' => $productId, 'quantity' => $quantity, 'user_id' => $userId, 'checked_out' => 0]);
        }
    
        return redirect()->to('menu');
    }
    

    

    public function update($cartId)
    {
        $cartModel = new CartModel();
        $quantity = $this->request->getPost('quantity');
        $cartModel->update($cartId, ['quantity' => $quantity]);

        return redirect()->to('/cart');
    }

    public function remove($cartId)
    {
        $cartModel = new CartModel();
        $cartModel->delete($cartId);

        return redirect()->to('/cart');
    }

    public function checkout()
    {
        $cartModel = new CartModel();
        $authModel = new AuthModel();
        $session = session();
        $user = null;
        $cartItems = $cartModel->getCartItem();
        $totalPrice = 0;

        if ($session->get('logged_in')) {
            $username = $session->get('username');
            $user = $authModel->where('username', $username)->first();
            $userId = $user['id'];
        } else {
            $userId = null;
        }

        foreach ($cartItems as $item) {
            $totalPrice += $item['harga'] * $item['quantity'];
        }

        return view('cart/processCheckout', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice, 'user' => $user]);
    }

    public function processCheckout()
{
    // Set timezone to UTC+7
    date_default_timezone_set('Asia/Bangkok');

    // Initialize models
    $cartModel = new CartModel();
    $authModel = new AuthModel();
    $checkoutModel = new CheckoutModel();
    $session = session();
    $user = null;

    if ($session->get('logged_in')) {
        $username = $session->get('username');
        $user = $authModel->where('username', $username)->first();
        $userId = $user['id'];
    } else {
        $userId = null;
    }

    if ($this->request->getMethod() == 'post') {
        // Process checkout
        $name = $this->request->getPost('name');
        $totalPrice = $this->request->getPost('total_price');

        // Get items that are being checked out
        $cartItems = $cartModel->getCartItems($userId);
        
        // Construct pesanan string
        $pesanan = '';
        foreach ($cartItems as $item) {
            $pesanan .= $item['nama'] . ' (' . $item['quantity'] . '), ';
        }
        $pesanan = rtrim($pesanan, ', ');

        // payment
        $paymentMethod = $this->request->getPost('payment_method');

        // Insert checkout data
        $checkoutData = [
            'user_id' => $userId,
            'name' => $name,
            'total_price' => $totalPrice,
            'pesanan' => $pesanan,
            'payment_method' => $paymentMethod,
            'created_at' => date('Y-m-d H:i:s')

        ];
        $checkoutModel->insert($checkoutData);

        // Update checked_out status on cart items
        $cartModel->checkoutItems($userId);

        // Generate QRIS if payment method is QRIS
        if ($paymentMethod === 'qris') {
            $qrisCode = $this->generateQRCode($totalPrice);
        } else {
            $qrisCode = null;
        }

        // Convert created_at timestamp to readable format
        $createdAtTimestamp = strtotime($checkoutData['created_at']);
        $readableCreatedAt = date('Y-m-d H:i:s', $createdAtTimestamp);

        // Send checkout data to the view
        $data = [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'created_at' => $readableCreatedAt,
            'user' => $user,
            'paymentMethod' => $paymentMethod,
            'qrisCode' => $qrisCode
        ];

        return view('checkout', $data);
    } else {
        // Display cart items
        // You can add code here to display cart items if needed
    }
}

    

    private function generateQRCode($data)
    {
        // Include library PHP QR Code
        require_once APPPATH . 'ThirdParty/phpqrcode/qrlib.php';

        // Path untuk menyimpan QR code
        date_default_timezone_set('Asia/Bangkok'); // Set timezone ke UTC+7

        $timestamp = date('Ymd_His'); // Dapatkan timestamp saat ini
        $qrCodePath = WRITEPATH . 'uploads/qrcode_' . $timestamp . '.png';
        // Membuat QR code
        \QRcode::png($data, $qrCodePath, QR_ECLEVEL_L, 10);

        // Mengembalikan URL QR code
        return base_url('writable/uploads/' . basename($qrCodePath));
    }


}
