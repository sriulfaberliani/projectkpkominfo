<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sisume - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <?php
                        echo form_open('Auth/cek_login');
                        ?>

                        <div class="row">
                        
                            <div class="col-lg-6 d-none d-lg-block" > <img src="\assets\img\imglogin.png" alt="Image" height="450" width="450"/></div>
                            <div class="col-lg-6">
                           
                            <?php
                            echo form_open('Auth/cek_login');
                            ?>
                                  
                                <div class="p-3">
                                    <div class="text-center">
                                    <img src="\assets\img\LogoDiskominfo.png" alt="Image" height="80" width="80"/>
                                        <h1 class="h4 text-gray-900 mb-4"><br>Selamat Datang di Sisume!</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input name="username" class="form-control form-control-user"
                                                id="form2Example17" placeholder="Masukkan Username"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="form2Example17" placeholder="Masukan Password"/>
                                        </div>
                                      
                                       
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Login
                                        </button>
                                     
                                    
                
                            <?php echo form_close(); ?>
                                
                            
                <?php
                //eror
                if(isset($validation)):?>
                <div class= "alert alert-danger">
                <?= $validation->listErrors()?>
                </div>
                <?php endif;?>

                <?php
                if (session()->getFlashdata('pesan')) {
                  echo '<div class = "alert alert-danger" role="alert">';
                  echo session()-> getFlashdata('pesan');
                  echo'</div>'; 
                }
                ?> 
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000)
  </script>
</section>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>