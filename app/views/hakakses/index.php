<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Hak Akses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tableHakAkses" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row">No</th>
                            <th>Nama</th>
                            <th>Menu</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['hak_akses'] as $hak_akses) : ?>
                            <tr>
                                <td></td>
                                <td><?= $hak_akses['nama_akses'] ?></td>
                                <td>
                                    <?php echo (implode(", ", json_decode($hak_akses['menu']))); ?>
                                </td>
                                <td><?= $hak_akses['keterangan'] ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editHakAkses" data-id="<?= $hak_akses['id'] ?>"  data-menu="<?php json_encode($data['menu'])?>" data-keterangan="<?= $hak_akses['keterangan'] ?>" class="btn rounded-circle btn-outline-primary btn-sm btnEditHakAkses"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal edit hak akses -->
<div class="modal fade" id="editHakAkses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/hakakses/edit" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <label>Menu</label>
                        <select name="menu[]" id="multiple-edit-menu" required multiple="multiple">
                        <?php foreach($data['menu'] as $menu):?>
                            <option value="<?= $menu['id']?>"><?= $menu['nama_menu']?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-tooltip">Silahkan pilih menu (multiple)</div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="editKeterangan" placeholder="Masukkan keterangan hak akses" autocomplete="off">
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