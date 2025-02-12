<?php
require '../../model/lockerModel.php';
$locker = new Locker();
$row=$locker->getAllLocker();
?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LockItUp | Deparments Report</title>
	<link rel="icon" type="../image/png" href="../image/lock.png">
	<link rel="stylesheet" href="../assets/css/bs.css">
	<link rel="stylesheet" href="../assets/css/fa.css">
	<link rel="stylesheet" href="../assets/css/progress.css">
	<link rel="stylesheet" href="../assets/css/green.css">
	<link rel="stylesheet" href="../assets/css/animate.css">
	<link rel="stylesheet" href="../assets/css/custom.css">
	<link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../assets/css/buttons.dataTables.min.css"> </head>
<style>
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }
</style>
<body class="nav-md" ng-app="myApp">
	<div class="container body" ng-controller="myCtrl">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="../image/locker.png" width="25" height="25"> <span>UC Locker System</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic"> <img src="../image/blank.png" alt="Avatar" class="img-circle profile_img"> </div>
						<div class="profile_info"> <span>Welcome,</span>
							<h2>Admin</h2> </div>
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<div id="sidebar-menu" class=" main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
								<li> <a href="home.php"><i class="fa fa-home"></i> Home </a> </li>
								<li> <a href="locker.php"><i class="fa fa-lock"></i> Lockers </a> </li>
								<li> <a href="students.php"><i class="fa fa-check-square-o"></i> students </a> </li>
								<li> <a href="departments.php"><i class="fa fa-book"></i> Departments </a> </li>
								<li> <a href="form.php"><i class="fa fa-list"></i> Form </a> </li>
								<li> <a href="../reports.php"><i class="fa fa-bar-chart"></i> Reports </a> </li>
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
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <img src="../image/blank.png" alt="Avatar"> Admin <span class="fa fa-angle-down"></span> </a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="javascript:;"> Profile</a></li>
									<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                            
						</div>
					</div>
				</div>
				<div class="clearfix">         
                </div>
				<div class="row">
					<div class="col-md-12">

						<div class="x_panel">
							<div class="x_title">
								<h2>Reports</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
								</ul>
								<div class="clearfix">
                                    
                                </div>
							</div>
							<div class="x_content">
								<p>Simple table with project listing with progress and editing options</p>
								<div class="col-md-3 col-sm-3 col-xs-6">
                                </div>
								<!-- start project list -->
								<table class="table table-striped projects" id="datatable-buttons">
									<thead>
										<tr>
                                            <th> Locker num. </th>
                                            <th> Dept ID</th>
                                            <th> Status</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($row as $r): ?>
										<tr >
											<td><?php echo $r['locker_num'];?></td>
											<td><?php echo $r['dept_id'];?></td>
											<td><?php echo $r['locker_status'];?></td>
										</tr>
										<?php endforeach?>
									</tbody>
								</table>
                            </div>
                            <!--  -->
                            <!--  -->
                            
						</div>
						<button class="btn btn-round btn-warning btn-lg" ><a href="../reports.php">Go Back To Reports</a></button>
                    </div>
				</div>
            </div>
            
            <!-- end of page content -->
            <!-- new page context -->
            
            <!--  end new-->
			<!-- footer content -->
			<footer>
				<div class="pull-right"> Software Engineering 2018 </div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>
	<!-- PHP -->
	<!-- END -->
	<!-- Script start -->
	<script src="../assets/js/jq.js"></script>
	<script src="../assets/js/bs.js"></script>
	<script src="../assets/js/fc.js"></script>
	<script src="../assets/js/progress.js"></script>
	<script src="../assets/js/bsprogress.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.buttons.min.js"></script>
	<script src="../assets/js/buttons.flash.min.js"></script>
	<script src="../assets/js/buttons.html5.min.js"></script>
	<script src="../assets/js/vfs_fonts.js"></script>
	<script src="../assets/js/pdfmake.min.js"></script>
	<script src="../assets/js/jszip.min.js"></script>
	<script src="../assets/js/buttons.print.min.js"></script>
	<script src="../assets/js/angular.min.js"></script>
	<script src="../assets/js/angular-route.js"></script>

</body>

</html>