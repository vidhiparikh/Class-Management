<?php
if(isset($_POST['add_semester'])){
    extract($_POST);
    $semester = new Semester();
    $semester_id = $semester->insert($semester_name);
    echo "done";
    Functions::redirect("semester.php?op=ins&p=success&page=semester");
}
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Add Semester";
    $breadcrumb = "
	<li class='breadcrumb-item'>Semester Management</li>
	<li class='breadcrumb-item active'>Add Semester</li>";
    include_once("includes/top-bar.php");
    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <form class="" method="post" action="#" name="form-add-semester" id="add_subject">
                            <h4>Semester Details</h4>
                            <div class="form-group">
                                <label>Semester Name</label>
                                <input type="text" class="form-control" required placeholder="Enter Semester Name" name="semester_name" id="semester_name" />
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-custom waves-effect waves-light" name="add_semester" id="add_semester">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-light waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <?php include_once("includes/footer.php");?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
