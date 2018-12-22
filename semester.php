<!DOCTYPE html>
<html>
<?php
ob_start();
include_once("includes/init.php");
$page = "semester";
$title ="Study Link | Manage Semester";
include_once("includes/head.php");
?>

<body>

<!-- Begin page -->
<div id="wrapper">
    <!--INCLUDING SIDEBAR-->
    <?php include_once("includes/sidebar.php"); ?>

    <!--INCLUDING MAIN CONTENTS OF THE PAGE-->
    <?php
    $q = "";
    if(isset($_GET['q'])){
        $q = $_GET['q'];
    }
    switch ($q)
    {
        case 'add':
            include_once("includes/semester/add-semester.php");
            break;

        case 'edit':
            include_once("includes/semester/edit-semester.php");
            break;

        default:
            include_once("includes/semester/manage-semester.php");
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
<script type="text/javascript" src="plugins/parsleyjs/parsley.min.js"></script>

<!--SWEET ALERT JS for MODALs-->
<script src="plugins/sweet-alert/sweetalert2.min.js"></script>

<!--Toastr Plugin-->
<script src="plugins/Code7-toastr/build/toastr.min.js"></script>
<!-- Dashboard Init -->
<script src="assets/pages/jquery.semester.init.js"></script>


<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>
<?php include_once("includes/scripts/show-notifications.php");?>
</body>

</html>