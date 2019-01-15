<?php
include '../connection/connection.php';
if ($_SESSION['member']) {
    header( "location: dashboard.php" );
    exit(0);
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $sql = "SELECT * FROM tbl_users
    WHERE username = '{$_POST['username']}'
    AND password = '{$_POST['password']}'";


    $result = $con->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['member'] = mysqli_fetch_assoc($result);
        header( "location: dashboard.php" );
        exit(0);

    } else {
        $error = 'ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบแล้วลองใหม่ภายหลัง';
    }

}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Minton - Responsive Admin Dashboard Template</title>

    <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <script src="assets/js/modernizr.min.js"></script>

</head>
<body>

    <div class="wrapper-page">

        <div class="text-center">
            <a href="index.html" class="logo-lg"><i class="mdi mdi-radar"></i> <span>Minton</span> </a>
        </div>

        <form class="form-horizontal m-t-20" action="" method="POST">
            <?php if($error) {?>
            <div class="alert alert-warning" role="alert">
              <?php echo $error; ?>
            </div>
            <?php }?>
            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                        </div>
                        <input name="username" class="form-control" type="text" required="" placeholder="Username">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="mdi mdi-radar"></i></span>
                        </div>
                        <input name="password" class="form-control" type="password" required="" placeholder="Password">
                    </div>
                </div>
            </div>

            <!-- <div class="form-group row">
            <div class="col-12">
            <div class="checkbox checkbox-primary">
            <input id="checkbox-signup" type="checkbox">
            <label for="checkbox-signup">
            Remember me
        </label>
    </div>

</div>
</div> -->

<div class="form-group text-right m-t-20">
    <div class="col-xs-12">
        <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit">Log In
        </button>
    </div>
</div>

<!-- <div class="form-group row m-t-30">
<div class="col-sm-7">
<a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your
password?</a>
</div>
<div class="col-sm-5 text-right">
<a href="pages-register.html" class="text-muted">Create an account</a>
</div>
</div> -->
</form>
</div>


<script>
var resizefunc = [];
</script>

<!-- Plugins  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="../plugins/switchery/switchery.min.js"></script>

<!-- Custom main Js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>
