<?php require_once '../../config/init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login - Garis Grafis</title>
    <?php require_once '../../views/css.php'; ?>
</head>
<body style="padding: 0 10px;">
<div class="col-md-3" id="form">
    <div class="col-md-12 form-header">
        <div class="row">
            <div class="col-3 col-xl-3 form-logo">
                <a href="../"><img src="../assets/images/logo2.jpg" alt=""></a>
            </div>
            <div class="col-9 col-xl-9 form-heading">
                <p>Login <b>Garis Grafis</b></p>
            </div>
        </div>
    </div>
    <form action="" method="post">
        <div class="form-spacing">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address:</label>
                <label for="exampleInputEmail1" class="form-label-icon"><i class="fas fa-envelope"></i></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email...">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password:</label>
                <label for="exampleInputPassword1" class="form-label-icon"><i class="fas fa-key"></i></label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Kata Sandi...">
            </div>
        </div>
        <button type="submit" class="btn btn-primary form-button"><i class="fas fa-sign-in-alt"></i>&nbsp; Masuk Sekarang</button>
    </form>
</div>


<?php require_once '../../views/js.php'; ?>    
</body>
</html>