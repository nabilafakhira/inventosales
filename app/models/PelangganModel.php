<?php 
require_once 'HakAksesModel.php';
class PelangganModel {
    private $db;
    private $hak_akses;

    public function __construct()
    {
        $this->db = new Database;
        $this->hak_akses = new HakAksesModel;
    }

    public function show()
    {
        $this->db->query('SELECT pelanggan.id as pelanggan_id, nama, username, email, telepon, alamat, pelanggan.tanggal_dibuat FROM pelanggan join user on user.id = pelanggan.id_user');
        return $this->db->resultSet();
    }

    public function getByUserId($id)
    {
        $this->db->query('SELECT * FROM pelanggan WHERE id_user=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function add($data)
    {
        $hashed_password = password_hash(DEFAULT_PASSWORD, PASSWORD_DEFAULT);
        $query1 = "INSERT INTO user (username, password, id_akses) VALUES (:username, :password, :id_akses)";
        $hak_akses = $this->hak_akses->getByName("Pelanggan");
        
        $this->db->query($query1);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $hashed_password);
        $this->db->bind('id_akses', $hak_akses['id']);

        $this->db->execute();

        $id_user = $this->db->lastInsertId();

        $query2 = "INSERT INTO pelanggan (id_user, nama, email, telepon, alamat) VALUES (:id_user, :nama, :email, :telepon, :alamat)";
        
        $this->db->query($query2);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telepon', '+62'.$data['telepon']);
        $this->db->bind('alamat', $data['alamat']);

        $this->db->execute();


        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE pelanggan SET
                    nama = :nama,
                    email = :email,
                    telepon = :telepon,
                    alamat = :alamat
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telepon', $data['telepon']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function count(){
        $this->db->query('SELECT count(*) as count FROM pelanggan');
        return $this->db->single();
    }
}