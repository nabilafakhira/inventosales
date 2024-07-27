<?php
require_once 'Login.php';

class Menu extends Controller{
    private $loginController;

    public function __construct() {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function index() {
        $data['judul'] = 'Menu';
        $data['menu'] = $this->model('MenuModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('menu/index', $data);
        $this->view('menu/footer');
    }

    public function tambah(){
        if( $this->model('MenuModel')->add($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil ditambahkan','success');
            header('Location: ' . BASEURL . '/menu');
            exit;
        } else {
            Flasher::setFlash('Data gagal ditambahkan','error');
            header('Location: ' . BASEURL . '/menu');
            exit;
        }
    }
}
