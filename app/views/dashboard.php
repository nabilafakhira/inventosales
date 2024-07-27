<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-sm-3 mb-3">
            <div class="card bg-indigo">
                <div class="card-body">
                    <h2 class="card-title"><i class="fas fa-shopping-bag mr-2"></i><?= $data['count_pembelian'] ?></h2>
                    <p class="card-text">Total Pembelian</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card bg-teal">
                <div class="card-body">
                    <h2 class="card-title"><i class="fas fa-shopping-cart mr-2"></i><?= $data['count_penjualan'] ?></h2>
                    <p class="card-text">Total Penjualan</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card bg-yellow">
                <div class="card-body">
                    <h2 class="card-title" style="white-space: nowrap;"><i class="fas fa-dollar-sign mr-2"></i><?= number_format($data['count_revenue'], 0, ',', '.') ?></h2>
                    <p class="card-text">Total Revenue</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card bg-pink">
                <div class="card-body">
                    <h2 class="card-title"><i class="fas fa-portrait mr-2"></i><?= $data['count_pelanggan'] ?></h2>
                    <p class="card-text">Total Pelanggan</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Grafik-->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Top 5 Penjualan Barang</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tablePembelian" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="row">No</th>
                                    <th>Nama Barang</th>
                                    <th>Total Pembelian</th>
                                    <th>Total Penjualan</th>
                                    <th>Laba Rugi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                <?php foreach ($data['top_5_penjualan_barang'] as $penjualan) : ?>
                                    <tr>
                                        <td><?= ++$no ?></td>
                                        <td><?= $penjualan['nama_barang'] ?></td>
                                        <td><?= number_format($penjualan['total_pembelian'], 0, ',', '.') ?></td>
                                        <td><?= number_format($penjualan['total_penjualan'], 0, ',', '.') ?></td>
                                        <td><?= number_format($penjualan['profit_loss'], 0, ',', '.') ?></td>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4 ">
                <!-- Card Header - Dropdown -->
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Stok Barang</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    <div class="chart-bar py-3">
                        <canvas id="stokBarang"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Total Penjualan dalam 1 Bulan Terakhir</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="penjualanSebulan"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->