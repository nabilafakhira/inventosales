<?php
require_once 'Login.php';

class HakAkses extends Controller{
    private $loginController;

    public function __construct() {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function index() {
        $data['judul'] = 'Hak Akses';
        $data['hak_akses'] = $this->model('HakAksesModel')->show();
        $data['menu'] = $this->model('MenuModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('hakakses/index', $data);
        $this->view('hakakses/footer');
    }

    public function edit(){
        if( $this->model('HakAksesModel')->update($_POST) > 0 ) {
            Flasher::setFlash('Data berhasil diubah','success');
            header('Location: ' . BASEURL . '/hakakses');
            exit;
        } else {
            Flasher::setFlash('Data gagal diubah','error');
            header('Location: ' . BASEURL . '/hakakses');
            exit;
        }
    }
}
