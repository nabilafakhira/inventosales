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

    function formatRupiah(angka, prefix) {
        var number_string = angka.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return prefix ? 'Rp. ' + rupiah : rupiah;
    }

    $.holdReady(true);
    $.getJSON("<?= BASEURL; ?>/dashboard/getAjax", function(data) {

        var ctx = document.getElementById("stokBarang");
        var coloR = [];

        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        };

        for (var i in data['stokBarang'][0]) {
            coloR.push(dynamicColors());
        }
        var stokBarang = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: data['stokBarang'][0],
                datasets: [{
                    data: data['stokBarang'][1],
                    backgroundColor: coloR
                }],
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom'
                },
                cutoutPercentage: 60,
            },
        });

        var ctx = document.getElementById("penjualanSebulan").getContext('2d');
        var semuaProdi = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data["penjualanSebulan"][0],
                datasets: [{
                    label: "Total Penjualan",
                    backgroundColor: "#fd7e14",
                    data: data["penjualanSebulan"][1],
                    maxBarThickness: 50,
                }],
            },
            options: {
                tooltips: {
                    enabled: true,
                    callbacks: {
                        label: function(tooltipItem, data) {
                            return 'Total Penjualan: ' + formatRupiah(tooltipItem.yLabel, true);
                        }
                    }
                },
                hover: {
                    animationDuration: 1
                },
                animation: {
                    onComplete: function() {
                        var chartInstance = this.chart,
                            ctx = chartInstance.ctx;
                        ctx.textAlign = 'center';
                        ctx.fillStyle = "rgba(0, 0, 0, 0.6)";
                        ctx.textBaseline = 'bottom';
                        // Loop through each data in the datasets
                        this.data.datasets.forEach(function(dataset, i) {
                            var meta = chartInstance.controller.getDatasetMeta(i);
                            meta.data.forEach(function(bar, index) {
                                var data = dataset.data[index];
                                ctx.fillText(formatRupiah(data, true), bar.x, bar.y - 5);
                            });
                        });
                    }
                },
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'day'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        },
                        ticks: {
                            beginAtZero: true,
                            userCallback: function(label, index, labels) {
                                return formatRupiah(label, true);
                            }
                        },
                    }],
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        });

        $.holdReady(false);
    }).fail(function() {
        console.error("Failed to fetch data");
        $.holdReady(false);
    });
</script>
</body>

</html>