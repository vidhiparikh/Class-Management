<?php
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 2/17/2018
 * Time: 1:41 PM
 */
if (isset($_GET['sid'])) {
    $sid = $_GET['sid'];
    $student = new Student();
    $result_set = $student->getAllDetailsOfAStudent($sid);
    if ($row = mysqli_fetch_assoc($result_set))
        extract($row);

    $parent = new Parents();
    $father_db_row = $parent->getFatherDetails($sid);
    $mother_db_row = $parent->getMotherDetails($sid);
    extract($father_db_row);
    //we cannot extract mother's row because the variable names would clash and father details would be
    //overridden so to avoid that overriding we would extract mother details later after using father details variable
    $father_name = $parent_first_name;
    $father_number = $parent_number;
    $father_email = $parent_email;
    extract($mother_db_row);
    $mother_name = $parent_first_name;
    $mother_number = $parent_number;
    $mother_email = $parent_email;

    $student_full_name = $student_first_name . " " . $student_last_name;

    ?>
    <div class="content-page">
    <?php

    $page_title = "";
    $breadcrumb = "";

    include_once("top-bar.php");
    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <!-- meta -->
                    <div class="profile-user-box card-box bg-custom">
                        <div class="row">
                            <div class="col-sm-6">
                            <span class="pull-left mr-3"><img src="assets/images/users/avatar-1.jpg" alt=""
                                                              class="thumb-lg rounded-circle"></span>

                                <div class="media-body text-white">
                                    <h4 class="mt-1 mb-1 font-18"><?php echo $student_full_name; ?></h4>

                                    <p class="font-13 text-light"> <?php echo $student_college; ?></p>

                                    <p class="text-light mb-0">Branch Will Come Here</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <a type="button" class="btn btn-light waves-effect"
                                       href="student.php?q=edit&sid=<?php echo $sid; ?>">
                                        <i class="mdi mdi-account-settings-variant mr-1"></i> Edit Student
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-md-4">
                    <!-- Personal-Information -->
                    <div class="card-box">
                        <h4 class="header-title mt-0 m-b-20">Personal Information</h4>

                        <div class="panel-body">
                            <hr/>

                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Full Name :</strong> <span
                                        class="m-l-15"><?php echo $student_full_name; ?></span>
                                </p>

                                <p class="text-muted font-13"><strong>Mobile :</strong><span
                                        class="m-l-15"><?php echo $student_number; ?></span>
                                </p>

                                <p class="text-muted font-13"><strong>Email :</strong> <span
                                        class="m-l-15"><?php echo $student_email; ?></span>
                                </p>

                                <p class="text-muted font-13"><strong>Address :</strong> <span
                                        class="m-l-15"><?php echo $student_address; ?></span>
                                </p>

                                <p class="text-muted font-13"><strong>Birth Date :</strong>
                                <span class="m-l-5">
                                    <span class="flag-icon flag-icon-us m-r-5 m-t-0" title="us"></span>
                                    <span><?php echo $student_dob; ?></span>
                                </span>
                                </p>


                            </div>

                        </div>
                    </div>
                    <!-- Personal-Information -->


                </div>
                <div class="col-md-4">
                    <!-- Personal-Information -->
                    <div class="card-box">
                        <h4 class="header-title mt-0 m-b-20">Parents Information</h4>

                        <div class="panel-body">
                            <hr/>

                            <div class="text-left">
                                <p class="text-muted font-13"><strong>Father's Name :</strong> <span
                                        class="m-l-15"><?php echo $father_name; ?></span>
                                </p>

                                <p class="text-muted font-13"><strong>Mobile :</strong><span
                                        class="m-l-15"><?php echo $father_number; ?></span>
                                </p>

                                <p class="text-muted font-13"><strong>Email :</strong> <span
                                        class="m-l-15"><?php echo $father_email; ?></span>
                                </p>

                                <p class="text-muted font-13"><strong>Mother's Name :</strong> <span
                                        class="m-l-15"><?php echo $mother_name; ?></span>
                                </p>

                                <p class="text-muted font-13"><strong>Mobile :</strong>
                                <span class="m-l-5">
                                    <span class="flag-icon flag-icon-us m-r-5 m-t-0" title="us"></span>
                                    <span><?php echo $mother_number; ?></span>
                                </span>
                                </p>
                                <p class="text-muted font-13"><strong>Email :</strong>
                                <span class="m-l-5">
                                    <span class="flag-icon flag-icon-us m-r-5 m-t-0" title="us"></span>
                                    <span><?php echo $mother_email; ?></span>
                                </span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <!-- Personal-Information -->
                </div>
                <div class="col-md-4">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box tilebox-one">
                                <i class="icon-paypal float-right text-muted"></i>
                                <h6 class="text-muted text-uppercase mt-0">Total Fees</h6>

                                <h2 class="m-b-20"><i class="fa fa-rupee d-inline"></i><span data-plugin="counterup">13,782</span></h2>

                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-sm-6">
                            <div class="card-box tilebox-one">
                                <i class="icon-layers float-right text-muted"></i>
                                <h6 class="text-muted text-uppercase mt-0">Fees Paid</h6>

                                <h2 class="m-b-20" data-plugin="counterup"><i class="fa fa-rupee d-inline"></i>5,000</h2>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-sm-6">
                            <div class="card-box tilebox-one">
                                <i class="icon-paypal float-right text-muted"></i>
                                <h6 class="text-muted text-uppercase mt-0">Balance</h6>

                                <h2 class="m-b-20"><i class="fa fa-rupee d-inline"></i><span data-plugin="counterup">6,782</span></h2>

                            </div>
                        </div>
                        <!-- end col -->



                    </div>
                    <!-- end row -->


                </div>
                <!-- end col -->

            </div>
            <!-- end row -->


        </div>
        <!-- container -->

    </div> <!-- content -->
    <?php
}
?>