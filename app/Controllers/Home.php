<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\AuthModel;

class Home extends BaseController
{
    public function index()
    {
        // Initialize models
        $cartModel = new CartModel();
        $authModel = new AuthModel();
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

            return view('home', [
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'user' => $user
            ]);
        }
        else{
            $cartItems = $cartModel->getCartItem();
            $totalPrice = 0;

            foreach ($cartItems as $item) {
                $totalPrice += $item['harga'] * $item['quantity'];
            }

            return view('home', [
                'cartItems' => $cartItems,
                'totalPrice' => $totalPrice,
                'user' => $user
            ]);
        }
    }

    
}
