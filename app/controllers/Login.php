<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('auth/login');
    }

    public function action()
    {
        $login = $this->model('UserModel')->attemptLogin($_POST);

        if ($login) {
            $_SESSION['user'] = [
                'id' => $login['id'],
                'username' => $login['username'],
                'nama_akses' => $login['nama_akses'],
            ];
            header('Location: ' . BASEURL);
            exit;
        } else {
            Flasher::errorLogin();
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    // Middleware untuk memeriksa login
    public function checkLogin(){
        if (!isset($_SESSION['user'])) {
            // Jika pengguna belum login, redirect ke halaman login
            header('Location: ' . BASEURL . '/login');
            exit();
        }
    }

    // Middleware untuk memeriksa hak akses
    public function cekRole($requiredAccess){
        if ($_SESSION['user']['nama_akses'] !== $requiredAccess) {
            return false;
        }
        return true;
    }
}
