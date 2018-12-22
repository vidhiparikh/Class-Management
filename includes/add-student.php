<?php
	if(isset($_POST['add_student_details'])){
		extract($_POST);
		$student=new Student();
		$student_id = $student->insertStudent($student_first_name, $student_last_name, $student_email, $student_number, $student_address, $student_branch, $student_dob, $student_college, $student_gender, $stream_id);
		
		$parent = new Parents();
		$gender="Male";
		$father_id = $parent->insertParentDetails($father_first_name,$father_number,$father_email,$gender);
		$gender="Female";
		$mother_id = $parent->insertParentDetails($mother_first_name,$mother_number,$mother_email,$gender);
		
		$student->linkWithGuardian($student_id,$father_id);
		$student->linkWithGuardian($student_id,$mother_id);
		Functions::redirect("student.php?op=ins&p=success&page=student");
		
	}
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Student";
	$breadcrumb = "
	<li class='breadcrumb-item'>Student Management</li>
	<li class='breadcrumb-item active'>Add Student</li>";
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
                                <div class="form-row">
								<div class="form-group col-md-4">
									<label for="student_first_name">First Name</label>
									<input type="text" class="form-control" id="student_first_name" name="student_first_name"required placeholder="Your good name please!" />
								</div>
								
								<div class="form-group col-md-4">
									<label for="student_last_name">Last Name</label>
									<input type="text" class="form-control" name="student_last_name" id="student_last_name"required placeholder="Also Surname!" />
								</div>
	
								<div class="form-group col-md-4">
									<label for="student_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" id="student_email" name="student_email"required parsley-type="email" placeholder="Enter a valid e-mail" />
									</div>
								</div>
								
								<div class="form-group col-md-4">
									<label for="student_number">Number</label>
									<div>
										<input data-parsley-type="number" id="student_number" name="student_number"type="text" class="form-control" required placeholder="Enter only numbers" />
									</div>
								</div>
								
								<div class="form-group col-md-4">
									<label for="student_address">Address</label>
									<div>
										<textarea id="student_address" name="student_address" required class="form-control" placeholder="Address please!"></textarea>
									</div>
								</div>
								
								<div class="form-group col-md-4">
									<label for="student_branch">Branch</label>
									<input type="text" id="student_branch" name="student_branch" class="form-control" required placeholder="Enter Branch" />
								</div>
								
								<div class="form-group col-md-4">
									<label for="student_dob">DOB</label>
									<input type="text" id="student_dob" name="student_dob"class="form-control" required placeholder="yyyy-mm-dd So that we can wish!" />
								</div>
								
								<div class="form-group col-md-4">
									<label for="student_college">College</label>
									<input type="text" class="form-control" id="student_college" name="student_college" required placeholder="Enter college" />
								</div>
								
								<div class="form-group col-md-4">
									<label for="student_gender">Gender</label>
								    <select class="form-control" required name="student_gender" id="student_gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    </select>
                                </div>
								
								<div class="form-group col-md-4">
									<label for="stream_id">Stream</label>
									<input type="text" class="form-control" id="stream_id" name="stream_id" required placeholder="Enter stream" />
								</div>
                                </div>
							<h4>Father's Details</h4>
                                <div class="form-row">
								<div class="form-group col-md-4">
									<label for="father_first_name">First Name</label>
									<input type="text" class="form-control" id="father_first_name" name="father_first_name" required placeholder="Enter name" />
								</div>
								
								<div class="form-group col-md-4">
									<label for="father_number">Number</label>
									<div>
										<input data-parsley-type="number" type="text" class="form-control" id="father_number" name="father_number" required placeholder="Enter only numbers" />
									</div>
								</div>
								
								<div class="form-group col-md-4">
									<label for="father_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" id="father_email" name="father_email" required parsley-type="email" placeholder="Enter a valid e-mail" />
									</div>
								</div>
                                </div><!--end of form row-->
								
							<h4>Mother's Details</h4>
                                <div class="form-row">
								<div class="form-group col-md-4">
									<label for="mother_first_name">First Name</label>
									<input type="text" class="form-control" id="mother_first_name" name="mother_first_name" required placeholder="Enter name" />
								</div>
								
								<div class="form-group col-md-4">
									<label for="mother_number">Number</label>
									<div>
										<input data-parsley-type="number" type="text" class="form-control" id="mother_number" name="mother_number" required placeholder="Enter only numbers" />
									</div>
								</div>
								
								<div class="form-group col-md-4">
									<label for="mother_email">E-Mail</label>
									<div>
										<input type="email" class="form-control" id="mother_email" name="mother_email" required parsley-type="email" placeholder="Enter a valid e-mail" />
									</div>
								</div>

                                </div><!--end of form-row -->
								
								
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="add_student_details">
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


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
