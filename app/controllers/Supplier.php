<?php
require_once 'Login.php';

class Supplier extends Controller{
    private $loginController;

    public function __construct() {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function index() {
        $data['judul'] = 'Supplier';
        $data['supplier'] = $this->model('SupplierModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('supplier/index', $data);
        $this->view('supplier/footer');
    }

    public function tambah(){
        if( $this->model('SupplierModel')->add($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil ditambahkan','success');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        } else {
            Flasher::setFlash('Data gagal ditambahkan','error');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }

    public function edit(){
        if( $this->model('SupplierModel')->update($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil diubah','success');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        } else {
            Flasher::setFlash('Data gagal diubah','error');
            header('Location: ' . BASEURL . '/supplier');
            exit;
        }
    }
}
