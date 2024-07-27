<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pembelian</h6>
                </div>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#tambahPembelian" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tablePembelian" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Pembelian</th>
                            <th>Harga Beli</th>
                            <th>Id User</th>
                            <th>Id Supplier</th>
                            <th>Tanggal Pembelian</th>
                            <?php if ($_SESSION['user']['nama_akses'] == 'Admin') : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['pembelian'] as $pembelian) : ?>
                            <tr>
                                <td></td>
                                <td><?= $pembelian['nama_barang'] ?></td>
                                <td><?= $pembelian['jumlah_pembelian'] ?></td>
                                <td><?= number_format($pembelian['harga_beli'], 2, ',', '.') ?></td>
                                <td><?= $pembelian['user_id'] ?></td>
                                <td><?= $pembelian['id_supplier'] ?></td>
                                <td><?= $pembelian['tanggal_pembelian'] ?></td>

                                <?php if ($_SESSION['user']['nama_akses'] == 'Admin') : ?>
                                    <td class="d-flex align-items-center justify-content-center">
                                        <a href="#" data-toggle="modal" data-target="#editPembelian" data-id="<?= $pembelian['pembelian_id'] ?>" data-idbarang="<?= $pembelian['id_barang'] ?>" data-jumlahpembelian="<?= $pembelian['jumlah_pembelian'] ?>" data-hargabeli="<?= $pembelian['harga_beli'] ?>" data-idsupplier="<?= $pembelian['id_supplier'] ?>" data-tanggalpembelian="<?= $pembelian['tanggal_pembelian'] ?>" class="btn rounded-circle btn-outline-primary btn-sm btnEditPembelian mr-1"><i class="fas fa-pen"></i></a>
                                        <a href="<?= BASEURL; ?>/pembelian/hapus/<?= $pembelian['pembelian_id'] ?>" class="btn rounded-circle btn-outline-danger btn-sm mr-1 hapusPembelian" id="hapusPembelian"><i class="fas fa-trash"></i></a>
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

<!-- Modal tambah pembelian -->
<div class="modal fade" id="tambahPembelian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembelian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/pembelian/tambah" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="custom-select" name="id_barang" id="id_barang" required>
                            <option value="" disabled>Pilih barang</option>
                            <?php foreach ($data['barang'] as $barang) : ?>
                                <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Silahkan pilih barang</div>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Pembelian</label>
                        <input type="number" class="form-control" name="jumlah_pembelian" id="jumlah_pembelian" placeholder="Masukkan jumlah pembelian" min=1 required autocomplete="off">
                        <div class="invalid-feedback">Jumlah pembelian tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" id="harga_beli" placeholder="Masukkan harga beli" min=1 required autocomplete="off">
                        <div class="invalid-feedback">Harga beli tidak boleh kosong</div>
                    </div>
                    <?php if ($_SESSION['user']['nama_akses'] == 'Admin') : ?>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="custom-select" name="id_supplier" id="id_supplier" required>
                            <option value="" disabled>Pilih supplier</option>
                            <?php foreach ($data['supplier'] as $supplier) : ?>
                                <option value="<?= $supplier['supplier_id'] ?>"><?= $supplier['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Silahkan pilih supplier</div>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label>Tanggal Pembelian</label>
                        <input type="date" class="form-control" name="tanggal_pembelian" id="tanggal_pembelian" required>
                        <div class="invalid-feedback">Tanggal pembelian tidak boleh kosong</div>
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

<!-- Modal edit pembelian -->
<div class="modal fade" id="editPembelian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pembelian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/pembelian/edit" method="POST" class="needs-validation" novalidate>
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
                        <label>Jumlah Pembelian</label>
                        <input type="number" class="form-control" id="editJumlahPembelian" name="jumlah_pembelian" placeholder="Masukkan jumlah pembelian" min=1 required autocomplete="off">
                        <div class="invalid-feedback">Jumlah pembelian tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" id="editHargaBeli" placeholder="Masukkan harga beli" min=1 required autocomplete="off">
                        <div class="invalid-feedback">Harga beli tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="custom-select" name="id_supplier" id="editIdSupplier" required>
                            <option value="" disabled>Pilih supplier</option>
                            <?php foreach ($data['supplier'] as $supplier) : ?>
                                <option value="<?= $supplier['supplier_id'] ?>"><?= $supplier['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Silahkan pilih supplier</div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pembelian</label>
                        <input type="date" class="form-control" id="editTanggalPembelian" name="tanggal_pembelian" required>
                        <div class="invalid-feedback">Tanggal pembelian tidak boleh kosong</div>
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