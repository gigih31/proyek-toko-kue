<?php namespace App\Controllers;

use App\Models\PengumumanModel;
use CodeIgniter\Controller;

class PengumumanController extends Controller
{
    private $pengumumanModel;

    public function __construct() {
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index() {
        $data['pengumuman'] = $this->pengumumanModel->findAll();
        return view('pengumuman', $data);
    }

    public function create() {
        return view('create_pengumuman');
    }

    public function store() {
        $data = $this->request->getPost();
        $this->pengumumanModel->save($data);
        return redirect()->to('/admin');
    }

    public function edit($id) {
        $data['pengumuman'] = $this->pengumumanModel->find($id);
        return view('edit_pengumuman', $data);
    }

    public function update($id) {
        $data = $this->request->getPost();
        $this->pengumumanModel->update($id, $data);
        return redirect()->to('/admin');
    }

    public function delete($id) {
        $this->pengumumanModel->delete($id);
        return redirect()->to('/admin');
    }
}
