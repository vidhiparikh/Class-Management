<!DOCTYPE html>
<html>
	<?php
	ob_start();
	require_once("includes/init.php");
	Session::startSession();
	User::checkActiveSession();
	$page = "student";
	$title ="Study Link | Manage Student";
	include_once("includes/head.php");
    ?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">
			<!--INCLUDING SIDEBAR-->
            <?php include_once("includes/sidebar.php"); ?>
            
            <!--INCLUDING MAIN CONTENTS OF THE PAGE-->
            <?php 
			if(isset($_GET['q'])){
				$q = $_GET['q'];
			}else{
				$q="default";
			}
				switch ($q)
				{
					case 'add':
						include_once("includes/add-student.php"); 
						break;
					case 'edit':
						include_once("includes/edit-student.php");
						break;
					case 'view':
						include_once("includes/manage-student.php");
						break;
					default:
						include_once("includes/manage-student.php"); 
						break;
					
				}
			
			
			
			
			
			
			
			?>
            
        </div>
        <!-- END wrapper -->
        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <!-- Parsley js USED FOR VALIDATION-->
        <script type="text/javascript" src="../plugins/parsleyjs/parsley.min.js"></script>
        <!--SweetAlert is used for creating user friendly modal -->
		<script src="plugins/sweet-alert/sweetalert2.min.js"></script>
        <script src="plugins/Code7-toastr/build/toastr.min.js"></script>
        <!-- Dashboard Init -->
        <script src="assets/pages/jquery.student.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <?php include_once("includes/scripts/show-notifications.php");?>

        <!--<script>
            toastr.success('Are you the 6 fingered man?');
        </script>-->
    </body>
</html>