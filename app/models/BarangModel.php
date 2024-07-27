<?php 

class BarangModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function show()
    {
        $this->db->query('SELECT * FROM barang');
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM barang WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function add($data)
    {
        $query = "INSERT INTO barang (nama_barang, satuan, keterangan, id_user) VALUES (:nama_barang, :satuan, :keterangan, :id_user)";

        $this->db->query($query);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('id_user', $_SESSION['user']['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE barang SET
                    nama_barang = :nama_barang,
                    satuan = :satuan,
                    keterangan = :keterangan
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('satuan', $data['satuan']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cekStok($id,$jumlah)
    {
        $this->db->query('SELECT * FROM barang WHERE id=:id');
        $this->db->bind('id', $id);
        $barang = $this->db->single();

        if ($barang['stok'] < $jumlah){
            return false;
        }

        return $barang;
    }

    public function stockByBarang()
    {
        // Query untuk mengambil data stok barang
        $this->db->query('SELECT nama_barang, stok FROM barang');
        $result = $this->db->resultSet();;

        $barang = [];
        $stok = [];

        if (count($result) > 0) {
            foreach($result as $row){
                $barang[] = $row['nama_barang'];
                $stok[] = $row['stok'];
            }
        } 

        return [$barang, $stok];
    }
}