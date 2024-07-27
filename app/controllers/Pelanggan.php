<?php
require_once 'Login.php';

class Pelanggan extends Controller{
    private $loginController;

    public function __construct() {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }
    
    public function index() {
        $data['judul'] = 'Pelanggan';
        $data['pelanggan'] = $this->model('PelangganModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('pelanggan/index', $data);
        $this->view('pelanggan/footer');
    }

    public function tambah(){
        if( $this->model('PelangganModel')->add($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil ditambahkan','success');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        } else {
            Flasher::setFlash('Data gagal ditambahkan','error');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }

    public function edit(){
        if( $this->model('PelangganModel')->update($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil diubah','success');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        } else {
            Flasher::setFlash('Data gagal diubah','error');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }
}
