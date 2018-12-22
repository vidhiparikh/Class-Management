<?php
if(isset($_POST['submit'])) {
    $id = $_GET['id'];
    extract($_POST);
    $semester = new Semester();
    $semester->update($id, $semester_name);
    Functions::redirect("semester.php?page=semester&op=edit&p=update");
}
?>
<?php
if( isset($_GET['id'] ) ) {
$id = $_GET['id'];
$semester = new Semester();
$result_set = $semester->getDetailsByID($id);
if($row = mysqli_fetch_assoc($result_set))
    extract($row);
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Manage Subject";
    $breadcrumb = "
	<li class='breadcrumb-item'>Semester Management</li>
	<li class='breadcrumb-item active'>Edit Semester</li>";
    include_once("includes/top-bar.php");
    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <form class="" method="post" action="#" name="edit_sem" id="edit_sem">
                            <h4>Semester Details</h4>
                            <div class="form-group">
                                <label>Semester Name</label>
                                <input type="text" class="form-control"
                                       required placeholder="Enter Semester Name"
                                       name="semester_name" id="semester_name"
                                       value="<?php echo $sem; ?>" />
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit"
                                            class="btn btn-custom waves-effect
                                                waves-light"
                                            name="submit"
                                            id="submit">
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
    <?php
    } else{
        echo "Something is Wrong";
    }
    ?>
    <?php include_once("includes/footer.php");?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->