<?php namespace App\Models;

use CodeIgniter\Model;

class CheckoutModel extends Model
{
    protected $table = 'checkout';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'total_price', 'pesanan', 'payment_method','bayar', 'created_at'];

    public function __construct()
    {
        parent::__construct();
    }

    public function saveOrderDetails($userId, $name, $totalPrice, $pesanan, $paymentMethod)
    {
        $data = [
            'user_id' => $userId,
            'name' => $name,
            'total_price' => $totalPrice,
            'pesanan' => $pesanan,
            'payment_method' => $paymentMethod,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $this->insert($data);
    }
}
