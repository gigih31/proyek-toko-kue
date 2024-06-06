<?php namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\AuthModel;
use App\Models\CartModel;
use CodeIgniter\Controller;

class MenuController extends Controller
{
    private $MenuModel;

    public function __construct() {
        $this->menuModel = new MenuModel();
        $this->session = \Config\Services::session();

    }
    public function listmenu()
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

            $cartItems = $cartModel->getCartItems($user['id']);
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalPrice += $item['harga'] * $item['quantity'];
            }

            return view('usermenu', array_merge($data, [
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'user' => $user
            ]));
        }
        else{
            $cartItems = $cartModel->getCartItem();
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalPrice += $item['harga'] * $item['quantity'];
            }

            return view('usermenu', array_merge($data, [
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'user' => $user
            ]));
        }
}
public function search()
    {
        // Get the search query
        $query = $this->request->getGet('q');

        // Initialize models
        $cartModel = new CartModel();
        $authModel = new AuthModel();
        $session = session();
        $user = null;

        if ($query) {
            // Search the menu items
            $data['menu'] = $this->menuModel->like('nama', $query)->findAll();
        } else {
            $data['menu'] = $this->menuModel->findAll();
        }

        if ($session->get('logged_in')) {
            $username = $session->get('username');
            $user = $authModel->where('username', $username)->first();

            $cartItems = $cartModel->getCartItems($user['id']);
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalPrice += $item['harga'] * $item['quantity'];
            }

            return view('usermenu', array_merge($data, [
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'user' => $user
            ]));
        } else {
            $cartItems = $cartModel->getCartItem();
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalPrice += $item['harga'] * $item['quantity'];
            }

            return view('usermenu', array_merge($data, [
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'user' => $user
            ]));
        }
    }
    public function index() {
        $data['menu'] = $this->menuModel->findAll();
        return view('menu', $data);
    }
    public function index2() {
        $data['menu'] = $this->menuModel->findAll();
        return view('Dashboard', $data);
    }
    public function listmenu1() {
       
        $data['menu'] = $this->menuModel->findAll();
        return view('usermenu', $data);
    }
    
    public function detailmenu($id) {
        $cartModel = new CartModel();
        $authModel = new AuthModel();
        $data['menu'] = $this->menuModel->find($id);
        $session = session();
        $user = null;

        if ($session->get('logged_in')) {
            $username = $session->get('username');
            $user = $authModel->where('username', $username)->first();

            $cartItems = $cartModel->getCartItems($user['id']);
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalPrice += $item['harga'] * $item['quantity'];
            }

            $data['user'] = $this->session->get('id');
        return view('userdetailmenu', array_merge($data, [
        'cartItems' => $cartItems,
        'totalPrice' => $totalPrice,
        'user' => $user
    ]));
        }
        else{
            $cartItems = $cartModel->getCartItem();
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalPrice += $item['harga'] * $item['quantity'];
            }

            $data['user'] = $this->session->get();
    return view('userdetailmenu', array_merge($data, [
        'cartItems' => $cartItems,
        'totalPrice' => $totalPrice,
        'user' => $user
    ]));
        }
    }
    
    
    
    public function create() {
        return view('create_menu');
    }

    public function store() {
        // Create a new MenuModel instance
        $menu = new MenuModel();
    
        // Retrieve the uploaded file
        $foto = $this->request->getFile('foto');
    
        // Check if the file is valid and not moved
        if ($foto->isValid() && ! $foto->hasMoved()) {
            // Generate a unique name for the file
            $namafoto = $foto->getRandomName();
    
            // Move the file to the 'uploads' directory
            $foto->move('uploads/', $namafoto);
    
            // Get other post data
            $data = [
                "nama" => $this->request->getPost('nama'),
                "kategori" => $this->request->getPost('kategori'),
                "rincian" => $this->request->getPost('rincian'), // corrected
                "harga" => $this->request->getPost('harga'),
                "foto" => $namafoto, // corrected
            ];
    
            // Save the data to the database
            $menu->save($data);
    
            // Redirect to the AdminMenu page
            return redirect()->to('admin');
        } else {
            // Handle the case where the file is not valid or not moved
            // You may want to return an error message or handle it differently
        }
    }
    
    public function edit($id) {
        $data['menu'] = $this->menuModel->find($id);
        return view('edit_menu', $data);
    }

    // public function update($id)  {
    //     $data = $this->request->getPost();
    //     $this->menuModel->update($id, $data);
    //     return redirect()->to('AdminMenu');
    // }
    public function update($id)
    {
        $menu = new MenuModel();
        $data1 = $menu->find($id);
    
        $file = $this->request->getFile('foto');
        $namafoto = $data1['foto']; // Menggunakan nama foto yang sudah ada sebagai default
    
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $foto_lama = $data1['foto'];
            if (file_exists("uploads/".$foto_lama)) {
                unlink("uploads/".$foto_lama);
            }
            $namafoto = $file->getRandomName();
            $file->move('uploads/', $namafoto);
        }
    
        $data = [
            "nama" => $this->request->getPost('nama'),
            "kategori" => $this->request->getPost('kategori'),
            "rincian" => $this->request->getPost('rincian'), // Sesuai dengan koreksi Anda
            "harga" => $this->request->getPost('harga'),
            "foto" => $namafoto, // Menggunakan nama foto yang sudah ada atau nama baru jika diunggah
        ];
    
        $menu->update($id, $data); // Menggunakan model untuk melakukan update data
        return redirect()->to('admin');
    }
    




    public function delete($id) {
        $this->menuModel->delete($id);
        return redirect()->to('admin');
    }

}
