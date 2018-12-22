<!--hidden values submit hoti h. read-only na get se submit hota h na post se-->
<?php
//request can be post,get or cookie.

if(isset($_POST['update_student_details'])){
	if($_REQUEST['sid']){
	$sid=$_REQUEST['sid'];
	extract($_POST);
	$student=new Student();
	$student->updateStudent($sid,$student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id);
	
	$parent=new Parents();
	$parent->updateParentDetails($father_id, $father_first_name, $father_number, $father_email);
	$parent->updateParentDetails($mother_id, $mother_first_name, $mother_number, $mother_email);
	
	Functions::redirect("student.php?page=student&op=edit&p=update");
}
}
?>
 <?php
	if(isset($_GET['sid'])){
		$sid=$_GET['sid'];
		$student =new Student();
		$result_set=$student->getAllDetailsOfAStudent($sid);
		if($row=mysqli_fetch_assoc($result_set))
			extract($row);
		
		$parent=new Parents();
		$father_db_row=$parent->getFatherDetails($sid);
		$mother_db_row=$parent->getMotherDetails($sid);
		extract($father_db_row);
		//we cannot extract mother's row here because the variables names would clash and father details would be overridden so to avoid that overriding we would extract mother details later after using father details variable
		
	?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Student";
	$breadcrumb = "
	<li class='breadcrumb-item'>Student Management</li>
	<li class='breadcrumb-item active'>Edit Student</li>";
	include_once("top-bar.php");
	?>
		<!-- Start Page content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card-box">
							<form class="" action="" name="add-student" id="add-student" method="POST">
							<h4>Personal Details</h4>
								<div class="form-group">
									<label for="student_first_name">First Name</label>
									<input type="text" class="form-control" id="student_first_name" name="student_first_name"required placeholder="Your good name please!" value="<?php echo $student_first_name;?>"/>
								</div>
								
								<div class="form-group">
									<label for="student_last_name">Last Name</label>
									<input type="text" class="form-control" name="student_last_name" id="student_last_name"required placeholder="Also Surname!" value="<?php echo $student_last_name;?>"/>
								</div>
	
								<div class="form-group">
									<label for="student_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" id="student_email" name="student_email"required parsley-type="email" placeholder="Enter a valid e-mail" value="<?php echo $student_email;?>"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="student_number">Number</label>
									<div>
										<input data-parsley-type="number" id="student_number" name="student_number"type="text" class="form-control" required placeholder="Enter only numbers" value="<?php echo $student_number;?>"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="student_address">Address</label>
									<div>
										<textarea id="student_address" name="student_address" required class="form-control" placeholder="Address please!"><?php echo $student_address;?></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label for="student_branch">Branch</label>
									<input type="text" id="student_branch" name="student_branch" class="form-control" required placeholder="Enter Branch" value="<?php echo $student_branch;?>"/>
								</div>
								
								<div class="form-group">
									<label for="student_dob">DOB</label>
									<input type="text" id="student_dob" name="student_dob"class="form-control" required placeholder="yyyy-mm-dd So that we can wish!" value="<?php echo $student_dob;?>"/>
								</div>
								
								<div class="form-group">
									<label for="student_college">College</label>
									<input type="text" class="form-control" id="student_college" name="student_college" required placeholder="Enter college" value="<?php echo $student_college;?>"/>
								</div>
								
								<div class="form-group">
									<label for="student_gender">Gender</label>
									<input type="text" class="form-control" id="student_gender" name="student_gender" required placeholder="" value="<?php echo $student_gender;?>"/>
								</div>
								
								<div class="form-group">
									<label for="stream_id">Stream</label>
									<input type="text" class="form-control" id="stream_id" name="stream_id" required placeholder="Enter stream" value="<?php echo $stream_id;?>"/>
								</div>
								
							<h4>Father's Details</h4>
							<input type="hidden" value="<?php echo $pid;?>" name="father_id">
								<div class="form-group">
									<label for="father_first_name">First Name</label>
									<input type="text" class="form-control" id="father_first_name" name="father_first_name" required placeholder="Enter name" value="<?php echo $parent_first_name;?>"/>
								</div>
								
								<div class="form-group">
									<label for="father_number">Number</label>
									<div>
										<input data-parsley-type="number" type="text" class="form-control" id="father_number" name="father_number" required placeholder="Enter only numbers" value="<?php echo $parent_number;?>"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="father_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" id="father_email" name="father_email" required parsley-type="email" placeholder="Enter a valid e-mail" value="<?php echo $parent_email;?>"/>
									</div>
								</div>
								
							<?php extract($mother_db_row);?>	
							<h4>Mother's Details</h4>
							<input type="hidden" value="<?php echo $pid;?>" name="mother_id">
								<div class="form-group">
									<label for="mother_first_name">First Name</label>
									<input type="text" class="form-control" id="mother_first_name" name="mother_first_name" required placeholder="Enter name" value="<?php echo $parent_first_name;?>"/>
								</div>
								
								<div class="form-group">
									<label for="mother_number">Number</label>
									<div>
										<input data-parsley-type="number" type="text" class="form-control" id="mother_number" name="mother_number" required placeholder="Enter only numbers" value="<?php echo $parent_number;?>"/>
									</div>
								</div>
								
								<div class="form-group">
									<label for="mother_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" id="mother_email" name="mother_email" required parsley-type="email" placeholder="Enter a valid e-mail" value="<?php echo $parent_email;?>"/>
									</div>
								</div>

								
								
								
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light update-student" data-student-id="<?php echo $sid;?>" name="update_student_details">
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

		<?php include_once("footer.php");?>

</div>
<?php
	}else{
		echo "Something wrong";
	}
?>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
