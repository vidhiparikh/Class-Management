<?php
	include_once("classes/User.php");
	include_once("classes/Functions.php");
	if(isset($_POST['submit'])){
		session_start();
		extract($_POST);
		$obj = new User();
		if($obj->processLogin($username, $password)){
			Functions::redirect('index.html');
		}else{
			echo "Username/password dont match";
		}
	}
?>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Study Link Admin | Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

</head>
<body>
   <div class="container">
       <div class="row">
          <h1 class="text-center">
          	<img src="images/logo.jpg" alt="">
          </h1>
           <div class="col-md-6 col-md-offset-3">
               <form action="" method="POST" role="form">
                   <legend>Login</legend>
                   <div class="form-group">
                       <label for="">Username</label>
                       <input type="text" class="form-control" id="" placeholder="Input field" name="username">
                   </div>
                   <div class="form-group">
                       <label for="">Password</label>
                       <input type="password" class="form-control" id="" placeholder="Input field" name="password">
                   </div>
                   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
               </form>
           </div>
       </div>
   </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>