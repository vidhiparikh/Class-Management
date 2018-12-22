<?php
	if(isset($_POST['update_branch_details'])){
		$id=$_GET['id'];
		extract($_POST);
		$branch=new Branch();
		$branch->update($id,$branch_code, $branch_name);
		Functions::redirect("branch.php?page=branch&op=edit&p=update");
	}
?>
<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$branch =new Branch();
		$result_set=$branch->getBranchDetailsById($id);
		if($row=mysqli_fetch_assoc($result_set))
			extract($row);
?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Branch";
	$breadcrumb = "
	<li class='breadcrumb-item'>Branch Management</li>
	<li class='breadcrumb-item active'>Add Branch</li>";
	include_once("includes/top-bar.php");
	?>
		<!-- Start Page content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card-box">
							<form class="" action="" name="add-branch" id="add-branch" method="POST">
							<h4>Personal Details</h4>
								<div class="form-group">
									<label for="branch_code">Branch Code</label>
									<input type="text" class="form-control" id="branch_code" name="branch_code"required placeholder="Branch Code" value="<?php echo $branch_code;?>"/>
								</div>
								
								<div class="form-group">
									<label for="branch_name">Branch Name</label>
									<input type="text" class="form-control" name="branch_name" id="branch_name"required placeholder="Also Full Name!" value="<?php echo $branch_name;?>"/>
								</div>
	
								<div class="form-group">
									<div>
										<button type="submit" class="btn btn-custom waves-effect waves-light" name="update_branch_details">
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
