<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - Logistik Jims Honey Medan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                     <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="<?php echo site_url('auth/register'); ?>" method="post">
                                        <img src="assets/img/logo.jpeg" width="100%" height="150" class="d-inline-block align-top" alt="">
                                            <div class="form-floating mb-3">
                                                <input name="username" class="form-control" id="inputEmail" type="text" placeholder="Enter your Username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <label for="role">Role:</label>
                                            <div class="form-floating mb-3">
                                                    <select name="role" required>
                                                        <option value="Admin Logistik">Admin Logistik</option>
                                                        <option value="Staff Medis">Staff Medis</option>
                                                    </select><br>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                             <button class="btn btn-primary" href="index.html" name="login">Login</button>
                                            </div>
                                        </form>
                                        <br>
                                        <p>Belum punya akun? <a href="<?php echo site_url('register'); ?>">Register Disini</a></p>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="auth">Sudah Punya Akun? Silahkan Login!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger mt-3">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-success mt-3">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php endif; ?>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">opyright &copy; Jims Honey Logistik @ 2025</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>