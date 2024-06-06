<?php namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'quantity', 'checked_out', 'updated_at'];

    public function getCartItems($userId)
    {
        return $this->select('cart.*, menu.nama, menu.harga, menu.foto')
                    ->join('menu', 'menu.id = cart.product_id')
                    ->where('cart.user_id', $userId)
                    ->where('cart.checked_out', 0) // Only fetch items that are not checked out
                    ->findAll();
    }

    public function getCartItem()
    {
        return $this->select('cart.*, menu.nama, menu.harga, menu.foto')
                    ->join('menu', 'menu.id = cart.product_id')
                    ->findAll();
    }

    public function increaseItemQuantity($itemId)
    {
        $this->set('quantity', 'quantity + 1', false)
             ->where('id', $itemId)
             ->update();
    }

    public function decreaseItemQuantity($itemId)
    {
        $this->set('quantity', 'quantity - 1', false)
             ->where('id', $itemId)
             ->update();
    }

    public function checkoutItems($userId)
    {
        $this->set('checked_out', 1)
             ->where('user_id', $userId)
             ->update();
    }
}
