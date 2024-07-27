<?php 

class PembelianModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function show()
    {
        $this->db->query('SELECT pembelian.id as pembelian_id, jumlah_pembelian, harga_beli, id_barang, pembelian.id_user as user_id, id_supplier, tanggal_pembelian, nama_barang FROM pembelian join barang on barang.id = pembelian.id_barang order by tanggal_pembelian desc');
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM pembelian WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function add($data)
    {
        $query1 = "INSERT INTO pembelian (jumlah_pembelian, harga_beli, id_barang, id_user, id_supplier, tanggal_pembelian) VALUES (:jumlah_pembelian, :harga_beli, :id_barang, :id_user, :id_supplier, :tanggal_pembelian)";

        $this->db->query($query1);
        $this->db->bind('jumlah_pembelian', $data['jumlah_pembelian']);
        $this->db->bind('harga_beli', $data['harga_beli']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('id_user', $_SESSION['user']['id']);
        $this->db->bind('id_supplier', $data['id_supplier']);
        $this->db->bind('tanggal_pembelian', $data['tanggal_pembelian']);

        $this->db->execute();

        $query2 = "UPDATE barang SET stok = stok + :jumlah_pembelian where id = :id";
        
        $this->db->query($query2);
        $this->db->bind('jumlah_pembelian', $data['jumlah_pembelian']);
        $this->db->bind('id', $data['id_barang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $pembelian = $this->getById($data['id']);
        $query1 = "UPDATE barang SET stok = stok - :jumlah_pembelian where id = :id";
        
        $this->db->query($query1);
        $this->db->bind('jumlah_pembelian', $pembelian['jumlah_pembelian']);
        $this->db->bind('id', $pembelian['id_barang']);

        $this->db->execute();
        $query2 = "UPDATE pembelian SET
                    jumlah_pembelian = :jumlah_pembelian,
                    harga_beli = :harga_beli,
                    id_barang = :id_barang,
                    id_supplier = :id_supplier,
                    tanggal_pembelian = :tanggal_pembelian
                  WHERE id = :id";
        
        $this->db->query($query2);
        $this->db->bind('jumlah_pembelian', $data['jumlah_pembelian']);
        $this->db->bind('harga_beli', $data['harga_beli']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('id_supplier', $data['id_supplier']);
        $this->db->bind('tanggal_pembelian', $data['tanggal_pembelian']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        $query3 = "UPDATE barang SET stok = stok + :jumlah_pembelian where id = :id";
        
        $this->db->query($query3);
        $this->db->bind('jumlah_pembelian', $data['jumlah_pembelian']);
        $this->db->bind('id', $data['id_barang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $pembelian = $this->getById($id);
        $query1 = "UPDATE barang SET stok = stok - :jumlah_pembelian where id = :id";
        
        $this->db->query($query1);
        $this->db->bind('jumlah_pembelian', $pembelian['jumlah_pembelian']);
        $this->db->bind('id', $pembelian['id_barang']);

        $this->db->execute();

        $query2 = "DELETE FROM pembelian WHERE id = :id";
        
        $this->db->query($query2);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getHargaBeliMax($id_barang)
    {
        $this->db->query('SELECT max(harga_beli) as harga_beli FROM pembelian WHERE id_barang=:id_barang');
        $this->db->bind('id_barang', $id_barang);
        return $this->db->single();
    }

    
    public function count(){
        $this->db->query('SELECT count(*) as count FROM pembelian');
        return $this->db->single();
    }
}