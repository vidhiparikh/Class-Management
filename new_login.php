<?php
ob_start();
$flag=0;
include_once("classes/User.php");
	include_once("classes/Functions.php");
	if(isset($_POST['login'])){
		session_start();
		extract($_POST);
		$obj = new User();
		if($obj->processLogin($email, $password)){
			Functions::redirect('index.php');
		}else{
			$flag=1;
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>SL | Class Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>

    <script src="assets/js/modernizr.min.js"></script>

</head>


<body class="account-pages">

<!-- Begin page -->
<div class="accountbg" style="background: url('assets/images/backgound.jpg');background-size: cover;"></div>

<div class="wrapper-page account-page-full">

    <div class="card">
        <div class="card-block">

            <div class="account-box">

                <div class="card-box p-5">
                    <h2 class="text-uppercase text-center pb-4">
                        <a href="index.html" class="text-success">
                            <span><img src="assets/images/logo.png" alt="" height="45"></span>
                        </a>
                    </h2>
                    <?php
                    if ($flag) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Wrong Username or Password Please try again later!
                        </div>
                        <?php
                    }
                    ?>
                    <form class="" action="" method="POST">

                        <div class="form-group m-b-20 row">
                            <div class="col-12">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" required=""
                                       placeholder="Enter your email" name="email">
                            </div>
                        </div>

                        <div class="form-group row m-b-20">
                            <div class="col-12">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" required="" id="password"
                                       placeholder="Enter your password" name="password">
                            </div>
                        </div>

                        <div class="form-group row text-center m-t-10">
                            <div class="col-12">
                                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit"
                                        name="login">Sign In
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <footer class="footer text-center">
        2018 © Study Link - By My Students.
    </footer>

</div>


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>

</html>
