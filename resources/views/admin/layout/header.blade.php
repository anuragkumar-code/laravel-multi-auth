<!DOCTYPE html>
<html lang="en">	
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<!-- Title -->
		<title> Auth</title>

		<!-- Favicon -->
		<link rel="icon" href="assets/itriangle_fav.webp" type="image/x-icon">

		<!-- Bootstrap css -->
		<link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" id="style">

		<!-- Style css -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/plugins.css" rel="stylesheet">	

		<!-- Icons css -->
		<link href="assets/css/icons.css" rel="stylesheet">

		<!-- Animations css -->
		<link href="assets/css/animate.css" rel="stylesheet">
				<!-- JQuery min js -->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

	</head>

	<body class="main-body app sidebar-mini ltr">

		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- page -->
	   <div class="page custom-index">

			<!-- main-header -->
			<div class="main-header side-header sticky nav nav-item">
				<div class="container-fluid main-container ">
					<div class="main-header-left ">
						<div class="app-sidebar__toggle mobile-toggle" data-bs-toggle="sidebar">
							<a class="open-toggle"   href="javascript:void(0);"><i class="header-icons" data-eva="menu-outline"></i></a>
							<a class="close-toggle"   href="javascript:void(0);"><i class="header-icons" data-eva="close-outline"></i></a>
						</div>
						<div class="responsive-logo">
							<a href="javascript:void(0)" class="header-logo"><img src="assets/itriangle_logo.png" class="logo-11" alt="logo"></a>
							<a href="javascript:void(0)" class="header-logo"><img src="assets/img/brand/logo-white.png" class="logo-1" alt="logo"></a>
						</div>
					</div>
					<button class="navbar-toggler nav-link icon navresponsive-toggler vertical-icon ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
					</button>
					<div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0  mg-lg-s-auto">
						<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
							<div class="main-header-right">
								<div class="nav nav-item  navbar-nav-right mg-lg-s-auto">
									<div class="dropdown main-profile-menu nav nav-item nav-link" style="background:white">
										<a class="profile-user d-flex" href="javascript:void(0)"><img src="assets/img/users/sample.png" alt="user-img" class="rounded-circle mCS_img_loaded"><span></span></a>

										<div class="dropdown-menu">
											<div class="main-header-profile header-img rounded-top-5 p-3" style="background-color:#5b70b1">
												<h6>DCT Admin</h6>
											</div>
											<a class="dropdown-item" target="_blank" href="../../dctHP.php?page=dctadmincommandlist"><i class="fas fa-sim-card"></i> SMT</a>
											<a class="dropdown-item" target="_blank" href="../../clientHP.php?page=userdashboard"><i class="fas fa-sim-card"></i> SMT</a>
											<a class="dropdown-item" target="_blank" href="../../webconfigtool/online.php"><i class="fa fa-cog"></i> Config Tool</a>
 											<a class="dropdown-item" href="functions/logout.php"><i class="fa fa-sign-out-alt"></i> Sign Out</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /main-header -->