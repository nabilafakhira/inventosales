</div>
<!-- End of Main Content -->

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
        var tablePenjualan = $('#tablePenjualan').DataTable({
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }],
            "order": [], // This ensures no initial ordering
        });

        tablePenjualan.on('order.dt search.dt', function() {
            tablePenjualan.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('#editIdBarang').change(function() {
            var id_barang = $(this).val();
            $.ajax({
                url: '<?= BASEURL; ?>/penjualan/setHargaJual',
                method: "POST",
                data: {
                    id_barang: id_barang,
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                $('#editHargaJual').val(data.harga_jual);
                $('#harga_jual3').val(data.harga_jual);
                }
            });
            return false;
        });

        $('#id_barang').change(function() {
            var id_barang = $(this).val();
            $.ajax({
                url: '<?= BASEURL; ?>/penjualan/setHargaJual',
                method: "POST",
                data: {
                    id_barang: id_barang,
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                $('#harga_jual2').val(data.harga_jual);
                $('#harga_jual').val(data.harga_jual);
                }
            });
            return false;
        });

        $('.btnEditPenjualan').click(function() {
            var id = $(this).data('id');
            var idbarang = $(this).data('idbarang');
            var jumlahpenjualan = $(this).data('jumlahpenjualan');
            var hargajual = $(this).data('hargajual');
            var idpelanggan = $(this).data('idpelanggan');
            var tanggalpenjualan = $(this).data('tanggalpenjualan');

            $('#editId').val(id);
            $('#editJumlahPenjualan').val(jumlahpenjualan);
            $('#editHargaJual').val(hargajual);
            $('#editTanggalPenjualan').val(tanggalpenjualan);

            $('#editIdBarang').val(idbarang).change();
            $('#editIdPelanggan').val(idpelanggan).change();
        });

        const hapusPenjualan = document.getElementById('hapusPenjualan');
        if (hapusPenjualan) {
            $('.hapusPenjualan').each(function(index) {
                $(this).on("click", function(e) {
                    e.preventDefault();
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-success',
                            cancelButton: 'btn btn-danger mr-3'
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data penjualan akan terhapus dan stok barang akan beratambah seusai dengan jumlah penjualan",
                        icon: 'warning',
                        position: 'top',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, lanjutkan',
                        cancelButtonText: 'Tidak, batalkan',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var href = $(this).attr('href');
                            window.location.href = href;
                        }
                    })
                });
            });
        }
    });
</script>
</body>

</html>