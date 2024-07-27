<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
                </div>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#tambahPenjualan" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tablePenjualan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Penjualan</th>
                            <th>Harga Jual</th>
                            <th>Id User</th>
                            <th>Id Pelanggan</th>
                            <th>Tanggal Penjualan</th>
                            <?php if ($_SESSION['user']['nama_akses'] == 'Admin') : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['penjualan'] as $penjualan) : ?>
                            <tr>
                                <td></td>
                                <td><?= $penjualan['nama_barang'] ?></td>
                                <td><?= $penjualan['jumlah_penjualan'] ?></td>
                                <td><?= number_format($penjualan['harga_jual'], 2, ',', '.') ?></td>
                                <td><?= $penjualan['user_id'] ?></td>
                                <td><?= $penjualan['id_pelanggan'] ?></td>
                                <td><?= $penjualan['tanggal_penjualan'] ?></td>

                                <?php if ($_SESSION['user']['nama_akses'] == 'Admin') : ?>
                                    <td class="d-flex align-items-center justify-content-center">
                                        <a href="#" data-toggle="modal" data-target="#editPenjualan" data-id="<?= $penjualan['penjualan_id'] ?>" data-idbarang="<?= $penjualan['id_barang'] ?>" data-jumlahpenjualan="<?= $penjualan['jumlah_penjualan'] ?>" data-hargajual="<?= $penjualan['harga_jual'] ?>" data-idpelanggan="<?= $penjualan['id_pelanggan'] ?>" data-tanggalpenjualan="<?= $penjualan['tanggal_penjualan'] ?>" class="btn rounded-circle btn-outline-primary btn-sm btnEditPenjualan mr-1"><i class="fas fa-pen"></i></a>
                                        <a href="<?= BASEURL; ?>/penjualan/hapus/<?= $penjualan['penjualan_id'] ?>" class="btn rounded-circle btn-outline-danger btn-sm hapusPenjualan" id="hapusPenjualan"><i class="fas fa-trash"></i></a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah penjualan -->
<div class="modal fade" id="tambahPenjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penjualan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/penjualan/tambah" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="custom-select" name="id_barang" id="id_barang" required>
                            <option value="" disabled selected>Pilih barang</option>
                            <?php foreach ($data['barang'] as $barang) : ?>
                                <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Silahkan pilih barang</div>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Penjualan</label>
                        <input type="number" class="form-control" name="jumlah_penjualan" id="jumlah_penjualan" placeholder="Masukkan jumlah penjualan" min=1 required autocomplete="off">
                        <div class="invalid-feedback">Jumlah penjualan tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="text" class="form-control" name="harga_jua2" id="harga_jual2" disabled>
                        <input type="text" class="form-control" name="harga_jual" id="harga_jual" hidden>
                    </div>
                    <?php if ($_SESSION['user']['nama_akses'] == 'Admin') : ?>
                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select class="custom-select" name="id_pelanggan" id="id_pelanggan" required>
                            <option value="" disabled>Pilih pelanggan</option>
                            <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                                <option value="<?= $pelanggan['pelanggan_id'] ?>"><?= $pelanggan['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Silahkan pilih pelanggan</div>
                    </div>
                    <?php endif;?>
                    <div class="form-group">
                        <label>Tanggal Penjualan</label>
                        <input type="date" class="form-control" name="tanggal_penjualan" id="tanggal_penjualan" required>
                        <div class="invalid-feedback">Tanggal penjualan tidak boleh kosong</div>
                    </div>
            </div>
            <div class="modal-footer">
                <a class="btn" data-dismiss="modal">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit penjualan -->
<div class="modal fade" id="editPenjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Penjualan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/penjualan/edit" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="custom-select" name="id_barang" id="editIdBarang" required>
                            <option value="" disabled>Pilih barang</option>
                            <?php foreach ($data['barang'] as $barang) : ?>
                                <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Silahkan pilih barang</div>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Penjualan</label>
                        <input type="number" class="form-control" id="editJumlahPenjualan" name="jumlah_penjualan" placeholder="Masukkan jumlah penjualan" min=1 required autocomplete="off">
                        <div class="invalid-feedback">Jumlah penjualan tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="text" class="form-control" name="harga_jual2" id="editHargaJual" disabled>
                        <input type="text" class="form-control" name="harga_jual" id="harga_jual3" hidden>
                    </div>

                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select class="custom-select" name="id_pelanggan" id="editIdPelanggan" required>
                            <option value="" disabled>Pilih pelanggan</option>
                            <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                                <option value="<?= $pelanggan['pelanggan_id'] ?>"><?= $pelanggan['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Silahkan pilih pelangan</div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Penjualan</label>
                        <input type="date" class="form-control" id="editTanggalPenjualan" name="tanggal_penjualan" required>
                        <div class="invalid-feedback">Tanggal penjualan tidak boleh kosong</div>
                    </div>
            </div>
            <div class="modal-footer">
                <a class="btn" data-dismiss="modal">Batal</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>