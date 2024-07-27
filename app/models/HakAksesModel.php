<?php 

class HakAksesModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function show()
    {
        $this->db->query('SELECT * FROM hak_akses');
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM hak_akses WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getByName($nama_akses)
    {
        $this->db->query('SELECT * FROM hak_akses WHERE nama_akses=:nama_akses');
        $this->db->bind('nama_akses', $nama_akses);
        return $this->db->single();
    }

    public function update($data)
    {
        $query = "UPDATE hak_akses SET
                    keterangan = :keterangan
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}