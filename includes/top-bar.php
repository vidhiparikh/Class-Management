<?php
    if(!isset($_SESSION['login'])){
        session_start();
    }?>
<!-- Top Bar Start -->
<div class="topbar">

	<nav class="navbar-custom">

		<ul class="list-unstyled topbar-right-menu float-right mb-0">

			<li class="hide-phone app-search">
				<form>
					<input type="text" placeholder="Search..." class="form-control">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</li>

			<li class="dropdown notification-list">
				<a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
					<img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1"><?php //echo $_SESSION['member_name'];?> <i class="mdi mdi-chevron-down"></i> </span>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
					<!-- item-->
					<div class="dropdown-item noti-title">
						<h6 class="text-overflow m-0">Welcome !</h6>
					</div>
					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<i class="fi-head"></i> <span>My Account</span>
					</a>
					<!-- item-->
					<a href="logout.php" class="dropdown-item notify-item">
						<i class="fi-power"></i> <span>Logout</span>
					</a>
				</div>
			</li>

		</ul>

		<ul class="list-inline menu-left mb-0">
			<li class="float-left">
				<button class="button-menu-mobile open-left disable-btn">
					<i class="dripicons-menu"></i>
				</button>
			</li>
			<li>
				<div class="page-title-box">
					<h4 class="page-title"><?php echo $page_title;?> </h4>
					<ol class="breadcrumb">
						<?php echo $breadcrumb;?>
					</ol>
				</div>
			</li>

		</ul>

	</nav>

</div>
<!-- Top Bar End -->