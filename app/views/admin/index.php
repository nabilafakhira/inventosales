<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                </div>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#tambahAdmin" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableAdmin" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Id Admin</th>
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
                        <?php foreach ($data['admin'] as $admin) : ?>
                            <tr>
                                <td></td>
                                <td><?= $admin['admin_id'] ?></td>
                                <td><?= $admin['nama'] ?></td>
                                <td><?= $admin['username'] ?></td>
                                <td><?= $admin['email'] ?></td>
                                <td><?= $admin['telepon'] ?></td>
                                <td><?= $admin['alamat'] ?></td>
                                <td><?= $admin['tanggal_dibuat'] ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editAdmin" data-id="<?= $admin['admin_id'] ?>" data-nama="<?= $admin['nama'] ?>" data-email="<?= $admin['email'] ?>" data-telepon="<?= $admin['telepon'] ?>" data-alamat="<?= $admin['alamat'] ?>" class="btn rounded-circle btn-outline-primary btn-sm btnEditAdmin"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>