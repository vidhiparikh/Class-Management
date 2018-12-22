<?php
if(isset($_POST['add_batch'])){
    extract($_POST);
    $batch = new Batch();
    $id = $batch->insert($batch_name);
    echo "done";
    Functions::redirect("batch.php?op=ins&p=success&page=semester");
}
?>


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Add Batch";
    $breadcrumb = "
	<li class='breadcrumb-item'>Batch Management</li>
	<li class='breadcrumb-item active'>Add Batch</li>";
    include_once("includes/top-bar.php");
    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <form class="" method="post" action="#" name="form-add-batch" id="add_subject">
                            <h4>Batch Details</h4>
                            <div class="form-row" id="batch-panel">
                            <div class="form-group col-md-4">
                                <label>Batch Name</label>
                                <input type="text" class="form-control" required placeholder="Enter Batch Name" name="batch_name" id="batch_name" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Batch Start Date</label>
                                <input type="text" class="form-control" required placeholder="Enter Batch Date" name="batch_start_date" id="batch_start_date" />
                            </div>
                            <div class="form-group col-md-4">
                                <label>Batch Status</label>
                                <select name="batch_status" id="batch_status" class="form-control">
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                                <div id="subjectList0" class="form-row" style="width: 100%">
                            <div class="form-group col-md-4">
                                <label>Select Semester</label>
                                <select name="semester_id[]" id="semester_id0" class="form-control" onchange="populateSubjects(0);">
                                    <option value="select">Select Semester</option>
                                    <?php
                                    $semester=new Semester();
                                    $semester->populateSemesters();
                                    ?>
                                </select>
                            </div>
                                <div class="form-group col-md-4">
                                    <label>Select Branch</label>
                                    <select name="branch_id[]" id="branch_id0" class="form-control" onchange="populateSubjects(0);">
                                        <option value="select">Select Branch</option>
                                        <?php
                                        $branch=new Branch();
                                        $branch->populateBranches();
                                        ?>
                                    </select>
                                </div>
                            <div class="form-group col-md-3">
                                <label>Select Subject</label>
                                <select name="subject_id[]" id="subject_id0" class="form-control" onchange="populateSubjects(0);">
                                    <option value="select">Select Subject</option>

                                </select>
                            </div>
                                <div class="form-group col-md-1">
                                    <label>&nbsp;</label>
                                    <button type="button" class="form-control btn btn-danger" id="delete" onclick="deletePanel(0);"><i class="fa fa-trash"></i> </button>
                                </div>
                                </div><!--end of subjectlist-->
                            </div><!--end of for-row-->
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <button type="button" class="btn btn-warning" id="add_more_subjects"><i class="fa fa-plus-circle"></i> Add More Subjects</button>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                <div>
                                    <button type="submit" class="btn btn-custom waves-effect waves-light pull-right" name="add_batch" id="add_batch">
                                        Create Batch
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div?>
        <!-- container -->

    </div>
    <!-- content -->

    <?php include_once("includes/footer.php");?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
