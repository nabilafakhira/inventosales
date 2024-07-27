<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                </div>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#tambahBarang" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableBarang" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Keterangan</th>
                            <th>Id User</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['barang'] as $barang) : ?>
                            <tr>
                                <td></td>
                                <td><?= $barang['nama_barang'] ?></td>
                                <td><?= $barang['satuan'] ?></td>
                                <td><?= $barang['keterangan'] ?></td>
                                <td><?= $barang['id_user'] ?></td>
                                <td><?= $barang['stok'] ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editBarang" data-id="<?= $barang['id'] ?>" data-nama="<?= $barang['nama_barang'] ?>" data-satuan="<?= $barang['satuan'] ?>" data-keterangan="<?= $barang['keterangan'] ?>" class="btn rounded-circle btn-outline-primary btn-sm btnEditBarang"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>