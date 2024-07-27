<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Invento Sales</title>

    <!-- Custom fonts for this template-->
    <link href="<?= BASEURL; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= BASEURL; ?>/css/main.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-5 col-sm-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <a class="navbar-brand mb-2" href="#">
                                            <h3>INVENTO SALES</h3>
                                        </a>
                                    </div>
                                    <div id="infoMessage">
                                        <?php if (isset($_SESSION['errorLogin'])) : ?>
                                            <div class="errors alert alert-danger small pb-0" role="alert">
                                                <ul class="mb-2 pl-0">
                                                    <li><i class="fas fa-info-circle mr-2"></i>Login gagal Periksa kembali username dan password anda</li>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <?php unset($_SESSION['errorLogin']); ?>
                                    </div>

                                    <form action="<?= BASEURL; ?>/login/action" method="post" class="user mt-3 needs-validation" id="form-login" novalidate>
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" class="form-control form-control-user " placeholder="Username" value="" required>
                                            <div class="invalid-feedback">
                                                Username tidak boleh kosong
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group login" id="passwordBaru">
                                                <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="Password" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><a href=""><i class="fa fa-eye-slash text-secondary " aria-hidden="true"></i></a></div>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Password tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <button href="#" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row text-white justify-content-center small text-center">
            Copyright &copy; Group 1 LABA Introduction to Data and Information Management 2024. All rights reserved.
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= BASEURL; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= BASEURL; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= BASEURL; ?>/js/main.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
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

        $("#infoMessage").fadeTo(2000, 500).slideUp(500, function() {
            $("#infoMessage").slideUp(500);
        });
    </script>

</body>

</html>