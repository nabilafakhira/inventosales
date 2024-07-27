<?php
require_once 'Login.php';

class Dashboard extends Controller{
    private $loginController;

    public function __construct() {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function getAjax(){
        $data['penjualanSebulan'] = $this->model('PenjualanModel')->penjualanSebulan();
        $data['stokBarang'] = $this->model('BarangModel')->stockByBarang();
        echo json_encode($data);
    }

    public function index() {
        $count_pembelian = $this->model('PembelianModel')->count();
        $count_penjualan = $this->model('PenjualanModel')->count();
        $count_pelanggan = $this->model('PelangganModel')->count();
        $data['count_pembelian'] = $count_pembelian['count'];
        $data['count_penjualan'] = $count_penjualan['count'];
        $data['count_pelanggan'] = $count_pelanggan['count'];
        $data['count_revenue'] = $this->model('PenjualanModel')->countRevenue();
        $data['top_5_penjualan_barang'] = $this->model('PenjualanModel')->labaRugi();

        $data['judul'] = 'Dashboard';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('dashboard', $data);
        $this->view('templates/footer');
    }
}
