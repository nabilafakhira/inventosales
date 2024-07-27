<?php

class MenuModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function show()
    {
        $this->db->query('SELECT * FROM menu');
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM menu WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function add($data)
    {
        $slug = strtolower($data['nama_menu']);
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);
        $slug = trim($slug, '-');

        $query = "INSERT INTO menu (id, nama_menu, keterangan) VALUES (:id, :nama_menu, :keterangan)";

        $this->db->query($query);
        $this->db->bind('id', $slug);
        $this->db->bind('nama_menu', $data['nama_menu']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

}
