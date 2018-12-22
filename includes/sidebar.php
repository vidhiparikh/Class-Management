<?php
if(!isset($_SESSION['login'])){
    session_start();
}?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

	<div class="slimscroll-menu" id="remove-scroll">

		<!-- LOGO -->
		<div class="topbar-left">
			<a href="index.php" class="logo">
				<span>
					<img src="assets/images/logo.png" alt="" height="45">
				</span>
				<i>
					<img src="assets/images/logo_sm.png" alt="" height="28">
				</i>
			</a>
		</div>

		<!-- User box -->
		<div class="user-box">
			<div class="user-img">
				<img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
			</div>
			<h5><a href="#"><?php //echo $_SESSION['member_name'];?></a> </h5>
			<p class="text-muted"><?php //echo $_SESSION['member_role'];?></p>
		</div>

		<!--- Sidemenu -->
		<div id="sidebar-menu">

			<ul class="metismenu" id="side-menu">

				<!--<li class="menu-title">Navigation</li>-->

				<li>
					<a href="index.php">
						<i class="fi-air-play"></i> <span> Dashboard </span>
					</a>
				</li>

				<li>
					<a href="javascript: void(0);"><i class="fi-layers"></i> <span> Course &amp; Batch </span> <span class="menu-arrow"></span></a>
					<ul class="nav-second-level" aria-expanded="false">
						<li><a href="#">Manage Batch</a></li>
						<li><a href="#">Manage Course</a></li>
						
					</ul>
				</li>
				
				<li>
					<a href="javascript: void(0);"><i class="fi-link"></i> <span> Branch &amp; Semester </span> <span class="menu-arrow"></span></a>
					<ul class="nav-second-level" aria-expanded="false">
						<li><a href="branch.php">Manage Branch</a></li>
						<li><a href="subject.php">Manage Subject</a></li>
						<li><a href="semester.php">Manage Semester</a></li>
						
					</ul>
				</li>
				<li>
					<a href="javascript: void(0);"><i class="fi-mail"></i><span> Staff Management </span> <span class="menu-arrow"></span></a>
					<ul class="nav-second-level" aria-expanded="false">
						<li><a href="#">Manage Staff</a></li>
						<li><a href="#">Staff Attendance</a></li>
					</ul>
				</li>
				<li>
					<a href="enquiry.php">
						<i class="fi-air-play"></i> <span> Manage Enquiry </span>
					</a>
				</li>
				<li>
					<a href="javascript: void(0);"><i class="fi-layout"></i><span> Student Management </span> <span class="menu-arrow"></span></a>
					<ul class="nav-second-level" aria-expanded="false">
						<li><a href="student.php">Manage Student</a></li>
						<li><a href="#">Attendance</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript: void(0);"><i class="fi-briefcase"></i> <span> Fee Management </span> <span class="menu-arrow"></span></a>
					<ul class="nav-second-level" aria-expanded="false">
						<li><a href="#">Manage Fee</a></li>
						<li><a href="#">Fee Reminder</a></li>
					</ul>
				</li>

				<li>
					<a href="#">
						<i class="fi-command"></i> <span> Manage Expense </span>
					</a>
				</li>

				<li>
					<a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Reporting </span> <span class="menu-arrow"></span></a>
					<ul class="nav-second-level" aria-expanded="false">
						<li><a href="#">Expense Report</a></li>
						<li><a href="#">Faculty Report</a></li>
						<li><a href="#">Fee Report</a></li>
						<li><a href="#">Students Report</a></li>
						<li><a href="#">Tax Report</a></li>
					</ul>
				</li>


				<li>
					<a href="#"><i class="fi-location-2"></i> <span>Manage Test </span></a>
				</li>

			</ul>

		</div>
		<!-- Sidebar -->

		<div class="clearfix"></div>

	</div>
	<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->