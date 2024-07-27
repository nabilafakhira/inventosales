<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Data Supplier</h6>
                </div>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#tambahSupplier" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableSupplier" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Id Supplier</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['supplier'] as $supplier) : ?>
                            <tr>
                                <td></td>
                                <td><?= $supplier['supplier_id'] ?></td>
                                <td><?= $supplier['nama'] ?></td>
                                <td><?= $supplier['username'] ?></td>
                                <td><?= $supplier['email'] ?></td>
                                <td><?= $supplier['telepon'] ?></td>
                                <td><?= $supplier['alamat'] ?></td>
                                <td><?= $supplier['tanggal_dibuat'] ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editSupplier" data-id="<?= $supplier['supplier_id'] ?>" data-nama="<?= $supplier['nama'] ?>" data-email="<?= $supplier['email'] ?>" data-telepon="<?= $supplier['telepon'] ?>" data-alamat="<?= $supplier['alamat'] ?>" class="btn rounded-circle btn-outline-primary btn-sm btnEditSupplier"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>