</div>
<!-- End of Main Content -->

<!-- Modal tambah admin -->
<div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/tambah" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" required autocomplete="off">
                        <div class="invalid-feedback">Nama tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan nama" required autocomplete="off">
                        <div class="invalid-feedback">Username tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email" autocomplete="off">
                        <div class="invalid-feedback">Harap masukkan email yang valid</div>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62</span>
                            </div>
                            <input type="tel" class="form-control rounded-right" name="telepon" id="telepon" placeholder="Masukkan nomor telepon" maxlength="15" pattern="^[0-9]{10,15}$" autocomplete="off">
                            <div class="invalid-feedback">Harap masukkan nomor telepon yang valid</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" autocomplete="off"></textarea>
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

<!-- Modal edit admin -->
<div class="modal fade" id="editAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/admin/edit" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" id="editNama" placeholder="Masukkan nama" required autocomplete="off">
                        <div class="invalid-feedback">Nama tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="editEmail" placeholder="Masukkan email" autocomplete="off">
                        <div class="invalid-feedback">Harap masukkan email yang valid</div>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="tel" class="form-control rounded-right" name="telepon" id="editTelepon" placeholder="Masukkan nomor telepon" maxlength="15" pattern="^\+[0-9]{10,15}$"
                        autocomplete="off">
                        <div class="invalid-feedback">Harap masukkan nomor telepon yang valid (10-15 digit, hanya angka dan diawali dengan '+')</div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" id="editAlamat" name="alamat" rows="3" autocomplete="off"></textarea>
                        <div class="invalid-feedback">Alamat tidak boleh kosong</div>
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

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span> Copyright &copy; Group 1 LABA Introduction to Data and Information Management
                2024. All rights
                reserved.</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= BASEURL; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?= BASEURL; ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<!-- Custom scripts for all pages-->
<script src="<?= BASEURL; ?>/js/main.js"></script>

<!-- Page level plugins -->
<script src="<?= BASEURL; ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/sorting/date-uk.js"></script>

<!-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-colvis-1.6.5/b-html5-1.6.5/b-print-1.6.5/r-2.2.6/datatables.min.js">
</script>
<script src="<?= BASEURL; ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!--DateRangePicker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= BASEURL; ?>/js/demo/datatables-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $(document).ready(function() {
        var tableAdmin = $('#tableAdmin').DataTable({
            "columnDefs": [{
                "targets": [0, -1],
                "orderable": false
            }],
            "order": [], // This ensures no initial ordering
        });

        tableAdmin.on('order.dt search.dt', function() {
            tableAdmin.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('.btnEditAdmin').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var email = $(this).data('email');
            var telepon = $(this).data('telepon');
            var alamat = $(this).data('alamat');

            $('#editId').val(id);
            $('#editNama').val(nama);
            $('#editEmail').val(email);
            $('#editTelepon').val(telepon);
            $('#editAlamat').val(alamat);
        });
    });
</script>
</body>

</html>