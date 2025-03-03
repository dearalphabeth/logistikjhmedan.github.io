

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - JIMS HONEY MEDAN</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                 
                    <div class="container">
                   
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                                    <?php endif; ?>
                                    <div class="card-body">
									
                                        <form action="<?php echo site_url('auth/login_process'); ?>" method="POST">
                                            <div class="form-floating mb-3">
                                                <input name="username" class="form-control" id="username" type="text" placeholder="Username" />
                                                <label for="username">Username</label>
                                          </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control" id="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                             <button class="btn btn-primary" href="index.html" name="login">Login</button>
                                            </div>
                                      </form>
                                        <p>Belum punya akun? <a href="<?php echo site_url('auth/register'); ?>">Register Disini</a></p>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
