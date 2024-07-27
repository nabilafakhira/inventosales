</div>
<!-- End of Main Content -->

<!-- Modal tambah barang -->
<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/barang/tambah" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Masukkan nama barang" required autocomplete="off">
                        <div class="invalid-feedback">Nama barang tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Masukkan satuan barang" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" autocomplete="off"></textarea>
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

<!-- Modal edit barang -->
<div class="modal fade" id="editBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/barang/edit" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="id" id="editId">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="editNamaBarang" placeholder="Masukkan nama barang" required autocomplete="off">
                        <div class="invalid-feedback">Nama barang tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" name="satuan" id="editSatuan" placeholder="Masukkan satuan barang" required autocomplete="off">
                        <div class="invalid-feedback">Satuan barang tidak boleh kosong</div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" id="editKeterangan" name="keterangan" rows="3" autocomplete="off"></textarea>
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
        var tableBarang = $('#tableBarang').DataTable({
            "columnDefs": [{
                "targets": [0, -1],
                "orderable": false
            }],
            "order": [], // This ensures no initial ordering
        });

        tableBarang.on('order.dt search.dt', function() {
            tableBarang.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('.btnEditBarang').click(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var satuan = $(this).data('satuan');
            var keterangan = $(this).data('keterangan');

            $('#editId').val(id);
            $('#editNamaBarang').val(nama);
            $('#editSatuan').val(satuan);
            $('#editKeterangan').val(keterangan);
        });
    });
</script>
</body>

</html>