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

<!DOCTYPE html>
<html lang="en">

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
								<li> <a href="Department.php"><i class="fa fa-profile"></i> Department </a> </li>
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
								echo "<a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown'aria-expanded='false'> <img src='image/blank.png' alt='Avatar'> {$fname} <span class='fa fa-angle-down'></span> </a>";
								?>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
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
							
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>List of Department(s)</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
									<li>
										<!-- <a class="close-link"><i class="fa fa-close"></i></a> --></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<p>Simple table with project listing with progress and editing options</p>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<input type="text" placeholder="Search Department" class="form-control col-md-7 col-xs-12" ng-model="search" /> </div>
								<!-- start project list -->
								<table class="table table-striped projects">
									<thead>
										<tr>
											<th ng-repeat="d in dept_label  ">{{ d }}</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="d in department  | filter:search">
											<td>{{ d.dept_id}} </td>
											<td>{{ d.dept_code}}</td>
											<td>{{ d.dept_description}}</td>
											<td>{{ d.office_location}}</td>
											<td> <a href="#" ng-click="editDepartment(d.dept_id)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a> <a href="#" ng-click="viewDepartment(d.dept_id,d.dept_code)" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a> <a href="#" ng-click="deleteDepartment(d.dept_id)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> </td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end of page content -->
			<!-- footer content -->
			<footer>
				<div class="pull-right"> Software Engineering 2018 </div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		
			<!-- END MODAL -->
			<!-- view modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="viewDepartment">
				
								<table id="view_course_table" class="table table-striped projects">
									<tr>
										<th ng-repeat="l in student_course_label">{{ l }}</th>
									</tr>
									<tr ng-repeat="s in student  | filter:search">
										<td>{{ s.stud_id }} </td>
										<td>{{ s.stud_fname }} </td>
										<td>{{ s.stud_lname }} </td>
										<td>{{ s.stud_yearLevel }} </td>
										<td>{{ s.email }} </td>
										<td>{{ s.date_applied }} </td>
									</tr>
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!-- end view modal -->
			<!-- EDIT MODAL -->
		
						</div>
					</div>
				</div>
			</div>
			<!-- end edit -->
			<!-- Delete Modal -->
			
						</div>
					</div>
				</div>
			</div>
			<!-- end delete -->
			<!-- END MODAL -->
		</div>
	</div>
	<!-- PHP -->
	<!-- END -->
	<!-- Script start -->
	<script src="../view/assets/js/jq.js"></script>
	<script src="../view/assets/js/bs.js"></script>
	<script src="../view/assets/js/fc.js"></script>
	<script src="../view/assets/js/progress.js"></script>
	<script src="../view/assets/js/bsprogress.js"></script>
	<script src="../view/assets/js/custom.js"></script>
	<script src="../view/assets/js/jquery.dataTables.min.js"></script>
	<script src="../view/assets/js/dataTables.buttons.min.js"></script>
	<script src="../view/assets/js/buttons.flash.min.js"></script>
	<script src="../view/assets/js/buttons.html5.min.js"></script>
	<script src="../view/assets/js/vfs_fonts.js"></script>
	<script src="../view/assets/js/pdfmake.min.js"></script>
	<script src="../view/assets/js/jszip.min.js"></script>
	<script src="../view/assets/js/buttons.print.min.js"></script>
	<script src="../view/assets/js/angular.min.js"></script>
	<script src="../view/assets/js/angular-route.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#dataTable').DataTable({});
	});
	</script>
	<script type="text/javascript">
	var app = angular.module("myApp", []);
	app.controller("myCtrl", function($http, $scope) {
		$http.get('../controller/departmentController/allDept.php').then(function(response) {
			$scope.dept_label = ["Dept id", "Dept code", "Dept Description", "Office Location", "ACTION"];
			$scope.department = response.data;
		});
		$scope.openModal = function(modal_id) {
			$('#' + modal_id).show();
		};
		$scope.closeModal = function(modal_id) {
			$('#' + modal_id).hide();
		};
		$scope.editDepartment = function(dept_id) {
			$http.post('../controller/departmentController/getDept.php', {
				'dept_id': dept_id
			}).then(function(response) {
				console.log(response);
				$('#edit_dept_id').val(response.data.dept_id);
				$('#edit_dept_code').val(response.data.dept_code);
				$('#edit_dept_description').val(response.data.dept_description);
				$('#edit_office_location').val(response.data.office_location);
				$('#editDepartment').modal('show');
			});
		};
		$scope.viewDepartment = function(dept_id, dept_code) {
			$http.post('../controller/departmentController/studentsDept.php', {
				'dept_id': dept_id
			}).then(function(response) {
				console.log(response);
				if(response.data[0] == null) {
					$('#view_course_label').text('No Student');
					$('#view_course_table').hide();
				} else {
					$scope.student_course_label = ["STUDENT ID", "FAMILYNAME", "GIVENNAME", "LEVEL", "EMAIL", "Date Applied"];
					$scope.student = response.data;
					$('#view_course_label').text(`Student's List`);
					$('#view_course_table').show();
				}
			});
			$scope.student_course_labels = ["STUDENT ID", "FAMILYNAME", "GIVENNAME", "LEVEL", "EMAIL", "Date Applied"];
			$('#view_course_name').text(dept_code);
			$('#viewDepartment').modal('show');
		}
		$scope.deleteDepartment = function(dept_id) {
			console.log(dept_id);
			$('#deleteDepartment').modal('show');
			$('#delDept').on('click', function() {
				$http.post('../controller/departmentController/deleteDept.php', {
					'dept_id': dept_id
				}).then(function(response) {
					location.reload();
					console.log(response);
				});
			});
		};
	});
	</script>
</body>

</html>