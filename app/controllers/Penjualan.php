<?php
require_once 'Login.php';

class Penjualan extends Controller
{
    private $loginController;

    public function __construct()
    {
        $this->loginController = new Login();
        $this->loginController->checkLogin();
    }

    public function index(){
        $data['judul'] = 'Penjualan';
        $data['penjualan'] = $this->model('PenjualanModel')->show();
        $data['barang'] = $this->model('BarangModel')->show();
        $data['pelanggan'] = $this->model('PelangganModel')->show();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('penjualan/index', $data);
        $this->view('penjualan/footer');
    }

    public function setHargaJual()
    {
        if (isset($_POST['id_barang'])) {
            $id_barang = $_POST['id_barang'];
            $harga = $this->model('PembelianModel')->getHargaBeliMax($id_barang);
            $harga_jual = $harga['harga_beli'] + ($harga['harga_beli'] * 20 / 100);
            echo json_encode(['harga_jual' => $harga_jual]);
        }
    }


    public function tambah(){
        if($_SESSION['user']['nama_akses'] != 'Admin'){
            $pelanggan = $this->model('PelangganModel')->getByUserId($_SESSION['user']['id']);
            $_POST['id_pelanggan'] = $pelanggan['id'];
        }
        $cekstok = $this->model('BarangModel')->cekStok($_POST['id_barang'], $_POST['jumlah_penjualan']);
        if ($cekstok) {
            if ($this->model('PenjualanModel')->add($_POST) > 0) {
                Flasher::setFlash('Data berhasil ditambahkan', 'success');
                header('Location: ' . BASEURL . '/penjualan');
                exit;
            } else {
                Flasher::setFlash('Data gagal ditambahkan', 'error');
                header('Location: ' . BASEURL . '/penjualan');
                exit;
            }
        } else {
            Flasher::setFlash('Stok barang kurang', 'error');
            header('Location: ' . BASEURL . '/penjualan');
            exit;
        }
    }

    public function edit(){
        $cekstok = $this->model('BarangModel')->cekstok($_POST['id_barang'], $_POST['jumlah_penjualan']);
        if ($cekstok) {
            if ($this->model('PenjualanModel')->update($_POST) > 0) {
                Flasher::setFlash('Data berhasil diubah', 'success');
                header('Location: ' . BASEURL . '/penjualan');
                exit;
            } else {
                Flasher::setFlash('Data gagal diubah', 'error');
                header('Location: ' . BASEURL . '/penjualan');
                exit;
            }
        } else {
            Flasher::setFlash('Stok barang kurang', 'error');
            header('Location: ' . BASEURL . '/penjualan');
            exit;
        }
    }

    public function hapus($id){

        if ($this->model('PenjualanModel')->delete($id) > 0) {
            Flasher::setFlash('Data berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/penjualan');
            exit;
        } else {
            Flasher::setFlash('Data gagal dihapus', 'error');
            header('Location: ' . BASEURL . '/penjualan');
            exit;
        }
    }
}
