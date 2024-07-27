<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
                </div>
                <div class="col text-right">
                    <button type="button" data-toggle="modal" data-target="#tambahPelanggan" class="btn btn-primary btn-sm m-0"><i class="fa fa-plus mr-2"></i>Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tablePelanggan" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Id Pelanggan</th>
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
                        <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                            <tr>
                                <td></td>
                                <td><?= $pelanggan['pelanggan_id'] ?></td>
                                <td><?= $pelanggan['nama'] ?></td>
                                <td><?= $pelanggan['username'] ?></td>
                                <td><?= $pelanggan['email'] ?></td>
                                <td><?= $pelanggan['telepon'] ?></td>
                                <td><?= $pelanggan['alamat'] ?></td>
                                <td><?= $pelanggan['tanggal_dibuat'] ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editPelanggan" data-id="<?= $pelanggan['pelanggan_id'] ?>" data-nama="<?= $pelanggan['nama'] ?>" data-email="<?= $pelanggan['email'] ?>" data-telepon="<?= $pelanggan['telepon'] ?>" data-alamat="<?= $pelanggan['alamat'] ?>" class="btn rounded-circle btn-outline-primary btn-sm btnEditPelanggan"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>