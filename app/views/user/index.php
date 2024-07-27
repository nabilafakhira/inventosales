<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableUser" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Id User</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['user'] as $user) : ?>
                            <tr>
                                <td></td>
                                <td><?= $user['user_id'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['nama_akses'] ?></td>
                                <td><?= $user['tanggal_dibuat'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>