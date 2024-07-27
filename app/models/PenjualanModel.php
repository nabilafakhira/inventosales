<?php

class PenjualanModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function show()
    {
        $this->db->query('SELECT penjualan.id as penjualan_id, jumlah_penjualan, harga_jual, id_barang, penjualan.id_user as user_id, id_pelanggan, tanggal_penjualan, nama_barang FROM penjualan join barang on barang.id = penjualan.id_barang order by tanggal_penjualan desc');
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM penjualan WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function add($data)
    {
        $query1 = "INSERT INTO penjualan (jumlah_penjualan, harga_jual, id_barang, id_user, id_pelanggan, tanggal_penjualan) VALUES (:jumlah_penjualan, :harga_jual, :id_barang, :id_user, :id_pelanggan, :tanggal_penjualan)";

        $this->db->query($query1);
        $this->db->bind('jumlah_penjualan', $data['jumlah_penjualan']);
        $this->db->bind('harga_jual', $data['harga_jual']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('id_user', $_SESSION['user']['id']);
        $this->db->bind('id_pelanggan', $data['id_pelanggan']);
        $this->db->bind('tanggal_penjualan', $data['tanggal_penjualan']);

        $this->db->execute();

        $query2 = "UPDATE barang SET stok = stok - :jumlah_penjualan where id = :id";

        $this->db->query($query2);
        $this->db->bind('jumlah_penjualan', $data['jumlah_penjualan']);
        $this->db->bind('id', $data['id_barang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        $penjualan = $this->getById($data['id']);
        $query1 = "UPDATE barang SET stok = stok + :jumlah_penjualan where id = :id";

        $this->db->query($query1);
        $this->db->bind('jumlah_penjualan', $penjualan['jumlah_penjualan']);
        $this->db->bind('id', $penjualan['id_barang']);

        $this->db->execute();
        $query2 = "UPDATE penjualan SET
                    jumlah_penjualan = :jumlah_penjualan,
                    harga_jual = :harga_jual,
                    id_barang = :id_barang,
                    id_pelanggan = :id_pelanggan,
                    tanggal_penjualan = :tanggal_penjualan
                  WHERE id = :id";

        $this->db->query($query2);
        $this->db->bind('jumlah_penjualan', $data['jumlah_penjualan']);
        $this->db->bind('harga_jual', $data['harga_jual']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('id_pelanggan', $data['id_pelanggan']);
        $this->db->bind('tanggal_penjualan', $data['tanggal_penjualan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        $query3 = "UPDATE barang SET stok = stok - :jumlah_penjualan where id = :id";

        $this->db->query($query3);
        $this->db->bind('jumlah_penjualan', $data['jumlah_penjualan']);
        $this->db->bind('id', $data['id_barang']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $penjualan = $this->getById($id);
        $query1 = "UPDATE barang SET stok = stok + :jumlah_penjualan where id = :id";

        $this->db->query($query1);
        $this->db->bind('jumlah_penjualan', $penjualan['jumlah_penjualan']);
        $this->db->bind('id', $penjualan['id_barang']);

        $this->db->execute();

        $query2 = "DELETE FROM penjualan WHERE id = :id";

        $this->db->query($query2);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function count()
    {
        $this->db->query('SELECT count(*) as count FROM penjualan');
        return $this->db->single();
    }

    public function countRevenue()
    {
        $this->db->query('SELECT harga_jual, jumlah_penjualan FROM penjualan');
        $penjualan = $this->db->resultSet();

        $total_revenue = 0;

        if (count($penjualan) > 0) {
            // Menghitung total revenue
            foreach ($penjualan as $row) {
                $total_revenue += $row['jumlah_penjualan'] * $row['harga_jual'];
            }
            return $total_revenue;
        } else {
            return 0;
        }
    }

    public function labaRugi()
    {
        // Query untuk mengambil data penjualan
        $sales_query = "SELECT id_barang, nama_barang, SUM(jumlah_penjualan * harga_jual) as total_penjualan 
                    FROM penjualan 
                    JOIN barang ON barang.id = penjualan.id_barang 
                    GROUP BY id_barang, nama_barang 
                    ORDER BY total_penjualan DESC 
                    LIMIT 5";
        $this->db->query($sales_query);
        $sales_result = $this->db->resultSet();

        // Mengambil id_barang dari hasil penjualan
        $id_barang_list = [];
        $sales_data = [];
        if (count($sales_result) > 0) {
            foreach ($sales_result as $row) {
                $id_barang_list[] = $row['id_barang'];
                $sales_data[$row['id_barang']] = [
                    'nama_barang' => $row['nama_barang'],
                    'total_penjualan' => $row['total_penjualan']
                ];
            }
        }

        // Mengubah array id_barang menjadi string untuk digunakan dalam query
        if (!empty($id_barang_list)) {
            $id_barang_str = implode(",", array_map('intval', $id_barang_list));

            // Query untuk mengambil data pembelian berdasarkan id_barang dari penjualan
            $purchases_query = "SELECT id_barang, SUM(jumlah_pembelian * harga_beli) as total_pembelian 
                            FROM pembelian 
                            WHERE id_barang IN ($id_barang_str) 
                            GROUP BY id_barang 
                            ORDER BY total_pembelian";
            $this->db->query($purchases_query);
            $purchases_result = $this->db->resultSet();
        } else {
            $purchases_result = [];
        }

        $purchases_data = [];
        if (count($purchases_result) > 0) {
            foreach ($purchases_result as $row) {
                $purchases_data[$row['id_barang']] = $row['total_pembelian'];
            }
        }

        // Menghitung laba rugi per barang
        $profit_loss_data = [];
        foreach ($sales_data as $id_barang => $data) {
            $total_pembelian = isset($purchases_data[$id_barang]) ? $purchases_data[$id_barang] : 0;
            $profit_loss = $data['total_penjualan'] - $total_pembelian;
            $profit_loss_data[] = [
                'id_barang' => $id_barang,
                'nama_barang' => $data['nama_barang'],
                'total_penjualan' => $data['total_penjualan'],
                'total_pembelian' => $total_pembelian,
                'profit_loss' => $profit_loss,
            ];
        }

        // Mengurutkan berdasarkan laba rugi tertinggi
        usort($profit_loss_data, function ($a, $b) {
            return $b['profit_loss'] <=> $a['profit_loss'];
        });

        return $profit_loss_data;
    }


    public function penjualanSebulan()
    {
        // Query untuk mendapatkan total penjualan per hari dalam satu bulan terakhir
        $sales_query = "SELECT DATE(tanggal_penjualan) as tanggal, SUM(jumlah_penjualan * harga_jual) as    total_penjualan 
                        FROM penjualan 
                        WHERE tanggal_penjualan >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) 
                        GROUP BY DATE(tanggal_penjualan)
                        order by DATE(tanggal_penjualan) asc";
        $this->db->query($sales_query);
        $sales_result = $this->db->resultSet();

        // Menyusun data untuk Chart.js
        $dates = [];
        $totals = [];
        if (count($sales_result) > 0) {
            foreach ($sales_result as $row) {
                $dates[] = $row['tanggal'];
                $totals[] = $row['total_penjualan'];
            }
        }
        return [$dates, $totals];
    }
}
