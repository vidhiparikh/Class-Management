<?php
if(isset($_POST['update_enquiry_details'])){
	$id=$_GET['id'];
	extract($_POST);
	$enquiry=new Enquiry();
	$enquiry->updateEnquiry($id,$student_first_name, $student_last_name, $student_email, $student_number, $student_branch, $student_sem, $stream, $reference, $date_of_enquiry, $comments, $handeled_by, $college_name);
	Functions::redirect("enquiry.php?q=default&op=update&p=success");
}
?>
<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$enquiry=new Enquiry();
		$result_set=$enquiry->getAllDetailsOfAnEnquiry($id);
		if($row=mysqli_fetch_assoc($result_set))
			extract($row);
	}
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Enquiry";
	$breadcrumb = "
	<li class='breadcrumb-item'>Enquiry Management</li>
	<li class='breadcrumb-item active'>Add Enquiry</li>";
	include_once("top-bar.php");
	?>
		<!-- Start Page content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card-box">
							<form class="" action="" name="add-enquiry" id="add-enquiry" method="POST">
							<h4>Personal Details</h4>
								<div class="form-group">
									<label for="student_first_name">Student First Name</label>
									<input type="text" class="form-control" id="student_first_name" name="student_first_name"required placeholder="Your good name please!" value="<?php echo $student_first_name;?>"/>
								</div>
								
								<div class="form-group">
									<label for="student_last_name">Student Last Name</label>
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
									<label for="student_branch">Branch</label>
									<input type="text" id="student_branch" name="student_branch" class="form-control" required placeholder="Enter Branch" value="<?php echo $student_branch;?>"/>
								</div>
								
								<div class="form-group">
									<label for="student_sem">Sem</label>
									<input type="text" id="student_sem" name="student_sem"class="form-control" required placeholder="Enter current semester" value="<?php echo $student_sem;?>"/>
								</div>
								
								<div class="form-group">
									<label for="stream">Stream</label>
									<input type="text" class="form-control" id="stream" name="stream" required placeholder="Enter stream" value="<?php echo $stream;?>"/>
								</div>
								
								<div class="form-group">
									<label for="reference">Reference</label>
									<input type="text" class="form-control" id="reference" name="reference" required placeholder="You have heard about us from" value="<?php echo $reference;?>"/>
								</div>

							
								<div class="form-group">
									<label for="college_name">College</label>
									<input type="text" class="form-control" id="college_name" name="college_name" required placeholder="Enter college" value="<?php echo $college_name;?>"/>
								</div>
								
								<div class="form-group">
									<label for="handeled_by">Enquiry Handeled By</label>
									<input type="text" class="form-control" id="handeled_by" name="handeled_by" required placeholder="Enter name" value="<?php echo $handeled_by;?>"/>
								</div>
																
								<div class="form-group">
									<label for="date_of_enquiry">Date Of Enquiry</label>
									<input type="text" id="date_of_enquiry" name="date_of_enquiry" class="form-control" required placeholder="yyyy-mm-dd So that we can revert!" value="<?php echo $date_of_enquiry;?>"/>
								</div>
								
								<div class="form-group">
									<label for="comments">Comments</label>
									<div>
										<textarea id="comments" name="comments" required class="form-control" placeholder="Address please!"><?php echo $comments;?></textarea>
									</div>
								</div>
								
								
																
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="update_enquiry_details">
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
