<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   <meta name="description" content="Tutorial Codeigniter Membuat Hak Akses Menggunakan Jquery dan Mysql">
    <meta name="author" content="Ilmucoding">
    <title>Halaman Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <!-- Bootstrap core CSS -->   <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" action="<?= base_url('auth/loginForm') ?>" method="post">
        
        <h1 class="h3 mb-3 font-weight-normal">Silahkan Login Di Sini</h1>
        <?php
        $errors = $this->session->flashdata('errors');
        if (!empty($errors)) {
        ?>
            <div class="row">
                <div class="col-md-12">
                <div class="alert alert-danger text-center">
                    <?php foreach($errors as $key=>$error){ ?>
                    <?php echo "$error<br>"; ?>
                    <?php } ?>
                </div>
                </div>
            </div>
        <?php
        }
        if ($msg = $this->session->flashdata('error_login')) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger text-center">
                        <?= $msg ?>
                    </div>
                </div>
            </div>
        <?php } else if ($msg = $this->session->flashdata('success_login')) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success text-center">
                        <?= $msg ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email (nama@bps.go.id)" required autofocus>     <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Ingat saya
        </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <!-- <a href="<?= base_url('auth/register') ?>" class="float-left mt-1">Register</a> -->
        <p class="mt-5 mb-3 text-muted">&copy; sijadin 2020</p>
    </form>
</body>

</html>