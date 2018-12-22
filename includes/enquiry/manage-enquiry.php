<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

	<?php
	$page_title = "Manage Enquiry";
	$breadcrumb = "
	<li class='breadcrumb-item'>Enquiry Management</li>
	<li class='breadcrumb-item active'>Manage Enquiry</li>";
	include_once("top-bar.php");
	$enquiry = new Enquiry();
	$result_set = $enquiry->readEnquiry();
	?>
	<!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <p class="text-muted font-14 m-b-20 pull-right">
                                        <a type="button" class="btn btn-primary waves-effect waves-light btn-lg" href="enquiry.php?q=add"> <i class="fa fa-plus m-r-5"></i> <span>Add New Enquiry</span> </a>
                                    </p>

                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                           	<th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Branch</th>
                                            <th>Phone Number</th>
                                            <th>Handled By</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$id = 1;
                                        	while($row=mysqli_fetch_assoc($result_set)){
												$sid=$row['id'];
										?>
                                        <tr>
                                            <th scope="row"><?php echo $id; ?></th>
                                            <td><?php echo $row['student_first_name'] ." ".$row['student_last_name'];?></td>
                                            <td><?php echo $row['student_email'];?></td>
                                            <td><?php echo $row['student_branch']; ?></td>
                                            <td><?php echo $row['student_number']; ?></td>
                                            <td><?php echo $row['handeled_by'];?></td>
                                            <td>
                                            <div class="button-list">
                                            <a type="button" class="btn btn-icon waves-effect btn-light" data-toggle="tooltip" title="View Enquiry Profile"> <i class="fa fa-eye"></i> </a>
                                        	<a class="btn btn-icon waves-effect waves-light btn-pink" data-toggle="tooltip" title="Edit Enquiry Profile" href="enquiry.php?q=edit&id=<?php echo $sid; ?>"> <i class="fa fa-pencil"></i> </a>
                                        	<a type="button" class="btn btn-icon waves-effect waves-light btn-danger" data-toggle="tooltip" title="Delete Enquiry Entry"> <i class="fa fa-remove"></i> </a>
                                        	
                                        	</div>
                                        	</td>
                                        </tr>
                                        <?php
												$id++;
												}//end of while
										?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

	<?php include_once("footer.php");?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
