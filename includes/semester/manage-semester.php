<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<div class="content-page">

    <?php
    $page_title = "Manage Semester";
    $breadcrumb = "
	<li class='breadcrumb-item'>Semester Management</li>
	<li class='breadcrumb-item active'>Manage Semester</li>";
    include_once("includes/top-bar.php");

    //    $subject = new Subject();

    ?>
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div class="pull-left form-row">
                            <div class="form-group">
                                <select id="num-rows-choice" class="custom-select" onchange="loadData()">
                                    <option value="0" selected>Rows Per Page</option>
                                    <option>10</option>
                                    <option>25</option>
                                    <option>50</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search"
                                       name="key" id="key" style="margin-left: 10px;"
                                       onkeyup="search(this.value)">
                            </div>
                        </div>
                        <p class="text-muted font-14 m-b-20 pull-right">
                            <a type="button" href="semester.php?q=add"
                               class="btn btn-primary waves-effect waves-light btn-lg"> <i class="fa fa-plus m-r-5"></i>
                                <span>Add New Semester</span> </a>
                        </p>

                        <div id="semester-info">

                        </div>

                    </div>

                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- container -->

    </div>
    <!-- content -->

    <?php include_once("includes/footer.php"); ?>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->