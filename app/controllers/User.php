<?php
require_once 'Login.php';

class User extends Controller
{
    private $loginController;

    public function __construct()
    {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function index()
    {
        $data['judul'] = 'User';
        $data['user'] = $this->model('UserModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('user/index', $data);
        $this->view('user/footer');
    }
    
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit();
    }
}
