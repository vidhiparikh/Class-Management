<?php
	if(isset($_POST['update_subject_details'])){
		$id=$_GET['id'];
		extract($_POST);
		$subject=new Subject();
		$subject->update($id,$subject_fees, $subject_name);
		Functions::redirect("subject.php?page=subject&op=edit&p=update");
	}
?>
<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$subject =new Subject();
		$result_set=$subject->getSubjectDetailsById($id);
		if($row=mysqli_fetch_assoc($result_set))
			extract($row);
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Subject";
	$breadcrumb = "
	<li class='breadcrumb-item'>Subject Management</li>
	<li class='breadcrumb-item active'>Add Subject</li>";
	include_once("includes/top-bar.php");
	?>
		<!-- Start Page content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card-box">
							<form class="" action="" name="add-subject" id="add-subject" method="POST">
							<h4>Personal Details</h4>

                                <div class="form-row">
								<div class="form-group col-md-6">
									<label for="subject_name">Subject Name</label>
									<input type="text" class="form-control" name="subject_name" id="subject_name"required placeholder="Also Full Name!" value="<?php echo $subject_name;?>"/>
								</div>
                                <div class="form-group col-md-6">
                                    <label for="subject_fees">Subject Fees</label>
                                    <input type="text" class="form-control" id="subject_fees" name="subject_fees"required placeholder="Subject Fees" value="<?php echo $subject_fees;?>"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Semester</label>
                                    <select name="semester_id" id="semester_id" class="form-control">
                                        <?php
                                        $semester=new Semester();
                                        $semester->populateSemestersWithSelected($semester_id);
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Branch</label>
                                    <select name='branch_id' class='form-control'>
                                        <?php
                                        $branch=new Branch();
                                        $branch->populateBranches();
                                        ?>
                                    </select>
                                </div>
                                </div><!-- end of .form-row -->
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="update_subject_details">
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

		<?php include_once("includes/footer.php");
	}else{
		echo "Somrthing wrong";
	}
	?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
