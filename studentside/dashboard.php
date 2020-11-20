<?php
	session_start();
	error_reporting(E_ALL);
	require_once("db_class.php");

	//check for login

	if(! isset($_SESSION["stud_id"]) )
	{
		header("location: loginstudent.php");
		exit;
	}

	$id = $_SESSION["stud_id"];
	$Hi = "";


	$exist_user = MYDB::query(
															"select
																*
															from
																tbl_student
															where
																stud_id = ? "
															,
															array($id)
															,
															"SELECT"
														);
	
	
	foreach ($exist_user as $key){
			$id = "{$key['stud_id']}";
			$lname = "{$key['stud_lname']}";
			$fname = "{$key['stud_fname']}";
			$deptid = "{$key['dept_id']}";
            $yrlvl = "{$key['stud_yearLevel']}";
            $email = "{$key['email']}";
            $date = "{$key['date_applied']}";
				
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LockItUp</title>
	<link rel="icon" type="image/png" href="image/lock.png">
	<link rel="stylesheet" href="../view/assets/css/bs.css">
	<link rel="stylesheet" href="../view/assets/css/fa.css">
	<link rel="stylesheet" href="../view/assets/css/progress.css">
	<link rel="stylesheet" href="../view/assets/css/animate.css">
	<link rel="stylesheet" href="../view/assets/css/custom.css"> </head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="../view/image/locker.png" width="25" height="25"> <span>UC Locker System</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic"> <img src="../view/image/blank.png" alt="Avatar" class="img-circle profile_img"> </div>
						
						<?php
						
						echo"<div class='profile_info'> <span>Welcome </span> <h2>{$fname} {$lname}</h2> </div>";
						
                        ?> 
							
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<div id="sidebar-menu" class=" main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
							<li> <a href="dashboard.php"><i class="fa fa-home"></i> Home </a> </li>
								<li> <a href="student.php"><i class="fa fa-profile"></i> Your Profile </a> </li>
								<li> <a href="departments.php"><i class="fa fa-profile"></i> Department </a> </li>

							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
				</div>
			</div>
			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
						<ul class="nav navbar-nav navbar-right">
							<li class="">
							<?php
								echo "<a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown'aria-expanded='false'> <img src='../view/image/blank.png' alt='Avatar'> {$fname} <span class='fa fa-angle-down'></span> </a>";
							?>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
								<?php  
									echo"<li><i class='fa pull-right'></i> {$lname} {$fname}</li> ";
								?>
									<li><a href="javascript:;"> Profile</a></li>
									<li><a href="../controller/loginController/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>       
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Home Page</h3> </div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Plain Page</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content"> Add content to the page ... </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page content -->
			<!-- footer content -->
			<footer>
				<div class="pull-right"> Software Engineering 2018
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>
	<script src="../view/assets/js/jq.js"></script>
	<script src="../view/assets/js/bs.js"></script>
	<script src="../view/assets/js/fc.js"></script>
	<script src="../view/assets/js/progress.js"></script>
	<script src="../view/assets/js/custom.js"></script>
</body>

</html>