<?php
require_once 'Login.php';

class Barang extends Controller
{
    private $loginController;

    public function __construct()
    {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function index()
    {

        $data['judul'] = 'Barang';
        $data['barang'] = $this->model('BarangModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('barang/index', $data);
        $this->view('barang/footer');
    }

    public function tambah()
    {

        if ($this->model('BarangModel')->add($_POST) > 0) {
            Flasher::setFlash('Data berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('Data gagal ditambahkan', 'error');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }

    public function edit()
    {

        if ($this->model('BarangModel')->update($_POST) > 0) {
            Flasher::setFlash('Data berhasil diubah', 'success');
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            Flasher::setFlash('Data gagal diubah', 'error');
            header('Location: ' . BASEURL . '/barang');
            exit;
        }
    }
}
