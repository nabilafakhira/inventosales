<?php
require_once 'Login.php';

class Admin extends Controller{
    private $loginController;

    public function __construct() {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function index() {

        $data['judul'] = 'Admin';
        $data['admin'] = $this->model('AdminModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('admin/index', $data);
        $this->view('admin/footer');
    }

    public function tambah(){

        if( $this->model('AdminModel')->add($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil ditambahkan','success');
            header('Location: ' . BASEURL . '/admin');
            exit;
        } else {
            Flasher::setFlash('Data gagal ditambahkan','error');
            header('Location: ' . BASEURL . '/admin');
            exit;
        }
    }

    public function edit(){
        if( $this->model('AdminModel')->update($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil diubah','success');
            header('Location: ' . BASEURL . '/admin');
            exit;
        } else {
            Flasher::setFlash('Data gagal diubah','error');
            header('Location: ' . BASEURL . '/admin');
            exit;
        }
    }
}
