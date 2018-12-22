
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Manage Student";
    $breadcrumb = "
	<li class='breadcrumb-item'>Student Management</li>
	<li class='breadcrumb-item active'>Manage Student</li>";
    include_once("top-bar.php");

    $student = new Student();

    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <p class="text-muted font-14 m-b-20 pull-right">
                            <a type="button" href="student.php?q=add"
                               class="btn btn-primary waves-effect waves-light btn-lg"> <i class="fa fa-plus m-r-5"></i>
                                <span>Add New Student</span> </a>
                        </p>
						<div class="pull-left form-row">
							<div class="form-group">
								<select id="num-rows-choice" class="custom-select">
									<option value="2" selected>Rows Per Page</option>
									<option value="">10</option>
									<option value="">25</option>
									<option value="">50</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control"placeholder="Search"name="key" id="key" style="margin-left: 10px;">
							</div>
						</div>
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Phone Number</th>
                                <th>Batch</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $student_per_page = 2;
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }else{
                                $page=1;
                            }
                            if($page=="" || $page == 1){
                                $limit_start = 0;
                            }else{
                                $limit_start = ($page * $student_per_page) - $student_per_page;
                            }
                            $total_student = $student->getTotalStudentCount();
                            $num_of_pages = ceil($total_student/$student_per_page);
                            $result_set = $student->readAllStudentsForPagination($limit_start, $student_per_page);

                            $id = $student_per_page * $page - $student_per_page + 1;
                            while ($row = mysqli_fetch_assoc($result_set)) {
                                $sid = $row['sid'];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $id; ?></th>
                                    <td><?php echo $row['student_first_name'] . " " . $row['student_last_name']; ?></td>
                                    <td><?php echo $row['student_number']; ?></td>
                                    <td>Vacation Batch</td>
                                    <td>
                                        <div class="button-list">
                                            <a type="button" class="btn btn-icon waves-effect btn-light"
                                               data-toggle="tooltip" title="View Student!"
                                               href="student.php?q=view&sid=<?php echo $sid; ?>"> <i
                                                    class="fa fa-eye"></i> </a>
                                            <a type="button" class="btn btn-icon waves-effect waves-light btn-purple"
                                               data-toggle="tooltip" title="Edit Student!"
                                               href="student.php?q=edit&sid=<?php echo $sid; ?>"> <i
                                                    class="fa fa-pencil"></i> </a>
                                            <a type="button" class="btn btn-icon waves-effect waves-light btn-pink"
                                               data-toggle="tooltip" title="Update Course Details!"> <i
                                                    class="fa fa-file"></i> </a>
                                            <a type="button"
                                               class="btn btn-icon waves-effect waves-light btn-danger delete-student"
                                               data-toggle="tooltip" title="Delete Student!"
                                               data-student-id="<?php echo $sid; ?>"> <i class="fa fa-remove"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $id++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <hr>
                        <ul class="pagination justify-content-end pagination-split mt-0">
                            <?php
                            $li_class= "page-item";
                            $a_class = "page-link";
                            $li_active_class = $li_class." active";
                            $page_num = $page==1?1:$page-1;
                            echo "<li class='$li_class'><a href='student.php?page=$page_num' class='$a_class'>&lt;&lt;</a></li>";
                            for($i=1; $i<=$num_of_pages; $i++) {
                                if($i==$page)
                                    echo "<li class='$li_active_class'><a href='student.php?page=$i' class='$a_class'>$i</a></li>";
                                else
                                    echo "<li class='$li_class'><a href='student.php?page=$i' class='$a_class'>$i</a></li>";
                            }
                            $page_num = $page==$num_of_pages?$num_of_pages:$page+1;
                            echo "<li class='$li_class'><a href='student.php?page=$page_num' class='$a_class'>&gt;&gt;</a></li>";
                            ?>


                        </ul>
                    </div>

                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <?php include_once("footer.php"); ?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
