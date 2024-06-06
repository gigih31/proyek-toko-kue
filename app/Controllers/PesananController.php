<?php namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\AuthModel;
use App\Models\CheckoutModel;
use App\Models\CartModel;
use CodeIgniter\Controller;
class PesananController extends Controller
{
    public function __construct() {
        $this->pesananModel = new CheckoutModel();
    
    }

    public function index()
    {
        $paymentStatus = $this->request->getGet('payment_status');

        if ($paymentStatus === null || $paymentStatus === '') {
            // No filter applied, get all orders and sort by newest
            $data['checkout'] = $this->pesananModel->orderBy('created_at', 'DESC')->findAll();
        } else {
            // Filter by payment status and sort by newest
            $data['checkout'] = $this->pesananModel->where('bayar', $paymentStatus)->orderBy('created_at', 'DESC')->findAll();
        }

        return view('pesanan', $data);
    }

    public function updateStatus($id)
    {
        $order = $this->pesananModel->find($id);

        if ($order) {
            // Update status: 0 -> 1, 1 -> 2
            $newStatus = ($order['bayar'] + 1) % 3;
            $this->pesananModel->update($id, ['bayar' => $newStatus]);
        }

        return redirect()->to('/pesanan');
    }
}
