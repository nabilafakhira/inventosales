<?php 
require_once 'AdminModel.php';
require_once 'PelangganModel.php';
require_once 'SupplierModel.php';

class UserModel {
    private $db;
    private $admin;
    private $pelanggan;
    private $supplier;

    public function __construct()
    {
        $this->db = new Database;
        $this->admin = new AdminModel;
        $this->pelanggan = new PelangganModel;
        $this->supplier = new SupplierModel;
    }

    public function show()
    {
        $this->db->query('SELECT user.id as user_id, username, password, user.tanggal_dibuat, nama_akses, hak_akses.id as hak_akses_id FROM user join hak_akses on user.id_akses = hak_akses.id');
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM user WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function add($data)
    {
        $query = "INSERT INTO user (username, password, id_akses) VALUES (:username, :password, :id_akses)";
        
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('id_akses', $data['id_akses']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $hashed_password = password_hash($data['password'], DEFAULT_PASSWORD);
        $query = "UPDATE user SET
                    username = :username,
                    password = :password
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $hashed_password);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function attemptLogin($data) {
        $query = "SELECT * FROM user WHERE username = :username LIMIT 1";

        $this->db->query($query);
        $this->db->bind(':username', $data['username']);
        $login= $this->db->single();

        if ($login> 0) {
            if (password_verify($data['password'], $login['password'])) {
                $this->db->query('SELECT user.id, username, nama_akses FROM user join hak_akses on user.id_akses = hak_akses.id WHERE username = :username');
                $this->db->bind('username', $data['username']);
                return $this->db->single();
            }
        }
        return false;
    }
}