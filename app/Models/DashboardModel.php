<?php namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'checkout';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'total_price', 'pesanan', 'payment_method', 'created_at'];

    public function getTopMenus()
    {
        $query = $this->db->query("SELECT pesanan FROM checkout");
        $result = $query->getResultArray();

        $menuCounts = [];
        foreach ($result as $row) {
            $menus = explode(', ', $row['pesanan']);
            foreach ($menus as $menu) {
                // Extract menu name and quantity
                preg_match('/(.+) \((\d+)\)/', $menu, $matches);
                if (count($matches) == 3) {
                    $menuName = $matches[1];
                    $quantity = intval($matches[2]);
                    if (isset($menuCounts[$menuName])) {
                        $menuCounts[$menuName] += $quantity;
                    } else {
                        $menuCounts[$menuName] = $quantity;
                    }
                }
            }
        }

        // Sort menuCounts by quantity in descending order and get top 3
        arsort($menuCounts);
        return array_slice($menuCounts, 0, 3);
    }

    public function getProcessingOrdersCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah_pesanan FROM checkout where bayar = 1 ");
        return $query->getRow()->jumlah_pesanan;
    }
    public function getProcessingOrders()
    {
        $builder = $this->db->table($this->table);
        $builder->where('bayar', 1);
        $query = $builder->get();
        return $query->getResult();
    }
    public function getPendingOrdersCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah_pesanan FROM checkout where bayar = 0 ");
        return $query->getRow()->jumlah_pesanan;
    }
    public function getPendingOrders()
    {
        $builder = $this->db->table($this->table);
        $builder->where('bayar', 0);
        $query = $builder->get();
        return $query->getResult();
    }
    public function getCompleteOrdersCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah_pesanan FROM checkout where bayar = 2 ");
        return $query->getRow()->jumlah_pesanan;
    }
    public function getUsersCount()
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah_pengguna FROM user");
        return $query->getRow()->jumlah_pengguna;
    }
}
