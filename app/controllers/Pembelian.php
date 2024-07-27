<?php
require_once 'Login.php';

class Pembelian extends Controller{
    private $loginController;

    public function __construct() {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function index() {
        $data['judul'] = 'Pembelian';
        $data['pembelian'] = $this->model('PembelianModel')->show();
        $data['barang'] = $this->model('BarangModel')->show();
        $data['supplier'] = $this->model('SupplierModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('pembelian/index', $data);
        $this->view('pembelian/footer');
    }

    public function tambah(){
        if($_SESSION['user']['nama_akses'] != 'Admin'){
            $supplier = $this->model('SupplierModel')->getByUserId($_SESSION['user']['id']);
            $_POST['id_supplier'] = $supplier['id'];
        }
        if( $this->model('PembelianModel')->add($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil ditambahkan','success');
            header('Location: ' . BASEURL . '/pembelian');
            exit;
        } else {
            Flasher::setFlash('Data gagal ditambahkan','error');
            header('Location: ' . BASEURL . '/pembelian');
            exit;
        }
    }

    public function edit(){
        if( $this->model('PembelianModel')->update($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil diubah','success');
            header('Location: ' . BASEURL . '/pembelian');
            exit;
        } else {
            Flasher::setFlash('Data gagal diubah','error');
            header('Location: ' . BASEURL . '/pembelian');
            exit;
        }
    }

    public function hapus($id){
        if( $this->model('PembelianModel')->delete($id) > 0 ) {
            Flasher::setFlash('Data berhasil dihapus','success');
            header('Location: ' . BASEURL . '/pembelian');
            exit;
        } else {
            Flasher::setFlash('Data gagal dihapus','error');
            header('Location: ' . BASEURL . '/pembelian');
            exit;
        }
    }
}
